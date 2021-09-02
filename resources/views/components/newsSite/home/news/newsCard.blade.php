<div class="card mx-auto" style="width: 18rem; margin-bottom: 20px;">
    <div class="card-header text-center bg-white">
        <img src="{{asset($value->image)}}" class="card-img-top" alt="new_img" style="width: 250px; height: 200px">
    </div>
    <div class="card-body" style="position: relative; height: 240px;">
        <h5 class="card-title">{!! $value->title !!}</h5>
        {{--        <h6 class="card-subtitle mb-2 text-muted">--}}
        {{--            {{$value->name}}</h6>--}}

        @if($value->describe)
            <p class="card-text"> {!! \Illuminate\Support\Str::limit($value->describe, 100, '...') !!}</p>
        @else
            <p class="card-text"> {!! \Illuminate\Support\Str::limit($value->text, 100, '...') !!}</p>
        @endif
        <a href="{{route('getEntity', ['news',$value->id])}}" class="btn btn-primary"
           style="position: absolute; top: 80%">
            Подробнее</a>
    </div>
    <div class="card-footer text-muted date">
        <p class="card-subtitle mb-2 text-muted">
            Просмотров: {{$value->views}}
        </p>
        {{$value->updated_at}}
    </div>
</div>

