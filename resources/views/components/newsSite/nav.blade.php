    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light border border-info">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="{{asset('assets/img/logo.jpg')}}" alt="logo" width="30" height="24" class="d-inline-block align-text-top">
                Bootstrap
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Рубрики
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                            @foreach (\App\Models\Category::all() as $rubric)
                                @include('components.newsSite.rubric')
                            @endforeach
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('register')}}" tabindex="-1">Регистрация</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('login')}}" tabindex="-1">Вход</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
