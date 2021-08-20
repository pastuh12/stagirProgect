<!-- About US Start -->
<div class="about-area mt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <!-- Trending Tittle -->
                <div class="about-right mb-5">
                    <div class="section-tittle mb-5 pt-30">
                        <h3>{{$entity->title}}</h3>
                        <br>
                        <div class="author d-flex flex-row align-items-end mb-3">
                            <div>
                                <img class="avatar mr-4" src="{{asset($entity->user->avatar)}}" alt="аватар">
                            </div>
                            <div>
                                <h4 style="margin-bottom: 0">{{$entity->user->name}}</h4>
                            </div>
                        </div>
                        <img class="content-image" src="{{asset($entity->image)}}" alt="{{$entity->title}} ">
                        @if(get_class($entity) === \App\Models\News::class)
                            <p class="text-muted">
                                Просмотры: {{$entity->views}}
                            </p>
                        @else
                            <p class="text-muted">
                                Рейтинг: {{$entity->getRating()}}
                            </p>
                        @endif

                    </div>

                    @if(get_class($entity) === \App\Models\News::class)
                        <div class='text'>
                            {!!$entity->text!!}
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- From -->
        <div>
            @include('components.newsSite.comment-form')
        </div>

        <div >
            @include('components.newsSite.comments')
        </div>


    </div>
</div>
<!-- About US End -->
