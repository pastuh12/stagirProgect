<div style="margin: 0">
    @if(request()->routeIs('selection'))
        <h2 class="text-center">Последние новости по рубрике: {{$title}}</h2>
    @else
        <h2 class="text-center">Последние новости</h2>
    @endif

    <div class="row d-flex justify-content-center mt-5 ">
        <div class=" news-card col-12 d-flex flex-wrap justify-content-center mb-5" id="news-card">
            <!-- Nav Card -->
            @foreach($news as $value)
                <div class="col d-flex  mx-auto">
                    @include('components.newsSite.home.news.newsCard')
                </div>
            @endforeach
        </div>
    </div>
</div>
