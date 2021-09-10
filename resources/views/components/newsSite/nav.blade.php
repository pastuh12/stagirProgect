<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light border">
    <div class="container-fluid">

        <div class="collapse navbar-collapse" id="navbarSupportedContent" style="position: relative">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li>
                    <a class="navbar-brand" href="{{route('home')}}">
                        <img src="{{asset('assets/img/logo.jpg')}}" alt="logo" width="30" height="24"
                             class="d-inline-block align-text-top">
                        MyNews
                    </a>
                </li>
                <li>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('get.all.gallery')}}">Галерея</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('get.all.news')}}">Новости</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        Подборки
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                        @foreach (\App\Models\Category::all() as $rubric)
                            @include('components.newsSite.rubric')
                        @endforeach
                    </ul>
                </li>
            </ul>
            <div class="d-flex" style="">
                <div class="account d-flex flex-row align-items-center" style="position: relative">
                    @if(\Illuminate\Support\Facades\Auth::check())
                        <img class="nav-item avatar mx-2"
                             src="{{asset(\Illuminate\Support\Facades\Auth::user()->avatar)}}"
                             alt="avatar" style="border-radius: 100px; border: 1px solid black;">
                        <div class="dropdown py-2">
                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button"
                                    id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                {{\Illuminate\Support\Facades\Auth::user()->name}}
                            </button>
                            <ul class=" dropdown-menu dropdown-menu-dark dropdown-menu-end "
                                aria-labelledby="dropdownMenuButton1"
                                style="margin-top: -5px; ">
                                <li class="px-1">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a href="{{route('logout')}}"
                                           onclick="event.preventDefault();
                                                this.closest('form').submit();"
                                           style="width: 150px; color: white; text-decoration: none ">
                                            Выйти
                                        </a>
                                    </form>
                                </li>
                                @if(auth()->user()->role === 'admin' || auth()->user()->role === 'editor')
                                    <li class="px-1">
                                        <a href="/admin"
                                           style="width: 150px; color: white; text-decoration: none ">
                                            Админка</a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    @else

                        <a class="nav-link" href="{{route('register')}}" tabindex="-1">Регистрация</a>

                        <a class="nav-link" href="{{route('login')}}" tabindex="-1">Вход</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</nav>
