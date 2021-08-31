<div class="col-4">
    @if ($errors->any())
        <div class="alert alert-danger" id="errors">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h4>Форма обратной связи</h4>
    <form method="GET" action="{{route('send.feedback')}}">
        <div class="form-group mb-2">
            <label for="text">Ваше сообщене</label>
            <textarea id="text" class="form-control block w-full" type="text"
                      cols="20" rows="3" name="text" value="old('text')"
                      placeholder="Дайте обратную связь" required></textarea>
        </div>
        <input class="btn btn-primary" type="submit"/>
    </form>
</div>
