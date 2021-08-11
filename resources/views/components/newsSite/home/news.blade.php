    <section class="whats-news-area pt-50 pb-20 mb-5 mt-5" >
        <div class="container" >
            <div class="row">
                <div class="col-12">

                    @if($news->count() === 0)

                        @include('components.newsSite.home.news.empty')


                    @else
                        @include('components.newsSite.home.gallery.not-empty')
                    @endif

                </div>
            </div>

        </div>

    </section>



