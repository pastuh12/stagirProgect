<section class="container">
    <h2 class="text-center">Все фотографии {{isset($title) ?  "из категории $title" : ''}}</h2>
    <div style="margin: 0">
        <div class="row d-flex justify-content-start mt-5 ">
            <div class=" news-card col-12 d-flex flex-row flex-wrap justify-content-center mb-3" id="news-card">
                <!-- Nav Card -->
                @foreach($allPhoto as $photo)
                    <div class="col d-flex justify-content-start ">
                        @include('components.newsSite.pageGallery.photoCard')
                    </div>
                @endforeach
            </div>

        </div>
        <div class="row d-flex justify-content-center mt-5 ">
            {{$allPhoto->links()}}
        </div>
    </div>
</section>
