<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Thread;
use App\Models\Comment;

class CommentController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , $id)
    {
        $user = User::find(Auth::id());
        $thread = Thread::findOrFail($id);
        $request->validate([
            'comment' => ['required', 'string'],
        ]);
        if($user) {
            $comment = Comment::create([
                'user_id'   => $user->id,
                'thread_id' => $thread->id,
                'comment'   => $request->comment,
            ]);
        } else {
            $comment = Comment::create([
                'user_id'   => 1,
                'thread_id' => $thread->id,
                'comment'   => $request->comment,
            ]);
        }
        $comment->save();
        return redirect()->route('user.thread.show', ['thread' => $thread])
                ->with('flash_message02', 'コメントを送信しました。');
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
