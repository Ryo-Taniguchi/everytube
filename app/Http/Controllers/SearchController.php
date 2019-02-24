<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;

class SearchController extends Controller
{
    public function search(Request $request) {
        $keyword = $request->input('keyword');
        $genre = $request->input('genre');
        $query = Video::query();
        
        // 検索するキーワードが存在する場合のみ
        if(!empty($keyword)) {
            $query->where('music_name', 'like', '%'.$keyword.'%')->orWhere('artist', 'like', '%'.$keyword.'%');
            $videos = $query->orderBy('created_at','desc')->paginate(10);
            // セッションデータを格納しつつリダイレクト
            return redirect('videos')->with('videos', $videos)->with('keyword', $keyword);
        }
        
        // ジャンル選択が存在する場合のみ
        if(!empty($genre)) {
            $query->where('genre', 'like', '%'.$genre.'%');
            $videos = $query->orderBy('created_at','desc')->paginate(10);
            // セッションデータを格納しつつリダイレクト
            return redirect('videos')->with('videos', $videos)->with('genre', $genre);
        }
        
        return back();
    }
    
}
