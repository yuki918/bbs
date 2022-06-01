<?php


namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Config;
use App\Models\User;
use App\Models\Thread;

class ThreadController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth:users')
        //       ->only(['edit', 'update', 'destroy']);
        
        $this->middleware(function($request, $next) {
          $id = $request->route()->parameter('thread');
          if(!is_null($id)) {
            $threadUserId = Thread::findOrFail($id)->user->id;
            $threadId = (int)$threadUserId;
            $userId   = Auth::id();
            if($threadId !== $userId) {
              // abort(404);
              return redirect('/');
            }
          }
          return $next($request);
        })->only(['edit', 'update', 'destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.thread.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::findOrFail(Auth::id());
        $request->validate([
            'title'         => ['required', 'string', 'max:255'],
            'first_comment' => ['required', 'string'],
            'category_name' => ['required'],
        ]);
        // if($user) {
            $thread = Thread::create([
                'user_id'       => $user->id,
                'title'         => $request->title,
                'first_comment' => $request->first_comment,
                'category_name' => $request->category_name,
            ]);
            $thread->save();
        // } else {
        //     dd($request->all());
        //     $thread = Thread::create([
        //         'user_id'       => 1,
        //         'title'         => $request->title,
        //         'first_comment' => $request->first_comment,
        //         'category_name' => $request->category_name,
        //     ]);
        //     $thread->save();
        // }
        return redirect('home')->with('flash_message', '新規スレッドを作成しました。');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $thread = Thread::with('user')->findOrFail($id);
        return view('user.thread.show', compact('thread'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $thread = Thread::findOrFail($id);
        return view('user.thread.edit', compact('thread'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $thread = Thread::findOrFail($id);
        $request->validate([
            'title'         => ['required', 'string', 'max:255'],
            'first_comment' => ['required', 'string'],
            'category_name' => ['required'],
        ]);
        $thread->title         = $request->title;
        $thread->first_comment = $request->first_comment;
        $thread->category_name = $request->category_name;
        $thread->save();
        return redirect()->route('user.thread.show', ['thread' => $thread])
                ->with('flash_message', 'スレッドの編集が完了しました。');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
