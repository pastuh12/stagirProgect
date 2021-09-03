<section class="container categories ">
    <h2 class="text-center mb-3">Категории</h2>

    <div class="accordion" id="categories">
        @foreach ($rubrics as $key => $values)
            <div class="accordion-item mb-3">
                <h4 class="accordion-header " id="heading{{$loop->index}}">
                    <button class="accordion-button " type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse{{$loop->index}}"
                            aria-expanded="true" aria-controls="collapse{{$loop->index}}">
                        {{$values->title}}
                    </button>
                </h4>
                <div id="collapse{{$loop->index}}" class="accordion-collapse collapse show"
                     aria-labelledby="heading{{$loop->index}}">
                    <div class="accordion-body">
                        @if($values->limitNews->count() !== 0)
                            <div class="d-flex flex-row flex-nowrap mb-2" style="overflow: auto">
                                @foreach($values->limitNews as $value)
                                        <div class="mx-2">
                                            @include('components.newsSite.home.news.newsCard')
                                        </div>
                                @endforeach
                            </div>
                            <a class="btn btn-primary" href="{{route('rubric', $values->id)}}"
                               role="button">
                                Больше новостей
                            </a>
                        @else
                            @include('components.newsSite.home.news.empty')
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
