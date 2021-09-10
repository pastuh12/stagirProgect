@if ($errors->any())
    <div class="alert alert-danger" id="galleryErrors">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@else
    @if(session('galleryMessage'))
        <div class="alert alert-success" role="alert" id="message">
            <ul>
                <li>{{session('galleryMessage')}}</li>
            </ul>
        </div>
    @endif
@endif
<section class="container col-5">
    <h2 class="text-center">
        Добавьте свою фотографию
    </h2>
    <form enctype="multipart/form-data" class="border border-primary border-3 rounded p-3" method="post"
          action="{{route('add.photo')}}">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Название</label>
            <input type="text" class="form-control" id="title" name="title"
                   value="{{old('title')}}" required>
        </div>
        <div class="input-group mb-3">
            <input type="file" class="form-control" id="image" name="image" value="{{old('image')}}">
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Категория</label>
            <select id="category" name="category" class="form-select"
                    value="{{old('category')}}">
                @foreach ($category as $value)
                    <option value={{$value->id}}>{{$value->title}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>


</section>
