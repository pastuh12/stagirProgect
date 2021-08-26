<section class="bestGallery pt-50">
    <div class="container">
        <div class="weekly-wrapper">
            <!-- section Tittle -->
            @if($galleries->count() === 0)

                @include('components.newsSite.pageGallery.empty')


            @else
                @include('components.newsSite.home.gallery.not-empty')
            @endif

        </div>
    </div>
</section>

