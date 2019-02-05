<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;

class VideosController extends Controller
{
    public function index() {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $videos = $user->videos()->orderBy('created_at', 'desc')->paginate(2);
            
            $data = [
                'user' => $user,
                'videos' => $videos,
            ];
        }
        
        return view('welcome', $data);
    }
    
    public function create() {
        
        return view('videos.share');
    }
    
    public function store(Request $request) {
        $this->validate($request,[
            'music_name'=>'required|max:40',
            'artist'=>'required|max:40',
            'string'=>'required|max:30',
            'genre'=>'required'
            ]);
        
        $request->string = str_replace("https://youtu.be/","",$request->string);
        
        $request->user()->videos()->create([
            'music_name' => $request->music_name,
            'artist' => $request->artist,
            'genre' => $request->genre,
            'string' => $request->string,
            ]);
       
        
        return redirect()->back();
    }
    
    public function destroy($id) {
        $video = Video::find($id);
        
        if (\Auth::id() === $video->user_id) {
            $video->delete();
        }
        
        return back();
    }
}