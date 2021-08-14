<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title ?? 'auth'}}</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('/assets/img/favicon.ico')}}">
    @include('components.newsSite.css-files')
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    <header>
        @include('components.logo')
    </header>
    @yield('content')


@include('components.newsSite.footer')
</body>
</html>
