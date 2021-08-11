@if($key == 0)
    <div class="carousel-item active">
        <a href="{{route('gallery.detail', $gallery->id)}}">
            <img src="{{asset($gallery->image)}}" class="carousel-image d-block w-100" alt="gallery-photo"
                 style="">
        </a>
        <div class="carousel-caption d-none d-md-block text-center">
            <h5>{{$gallery->title}}</h5>
            <h6>{{$gallery->user->name}}</h6>
        </div>
    </div>
@else
    <div class="carousel-item ">
       <a href="{{route('gallery.detail', $gallery->id)}}">
           <img src="{{asset($gallery->image)}}" class="carousel-image d-block w-100" alt="gallery-photo"
                style=" ">
       </a>
        <div class="carousel-caption d-none d-md-block text-center">
            <h5>{{$gallery->title}}</h5>
            <h6>{{$gallery->user->name}}</h6>
        </div>
    </div>
@endif


