@if($key == 0)
    <div class="carousel-item active">
        <img src="{{asset($gallery->image)}}" class="carousel-image d-block w-100" alt="gallery-photo"
             style="height: 400px;">
        <div class="carousel-caption d-none d-md-block text-center">
            <h5>{{$gallery->title}}</h5>
            <h6>{{$gallery->user->name}}</h6>
        </div>
    </div>
@else
    <div class="carousel-item ">
        <img src="{{asset($gallery->image)}}" class="carousel-image d-block w-100" alt="gallery-photo"
             style=" width: 300px; height: 200px;">
        <div class="carousel-caption d-none d-md-block text-center">
            <h5>{{$gallery->title}}</h5>
            <h6>{{$gallery->user->name}}</h6>
        </div>
    </div>
@endif


