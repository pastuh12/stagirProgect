<section class="bestGallery pt-50">
    <div class="container">
        <div class="weekly-wrapper">
            <!-- section Tittle -->
            @if($galleries->count() === 0)

                @include('components.newsSite.home.gallery.empty')


            @else
                @include('components.newsSite.home.gallery.not-empty')
            @endif

        </div>
    </div>
</section>

{{--<div class="weekly-news-active dot-style d-flex dot-style">--}}
{{--    @foreach ($bestGallery as $gallery){--}}
{{--    <div class="weekly-single">--}}
{{--        <div class="weekly-img">--}}
{{--            <img src="{{asset($gallery->image)}}" alt="">--}}
{{--        </div>--}}
{{--        <div class="weekly-caption">--}}
{{--            <h4><a href="#">{{$gallery->title}}</a></h4>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    }--}}
{{--    @endforeach--}}
{{--</div>--}}
