<div class="card text-white bg-secondary mb-3" style="max-width: 30rem;">
      <div class="card-header text-center">フォローしているユーザー</div>
      <div class="card-body">
      @if (count($followings) > 0)
      @foreach ($followings as $following)
      <div class="follow-list text-center">
          <h6>{{ $following->name }}</h6>
          <a href="{{ route('users.show',['id'=>$following->id]) }}"><img class="mb-3 rounded" src="{{ $following->filename }}" width="45" height="48"></a>
      </div>
      @endforeach
      @else
          <p class="text-center">フォロー中のユーザーはいません。</p>
      @endif
      </div>
</div>

