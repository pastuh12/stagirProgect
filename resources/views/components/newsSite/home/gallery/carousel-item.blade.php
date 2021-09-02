@if($key == 0)
    <div class="carousel-item active">
        <img src="{{asset($gallery->image)}}" class="carousel-image d-block w-100" alt="gallery-photo"
             style="height: 400px;">
        <div class="carousel-caption d-none d-md-block text-center p-0">
            <h5 class="mb-1"><a href="{{route('getEntity', ['gallery',$gallery->id])}}">{{$gallery->title}}</a></h5>
            <h6 class="mb-0">{{$gallery->user->name}}</h6>
            Рейтинг: {{$gallery->getRating()}}
        </div>
    </div>
@else
    <div class="carousel-item ">
        <img src="{{asset($gallery->image)}}" class="carousel-image d-block w-100" alt="gallery-photo"
             style=" width: 300px; height: 400px;">
        <div class="carousel-caption d-none d-md-block text-center">
            <h5><a href="{{route('getEntity', ['gallery',$gallery->id])}}">{{$gallery->title}}</a></h5>
            <h6>{{$gallery->user->name}}</h6>
            <p>Рейтинг: {{$gallery->getRating()}}</p>
        </div>
    </div>
@endif


