<section class="gallery-detail">
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
                            <img class="content-image" src="{{asset($gallery->image)}}" alt="фото" >
                        </div>
                        <div class=rating>
                            Рейтинг: {{$gallery->rating}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="comment-form">
        @include('components.newsSite.comment-form')
    </div>

    <div class="comments">
        @include('components.newsSite.comments')
    </div>

    <!-- About US End -->
</section>
