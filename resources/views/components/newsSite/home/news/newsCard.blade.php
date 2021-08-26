<div class="card mx-auto" style="width: 18rem; margin-bottom: 20px;">
    <div class="card-header text-center bg-white">
        <img src="{{asset($new->image)}}" class="card-img-top" alt="new_img" style="width: 250px; height: 200px">
    </div>
    <div class="card-body" style="position: relative; height: 240px;">
        <h5 class="card-title">{!! $new->title !!}</h5>
        <h6 class="card-subtitle mb-2 text-muted">
            {{$new->user->name}}</h6>
        <p class="card-text">

            @if($new->describe !== '')
                {!! \Illuminate\Support\Str::limit($new->describe, 50, '...') !!}</p>
            @else
                {!! \Illuminate\Support\Str::limit($new->text, 50, '...') !!}</p>
            @endif
        <a href="{{route('detail.entity.', ['news',$new->id])}}" class="btn btn-primary" style="position: absolute; top: 80%">
            Подробнее</a>
    </div>
    <div class="card-footer text-muted date">
        <p class="card-subtitle mb-2 text-muted">
            Просмотров: {{$new->views}}
        </p>
        {{$new->created_at}}
    </div>
</div>

