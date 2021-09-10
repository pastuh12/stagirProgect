<div class="col-5">
    @if ($errors->get('text'))
        <div class="alert alert-danger" id="errors">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(session('mailMessage'))
        <div class="alert alert-success" role="alert" id="message">
            <ul>
                <li>{{session('mailMessage')}}</li>
            </ul>
        </div>
    @endif
    <h4>Форма обратной связи</h4>
    <form method="GET" action="{{route('send.feedback')}}">
        <div class="form-group mb-2">
            <label class="mb-1" for="text">Ваше сообщене</label>
            <textarea id="text" class="form-control block w-full" type="text"
                      cols="20" rows="3" name="text" value="{{old('text')}}"
                      placeholder="Дайте обратную связь" required></textarea>
        </div>
        <input class="btn btn-primary" type="submit"/>
    </form>
</div>
