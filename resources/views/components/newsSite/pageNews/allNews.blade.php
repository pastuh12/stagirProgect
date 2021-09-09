<section class="container">
    <h2 class="text-center">Все новости {{isset($title) ?  "из рубрики $title" : ''}}</h2>
    <div class="my-5" style="margin: 0">
        @if($allNews->count() !== 0)
            <div class="row d-flex justify-content-center ">
                <div class=" news-card col-12 d-flex flex-wrap justify-content-start mb-5" id="news-card">
                    <!-- Nav Card -->
                    @foreach($allNews as $value)
                        <div class="col d-flex  mx-auto">
                            @include('components.newsSite.home.news.newsCard')
                        </div>
                    @endforeach
                </div>

            </div>
            @if(request()->route()->getName() === 'rubric')
                @include('components.newsSite.pageNews.categoryFamily')
                <div class="row d-flex justify-content-center mt-5 ">
                    {{$allNews->links()}}
                </div>
            @endif
    </div>
    @else
        @include('components.newsSite.home.news.empty')
    @endif

</section>
