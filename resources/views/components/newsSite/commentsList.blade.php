<div class="comments mb-5" id="comments">
    <div class="comments-header  d-flex flex-row mb-4 border-bottom" style="position: relative">

        <h3 class="">Комментарии</h3>
    </div>
    @if($comments->count())
        <ul class="media-list">
           <div id="commentsContainer">
               @include('components.newsSite.comments-foreach')
           </div>
        </ul>
    @else
        <p>Комментарии пока отсутствуют</p>
    @endif
</div>
