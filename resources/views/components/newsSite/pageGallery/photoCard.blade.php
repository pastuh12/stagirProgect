<div class="card mx-auto" style="width: 18rem; margin-bottom: 20px;">
    <div class="card-header text-center bg-white">
        <img src="{{asset($photo->image)}}" class="card-img-top" alt="photo_img" style="width: 250px; height: 200px">
    </div>
    <div class="card-body" style="position: relative; height: 240px;">
        <h5 class="card-title">{!! $photo->title !!}</h5>
        <h6 class="card-subtitle mb-2 text-muted">
            {{$photo->user->name}}</h6>
        <p class="card-text">

        <a href="{{route('detail.entity.', ['gallery',$photo->id])}}" class="btn btn-primary" style="position: absolute; top: 80%">
            Подробнее</a>
    </div>
    <div class="card-footer text-muted date">
        {{$photo->created_at}}
    </div>
</div>
