<div class="container mt-5">
    <footer class="d-flex flex-wrap justify-content-around align-items-start py-3 mt-4 mb-0 border-top">
        <div class="col-6 d-flex flex-column justify-content-start">
            <ul class="nav justify-content-start mb-3">
                <li class="nav-item"><a href="#header" class="nav-link px-0 text-muted">В начало</a></li>
                <li class="nav-item"><a href="{{route('home')}}" class="nav-link px-2 text-muted">На главную</a></li>
            </ul>
            <ul class="nav flex-column">
                <li class="nav-item">Контактный номер: <a href="tel:+7 (918) 965 07 38">+7 (918)-965-07-38</a></li>
                <li class="nav-item">
                    Контактная почта: <a href="mailto:ilyatarasov75@gmail.com">ilyatarasov75@gmail.com</a></li>
            </ul>
        </div>
        @include('components.newsSite.feedback-form')
    </footer>
</div>

