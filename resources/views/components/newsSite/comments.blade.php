<div class="container">
    <div class="row d-flex justify-content-between">
        <div class="col-8">
<div class="comments">
    <h3 class="title-comments">Комментарии ({{$comments->total()}})</h3>

    <ul class="media-list">
    @foreach($comments as $comment)
        @include('components.newsSite.comment')
    @endforeach
    </ul>
    {{$comments->links()}}
</div>
        </div>
    </div>
</div>
