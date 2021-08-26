<section class="container categories " style=" margin: 30px 0 49px 0">
    <h2 class="text-center mb-3">Категории</h2>
        <div class="accordion" id="categories">
           @foreach ($category as $key => $values)
                <div class="accordion-item mb-2">
                    <h4 class="accordion-header" id="heading{{$loop->index}}">
                        <a class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$loop->index}}"
                                aria-expanded="true" aria-controls="collapse{{$loop->index}}"
                        href="{{'category', ['category' => $key]}}">
                            {{$key}}
                        </a>
                    </h4>
                    <div id="collapse{{$loop->index}}" class="accordion-collapse collapse show" aria-labelledby="heading{{$loop->index}}"
                         >
                        <div class="accordion-body">
                            <div class="d-flex flex-row flex-nowrap">
                                @if($values->count() !== 0)
                                @foreach($values as $photo)
                                    <div class="mx-2">
                                        @include('components.newsSite.pageGallery.photoCard')
                                    </div>
                                @endforeach
                                @else
                                    @include('components.newsSite.pageGallery.empty')
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
           @endforeach
        </div>

{{--        @foreach($category as $key => $values)--}}
{{--            <div class="category mb-4" style="width: 1000px">--}}
{{--                <h5>{{$key}}</h5>--}}
{{--                <div class="d-flex flex-row flex-nowrap">--}}
{{--                    @foreach($values as $photo)--}}
{{--                        <div class="mr-2">--}}
{{--                            @include('components.newsSite.pageGallery.photoCard')--}}
{{--                        </div>--}}

{{--                    @endforeach--}}
{{--                </div>--}}
{{--        @endforeach--}}
{{--        <div>--}}

{{--        </div>--}}
{{--    </div>--}}
</section>
{{--<script>--}}
{{--    let categories = document.getElementsByName('category');--}}
{{--    let category = {{$category}};--}}

{{--    console.log(category);--}}
{{--    --}}{{--countAllComments.on('click',function (){--}}
{{--    --}}{{--    let count = countAllComments.val();--}}
{{--    --}}{{--    console.log("{{request()->url() . '/'}}" + count);--}}
</script>
