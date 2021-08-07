    <img src='{{asset("storage/$news->image")}}' >
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
                            <img class="content-image" src="{{asset($news->image)}}" alt="{{$title}} ">
                        </div>
                        <div class="author">
                            <img class="avatar" src="{{asset($news->user->avatar)}}" alt="аватар">
                            <h4>{{$news->user->name}}</h4>
                        </div>
                        <div class='text'>
                            {!!$news->text!!}
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
        </div>
    </div>
    <!-- About US End -->
