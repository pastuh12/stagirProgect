@if ($errors->any())
    <div class="alert alert-danger" id="errors">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@else
    @if(session('message'))
    <div class="alert alert-success" role="alert" id="message">
        <ul>
                <li>{{session('message')}}</li>
        </ul>
    </div>
        @endif
@endif

<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <form class="form-contact contact_form mb-80"
                  action="{{route('add.comment',['id' => $news->id])}}" method="post"
                  id="contactForm">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                        <textarea class="comment-form w-100" required name="comment" id="comment"
                                  cols="30" rows="9" onfocus="this.placeholder = ''"
                                  value="{{ old('comment') }}"
                                  placeholder="Напишите комментарий"></textarea>
                        </div>
                    </div>
                    @if(request()->route()->uri === 'gallery/{id}')
                        <div class="col-6">
                            <div class="form-group">
                                <input class="form-control" required name="rating" id="rating" type="number"
                                       onfocus="this.placeholder = ''"
                                       onblur="this.placeholder = 'Поставьте оценку'"
                                       placeholder="Поставьте оценку">
                            </div>
                        </div>
                    @endif
                </div>
                <div class="form-group mt-3">
                    <input type="submit" class="btn btn-primary">
                </div>
            </form>

        </div>
    </div>
</div>
