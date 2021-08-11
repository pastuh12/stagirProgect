<div class="row">
    <div class="col-12 d-flex justify-content-center">
        <div class="section-tittle">
            <h3>Лучшие фото </h3>
        </div>
    </div>
</div>
<div class="row d-flex justify-content-center">
    <div class="col-10 ">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner" style="">
                @foreach ($galleries as $key => $gallery)
                    @include('components.newsSite.home.gallery.carousel-item')
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Предыдущая</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Следующая</span>
            </button>
        </div>
    </div>
</div>
