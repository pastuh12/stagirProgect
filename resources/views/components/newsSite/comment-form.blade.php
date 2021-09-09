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
                  @if(get_class($entity) === \App\Models\News::class)
                  action="{{route('detail.entity.add.comment',['news','id' => $entity->id])}}" method="post"
                  @else
                  action="{{route('detail.entity.add.comment',['gallery','id' => $entity->id])}}" method="post"
                  @endif

                  id="contactForm">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                        <textarea class="comment-form w-100" required name="comment" id="comment"
                                  cols="30" rows="9" value="{{ old('comment') }}"
                                  placeholder="Напишите комментарий"></textarea>
                        </div>
                    </div>
                    @if(get_class($entity) === \App\Models\Gallery::class)
                        <div class="col-6">
                            <div class="form-group">
                                <input class="form-control" min="1" max="5" name="rating" id="rating" type="number"
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
