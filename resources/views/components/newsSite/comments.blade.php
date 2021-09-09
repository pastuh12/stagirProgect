<div class="container">
    <div class="row d-flex justify-content-between">
        <div class="col-8" id="commentsContainer">
            @include('components.newsSite.commentsList')
            <div>
                <button class="btn btn-secondary" id="count-all-comments"
                        value="0">Все</button>
            </div>
        </div>
    </div>
</div>
