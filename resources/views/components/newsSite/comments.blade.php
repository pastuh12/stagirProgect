<div class="container">
    <div class="row d-flex justify-content-between">
        <div class="col-8">
<div class="comments">
    <div class="comments-header  d-flex flex-row" style="position: relative">
        <h3 class="">Комментарии ({{$comments->total()}})</h3>
        <div class="dropdown " style="position: absolute; right:0;">
            <button class="btn btn-secondary dropdown-toggle"
                    type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                    aria-expanded="false">
                Кол-во
            </button>
            <ul class="dropdown-menu">
                <li><button class="dropdown-item countComments" id="count-20-comments"
                            value="20">20</button></li>
                <li><button class="dropdown-item countComments" id="count-all-comments"
                            value="0">все</button></li>
            </ul>
        </div>
    </div>

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


