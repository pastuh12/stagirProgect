<section class="container categories " style="">
    <h2 class="text-center mb-3">Категории</h2>
    <div class="accordion" id="categories">
        @foreach ($category as $value)
            <div class="accordion-item mb-2">
                <h4 class="accordion-header" id="heading{{$loop->index}}">
                    <buttton class="accordion-button" type="button" data-bs-toggle="collapse"
                             data-bs-target="#collapse{{$loop->index}}"
                             aria-expanded="true" aria-controls="collapse{{$loop->index}}">
                        {{$value->title}}
                    </buttton>
                </h4>
                <div id="collapse{{$loop->index}}" class="accordion-collapse collapse show"
                     aria-labelledby="heading{{$loop->index}}">
                    <div class="accordion-body">
                        @if($value->limitGallery->count() !== 0)
                            <div class="d-flex flex-row flex-nowrap">
                                @foreach($value->limitGallery as $photo)
                                    <div class="mx-2">
                                        @include('components.newsSite.pageGallery.photoCard')
                                    </div>
                                @endforeach
                            </div>
                            <button type="button" class="btn btn-primary p-1">
                                <a href="{{route('rubric', $value->id)}}"
                                   style=" text-decoration: none; color: white">
                                    Больше фото</a>
                            </button>
                        @else
                            @include('components.newsSite.home.gallery.empty')
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
