<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\User;
use App\Video;

class UsersController extends Controller
{
    public function show($id) {
        $user = User::find($id);
        $videos = $user->videos()->orderBy('created_at', 'desc')->paginate(3);
        
        $data = [
            'user' => $user,
            'videos' => $videos,
            ];
            
        $data += $this->counts($user);
        
        return view('users.show',$data);
    }
    
    public function upload(Request $request,$id) {
        $this->validate($request, ['file' => 'required|image']);
        
        $user = User::find($id);
        $image = $request->file('file');
        $path = Storage::disk('s3')->putFile('myprefix', $image, 'public');
        $user->filename = Storage::disk('s3')->url($path);
        $user->save();
        
        return redirect()->back()->with('user', $user);
    }
}
