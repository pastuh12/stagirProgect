<section class="container categories " style=" margin: 30px 0 49px 0">
    <h2 class="text-center mb-3">Категории</h2>
        <div class="accordion" id="categories">
           @foreach ($category as $value)
                <div class="accordion-item mb-2">
                    <h4 class="accordion-header" id="heading{{$loop->index}}">
                        <a class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$loop->index}}"
                                aria-expanded="true" aria-controls="collapse{{$loop->index}}"
                        href="{{route('category', ['category' => $value->title])}}">
                            {{$value->title}}
                        </a>
                    </h4>
                    <div id="collapse{{$loop->index}}" class="accordion-collapse collapse show"
                         aria-labelledby="heading{{$loop->index}}">
                        <div class="accordion-body">
                            <div class="d-flex flex-row flex-nowrap">
                                @if($value->limitGallery->count() !== 0)
                                @foreach($value->limitGallery as $photo)
                                    <div class="mx-2">
                                        @include('components.newsSite.pageGallery.photoCard')
                                    </div>
                                @endforeach
                                @else
                                    @include('components.newsSite.home.gallery.empty')
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
           @endforeach
        </div>
</section>
