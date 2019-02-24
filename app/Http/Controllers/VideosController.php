<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers;
use App\Http\Requests\StoreVideo;
use App\Http\Controllers\Controller;
use Session;
use App\Video;
use Google_Client;
use Google_Service_YouTube;
use Google_Service_Exception;
use Google_Exception;

class VideosController extends Controller
{
    public function index() {
        
        if (\Auth::check()) {
            // ビデオ情報がセッションデータとして存在するかチェック
            if (Session::has('videos')) {
                $videos = session('videos');
                // キーワードが存在しない時は空にする
                $keyword = (session('keyword')) ? session('keyword') : "";
            } else {
                $videos = Video::orderBy('created_at', 'desc')->paginate(10);
                $keyword = "";
            }
            
            return view('home',['videos' => $videos, 'keyword' => $keyword]);
            
        } else {
            
            return view('welcome');
        }
        
    }
    
    public function create() {
        
        return view('videos.share');
    }
    
    // StoreVideo作成
    // FormRequestをオーバーライドし バリデーションをカスタマイズ
    // ※引数注目※
    public function store(StoreVideo $request) {
        
        // YouTubeのURLの時、ビデオIDだけを取得する
        $url = "!https://youtu.be/!";
        if ( preg_match($url, $request->string) ) {
          $request->string = str_replace("https://youtu.be/","",$request->string);
        } 
        
        $request->user()->videos()->create([
            'music_name' => $request->music_name,
            'artist' => $request->artist,
            'genre' => $request->genre,
            'string' => $request->string,
            ]);
       
        return redirect('videos');
    }
    
    public function destroy($id) {
        $video = Video::find($id);
        
        if (\Auth::id() === $video->user_id) {
            $video->delete();
        }
        
        return back();
    }
    
    public function search(Request $request) {
        // Googleクライアントを読みこみ、APIの情報を設定する
        $client = new Google_Client();
        $client->setDeveloperkey(config('everytube.api_key'));
        // YouTubeの読み込み
        $youtube = new Google_Service_YouTube($client);
        // 検索ワード取得、検索数指定
        $params['q']= $request->input('q');
        $params['maxResults']= 15;
        
        // 検索情報と動画情報が一致する結果を取得するためにsearch.listメソッドを呼びだす
        try {
            $searchResponse = $youtube->search->listSearch('snippet', $params);
            $videos = $searchResponse['items'];
            return view('videos.search')->with('q',$params['q'])->with('videos', $videos);
        } catch (Google_Service_Exception $e) {
            ($e->getMessage());
            return back();
        } catch (Google_Exception $e) {
            ($e->getMessage());
            return back();
        }
       
    }
    
    public function result(Request $request) {
        $v_id= $request->input('v_id');
        $v_title= $request->input('v_title');
        // セッションデータを格納しつつリダイレクト
        return redirect('videos/create')->with('v_id', $v_id)->with('v_title', $v_title);
    }

}