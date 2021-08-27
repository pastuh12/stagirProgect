<section class="container">
    <h2 class="text-center">Последние фотографии</h2>
    <div style="margin: 0">
        <div class="row d-flex justify-content-center mt-5 " >
            <div class=" news-card col-12 d-flex flex-wrap justify-content-center mb-5" id="news-card">
                <!-- Nav Card -->
                @foreach($latestNews as $news)
                    <div class="col d-flex  mx-auto">
                        @include('components.newsSite.home.news.newsCard')
                    </div>
                @endforeach
            </div>

        </div>
        <div class="row d-flex justify-content-center mt-5 ">
            {{$latestPhoto->links()}}
        </div>
    </div>
</section>
