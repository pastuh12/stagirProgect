<div class="container">
    <div class="row d-flex justify-content-between">
        <div class="col-xl-5 col-lg-5 col-md-7 col-sm-12">
<div class="comments">
    <h3 class="title-comments">Комментарии ({{$comments->total()}})</h3>

    <ul class="media-list">
    @foreach($comments as $comment)
        <!-- Комментарий (уровень 1) -->
        <li class="media-wrapper">
            <div class="media-left">
                <a href="#">
                    <img class="media-object img-rounded" src="avatar1.jpg" alt="">
                </a>
            </div>
            <div class="media-body">
                <div class="media-heading">
                    <div class="author">{{$comment->user->name}}</div>
                    <div class="metadata">
                        <span class="date">{{$comment->updated_at}}</span>
                    </div>
                </div>
                <div class="media-text text-justify">{!!$comment->text!!}</div>
            </div>
        </li><!-- Конец комментария (уровень 1) -->
    @endforeach
    </ul>
    {{$comments->links()}}
</div>
        </div>
    </div>
</div>
