<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Thread;
use App\Models\Comment;

class ProfileController extends Controller
{

    public function top()
    {
        $threads = Thread::latest()->get();
        return view('user.top', compact('threads'));
    }

    public function index()
    {
        $user = User::findOrFail(Auth::id());
        return view('user.profile.index', compact('user'));
    }
      
    public function update(Request $request)
    {
        $user = User::findOrFail(Auth::id());
        if($request->file('image')) {
            // 取得した画像をファイル名と拡張子に分解して、リネームする
            $img       = $request->file('image')->getClientOriginalName();
            $filename  = pathinfo($img, PATHINFO_FILENAME);
            $extension = $request->file("image")->getClientOriginalExtension();
            $filenameToStore = $filename."_".time().".".$extension;
            $path = $request->file('image')->storeAs('public/img/profile', $filenameToStore);
            $user->img       = $filenameToStore;
        }
        $user->name      = $request->name;
        $user->email     = $request->email;
        $user->email_verified_at = null;
        $user->introduce = $request->introduce;
        $user->save();
        return redirect('profile')->with('flash_message', 'ユーザー情報を編集しました');
    }

    public function home()
    {
        // with関数でリレーション関係にあるthreadモデルをUserモデルと一緒に取得する
        $user    = User::with('thread')->latest()->findOrFail(Auth::id());
        $comment = User::with('comment.thread')->latest()->findOrFail(Auth::id());
        $threads = Thread::latest()->get();
        $threadArray = [];
        $comments    = [];
        foreach($comment->comment as $thread) {
          $result = array_search($thread->thread_id, $threadArray);
          if($result === false) {
            $threadArray[] = $thread->thread_id;
            $comments[] = $thread;
          } 
        }
        // dd($comments);
        return view('user.profile.home', compact('user', 'comments', 'threads'));
    }

    public function mythread()
    {
        $user = User::with('thread')->latest()->findOrFail(Auth::id());
        return view('user.profile.mythread', compact('user'));
    }
}
