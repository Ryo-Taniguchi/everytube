<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;

class SearchController extends Controller
{
    public function search(Request $request) {
        $keyword = $request->input('keyword');

        $query = Video::query();
        
        if(!empty($keyword)) {
            $query->where('music_name', 'like', '%'.$keyword.'%')->orWhere('artist', 'like', '%'.$keyword.'%');
        }
        
        $videos = $query->orderBy('created_at','desc')->paginate(5);
        
        return view('home')->with('videos', $videos);
    }
}
