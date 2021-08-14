<div class="row d-flex justify-content-center mt-5 ">
    <div class=" news-card col-10 d-flex justify-content-center mb-5" id="news-card">
        <!-- Nav Card -->
        @foreach($news as $new)
            <div class="col d-flex mx-auto">
                @include('components.newsSite.home.news.newsCard')
            </div>
        @endforeach
    </div>
    {{$news->links()}}
</div>
