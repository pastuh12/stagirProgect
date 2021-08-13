
    <div class="card mx-auto" style="width: 18rem;">
        <div class="card-header text-center bg-white">
            <img src="{{asset($new->image)}}" class="card-img-top" alt="new_img" style="width: 250px; max-height: 200px">
        </div>
        <div class="card-body">
            <h5 class="card-title">{!! $new->title !!}</h5>
            <h6 class="card-subtitle mb-2 text-muted">
                {{$new->user->name}}</h6>
            <p class="card-text">
                {!! \Illuminate\Support\Str::limit($new->text, [10, '...']) !!}</p>
            <a href="{{$new->id}}" class="btn btn-primary">Подробнее</a>
        </div>
        <div class="card-footer text-muted date">
            <p class="card-subtitle mb-2 text-muted">
               Просмотров: {{$new->views}}
            </p>
            {{$new->updated_at}}
        </div>
    </div>
