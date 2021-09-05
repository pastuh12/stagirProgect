@if($key === 0)
    <div class="carousel-item active">
        <img src="{{asset($gallery->image)}}" class="carousel-image text-center d-block w-100" alt="gallery-photo"
             style="width: 300px; height: 400px;">
        <div class="carousel-caption d-none d-md-block text-center pb-0">
            <h5 class="mb-1"><a href="{{route('getEntity', ['gallery',$gallery->id])}}">
                    {{$gallery->title}}</a></h5>
            <h6 class="mb-0">{{$gallery->user->name}}</h6>
            <p class="mb-0" style="color: #0a58ca">Рейтинг: {{$gallery->getRating()}}</p>
        </div>
    </div>
@else
    <div class="carousel-item ">
        <img src="{{asset($gallery->image)}}" class="carousel-image text-center d-block w-100" alt="gallery-photo"
             style=" width: 300px; height: 400px;">
        <div class="carousel-caption d-none d-md-block text-center pb-0">
            <h5 class="mb-1"><a href="{{route('getEntity', ['gallery',$gallery->id])}}">
                    {{$gallery->title}}</a></h5>
            <h6 class="mb-0">{{$gallery->user->name}}</h6>
            <p class="mb-0" style="color: #0a58ca">Рейтинг: {{$gallery->getRating()}}</p>
        </div>
    </div>
@endif


