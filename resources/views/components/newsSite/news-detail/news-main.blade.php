<!-- About US Start -->
<div class="about-area mt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <!-- Trending Tittle -->
                <div class="about-right mb-5">
                    <div class="section-tittle mb-5 pt-30">
                        <h3>{{$title}}</h3>
                        <br>
                        <img class="content-image" src="{{asset($news->image)}}" alt="{{$title}} ">
                        <p class="text-muted">
                            Просмотры: {{$news->views}}
                        </p>
                    </div>
                    <div class="author">
                        <img class="avatar" src="{{asset($news->user->avatar)}}" alt="аватар">
                        <h4>{{$news->user->name}}</h4>
                    </div>
                    <div class='text'>
                        {!!$news->text!!}
                    </div>
                </div>
            </div>
        </div>

    {{--//может стоило это сделать через макет ?--}}
    <!-- From -->
        <div>
            @include('components.newsSite.comment-form')
        </div>

        <div>
            @include('components.newsSite.comments')
        </div>


    </div>
</div>
<!-- About US End -->
