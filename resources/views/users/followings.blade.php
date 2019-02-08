<div class="card text-white bg-secondary mb-3" style="max-width: 20rem;">
      <div class="card-header text-center">フォローしているユーザー</div>
      <div class="card-body">
      @if (count($followings) > 0)
      @foreach ($followings as $following)
          <a href="{{ route('users.show',['id'=>$following->id]) }}"><img class="mb-3 rounded" src="{{ $following->filename }}" width="50" height="40"></a>
      @endforeach
      @else
          <p class="text-center">フォロー中のユーザーはいません。</p>
      @endif
      </div>
</div>

