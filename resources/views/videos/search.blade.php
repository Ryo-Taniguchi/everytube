@extends('layouts.app')

@section('content')
 <div class="search-result">
     <h4 class="search-word">検索ワード：{{ $q }}</h4>
 </div>
 <div>
     <p class="search-again">再検索：  <a href="{{ route('videos.create', []) }}"><i class="fas fa-search fa-lg again"></i></a>
 </div>
 <div class="card-columns">
    @foreach ($videos as $video)
      <div class="card text-white bg-secondary mb-3">
        <a href="https://www.youtube.com/watch?v={{ $video['id']['videoId'] }}" >
        <img class="card-img-top" src="{{ $video['snippet']['thumbnails']['high']['url'] }}" />
        <div class="card-body">
        <h4 class="card-title snippet-title">{{ $video['snippet']['title'] }}</h4></a>
         <p class="card-text snippet-description">{{ $video['snippet']['description'] }}</p>
            <form method="post" action="{{ url('/videos/result')}}" >
            {{ csrf_field() }}       
                <button name="v_id" class="btn btn-info result-button" type="submit" value="{{ $video['id']['videoId'] }}">登録する</button>
            </form>
        </div>
      </div>
     @endforeach
  </div>
@endsection