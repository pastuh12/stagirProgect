    <section class="whats-news-area pt-50 pb-20">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row d-flex justify-content-between">
                        <div class="col-lg-3 col-md-3">
                            <div class="section-tittle mb-30">
                                <h3>Свежие новости</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <!-- Nav Card -->
                            <div class="tab-content" id="nav-tabContent">
{{--                                @include('components.newsSite.home.getLatestNews')--}}
                                <ul class="media-list">
{{--                                @foreach($latestNews as $news)--}}
{{--                                    <!-- Комментарий (уровень 1) -->--}}
{{--                                        <li class="media-wrapper">--}}
{{--                                            <img class="media-object img-rounded" src="{{$news->user->avatar}}" alt="аватар">--}}
{{--                                            <a href="#">{!!$news->text!!}</a>--}}
{{--                                            <div class="media-body">--}}
{{--                                                <div class="media-heading">--}}
{{--                                                    <div class="author">{{$comment->user->name}}</div>--}}
{{--                                                    <div class="metadata">--}}
{{--                                                        <span class="date">{{$comment->updated_at}}</span>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="media-text text-justify">{!!$comment->text!!}</div>--}}
{{--                                            </div>--}}
{{--                                        </li><!-- Конец комментария (уровень 1) -->--}}
{{--                                    @endforeach--}}
                                </ul>

                            </div>
                            <!-- End Nav Card -->
                        </div>
                        {{--                        {{$latestNews->links()}}--}}
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>




