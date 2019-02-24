<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\User;

class UsersController extends Controller
{
    public function show($id) {
        $user = User::find($id);
        $videos = $user->videos()->orderBy('created_at', 'desc')->paginate(5);
        $followings = $user->followings;
        
        $data = [
            'user' => $user,
            'videos' => $videos,
            'followings' => $followings,
            ];
            
        $data += $this->counts($user);
        
        return view('users.show',$data);
    }
    
    public function upload(Request $request,$id) {
        $this->validate($request, ['file' => 'required|image']);
        
        $user = User::find($id);
        // アップロード画像を取得する
        $image = $request->file('file');
        /* ファイル名が自動生成され、S3へ保存
        *  外部からアクセスするため第三引数に'public'を設定
        */
        $path = Storage::disk('s3')->putFile('myprefix', $image, 'public');
        // ファイルパスからをURLを参照する
        $user->filename = Storage::disk('s3')->url($path);
        $user->save();
        
        return redirect()->back()->with('user', $user);
    }
    
    public function favorites($id) {
        $user = User::find($id);
        $videos = $user->favorites()->orderBy('created_at','desc')->paginate(5);
        $followings = $user->followings;
        
        $data = [
            'user' => $user,
            'videos' => $videos,
            'followings' => $followings,
            ];
            
        $data += $this->counts($user);
        
        return view('users.favorites', $data);
    }
    
}
