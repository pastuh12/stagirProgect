<div class="card mb-3">
    <div class="card-body">
        <div class="d-flex flex-row mb-2">
            <div>
                <img src="{{asset($comment->user->avatar)}}" class="card-imag avatar" alt="user_avatar" >
            </div>
            <div>
                <h5 class="card-title ml-2">{{$comment->user->name}}</h5>
            </div>
        </div>
        <p class="card-text">{!! $comment->text !!}</p>
        <p class="text-muted">{{$comment->updated_at}}</p>
    </div>
</div>
