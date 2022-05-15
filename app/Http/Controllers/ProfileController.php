<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class ProfileController extends Controller
{
    // public function index()
    // {
    //     $user = User::findOrFail(Auth::id());
    //     return view('profile.index', compact('user'));
    // }
    public function index()
    {
        $user = User::findOrFail(Auth::id());
        return view('profile.index', compact('user'));
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
}
