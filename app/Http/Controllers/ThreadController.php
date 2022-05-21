<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Thread;

class ThreadController extends Controller
{
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
        return view('thread.create');
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
        // dd($user);
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
        // dd($user);
        return view('thread.show', compact('thread'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
