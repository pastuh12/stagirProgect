<section class="container categories " style=" margin: 30px 0 49px 0">
    <h2 class="text-center mb-3">Категории</h2>
    <div class="accordion" id="categories">
        @foreach ($rubrics as $key => $values)
            <div class="accordion-item mb-2">
                <h4 class="accordion-header" id="heading{{$loop->index}}">
                    <a class="accordion-button" type="button" data-bs-toggle="collapse"
                       data-bs-target="#collapse{{$loop->index}}"
                       aria-expanded="true" aria-controls="collapse{{$loop->index}}"
                       href="{{route('rubric', ['rubric' => $key])}}">
                        {{$key}}
                    </a>
                </h4>
                <div id="collapse{{$loop->index}}" class="accordion-collapse collapse show"
                     aria-labelledby="heading{{$loop->index}}">
                    <div class="accordion-body">
                        <div class="d-flex flex-row flex-nowrap">
                            @if($values->count() !== 0)
                                @foreach($values as $news)
                                    <div class="mx-2">
                                        @include('components.newsSite.home.news.newsCard')
                                    </div>
                                @endforeach
                            @else
                                @include('components.newsSite.home.news.empty')
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
