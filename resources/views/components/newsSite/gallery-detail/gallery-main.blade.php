<main>
    <!-- About US Start -->
    <div class="about-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Trending Tittle -->
                    <div class="about-right mb-90">
                        <div class="section-tittle mb-30 pt-30">
                            <h3>{{$title}}</h3>
                            <br>
                            <h4>{{$gallery->user->name}}</h4>
                        </div>
                        <div class='text'>
                            {{--                            текст новости--}}
                            {!!$gallery->text!!}
                        </div>
                    </div>


                    <!-- From -->
                    @include('components.newsSite.comment-form')
                </div>
            </div>
            <div class="row">
                @include('components.newsSite.comments')
            </div>
        </div>
    </div>
    <!-- About US End -->
</main>
