<div class="weekly-news-area pt-50">
    <div class="container">
        <div class="weekly-wrapper">
            <!-- section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle mb-30">
                        <h3>Лучшие фото </h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="weekly-news-active dot-style d-flex dot-style">
                       @foreach ($galleris as $gallery){
                        <div class="weekly-single">
                            <div class="weekly-img">
                                <img src="{{asset($gallery->image)}}" alt="">
                            </div>
                            <div class="weekly-caption">
                                <h4><a href="#">{{$gallery->title}}</a></h4>
                            </div>
                        </div>
                        }
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
