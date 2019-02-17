<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller,
Session;
use App\Video;
use App\Http\Controllers;
use Google_Client;
use Google_Service_YouTube;
use Google_Service_Exception;
use Google_Exception;

class VideosController extends Controller
{
    public function index() {
        if (\Auth::check()) {
            if (Session::has('videos')){
                $videos = session('videos');
                $keyword = (session('keyword') === "" ) ? "" : session('keyword');
                return view('home',['videos' => $videos, 'keyword' => $keyword]);
            } else{
                $videos = Video::orderBy('created_at', 'desc')->paginate(10);
                $keyword = "";
                return view('home',['videos' => $videos, 'keyword' => $keyword]);
            }
        } else {
            return view('welcome');
        }
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
        $client = new Google_Client();
        $client->setDeveloperkey(config('everytube.api_key'));
        $youtube = new Google_Service_YouTube($client);

        $params['q']= $request->input('q');
        $params['maxResults']= 15;

        
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
         
         return redirect('videos/create')->with('v_id', $v_id);
    }

    
}