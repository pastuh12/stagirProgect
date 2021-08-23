<div class="container mt-5" style="height: 200px">
    <footer class="d-flex flex-wrap justify-content-around align-items-start py-3 my-4 mb-5 border-top">
        <ul class="nav justify-content-end">
            <li class="nav-item"><a href="#header" class="nav-link px-2 text-muted">В начало</a></li>
            <li class="nav-item"><a href="{{route('home')}}" class="nav-link px-2 text-muted">На главную</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Pricing</a></li>
            <li class="nav-item"><a href="#header" class="nav-link px-2 text-muted">В начало</a></li>
            <li class="nav-item"><a href="{{route('home')}}" class="nav-link px-2 text-muted">На главную</a></li>
        </ul>
        <div class="col-4">
            <h4>Форма обратной связи</h4>
            <form method="POST" action="">
                <label class="mt-2" for="email">Ваша почта</label>
                <input  id="email" class="form-control block mt-1 w-full" type="email"
                        name="email" value="old('email')" placeholder="example@inbox.ru" required/>
                <label for="message">Ваше сообщене</label>
                <textarea  id="message" class="form-control block w-full" type="text"
                           cols="20" rows="3" name="message" value="old('message')"
                           placeholder="Дайте обратную связь" required></textarea>

            </form>
        </div>
    </footer>
</div>

