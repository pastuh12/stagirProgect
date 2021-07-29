<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{$title ?? 'My news site'}}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('/assets/img/favicon.ico')}}">

@include('components.newsSite.css-files')

</head>

<body>

    @include('components.newsSite.header')

    <main>
        @yield('content')

    <!-- Whats New Start -->
        @yield('whats new')
    <!-- Whats New End -->

        @yield('gallery')


</main>

@include('components.newsSite.footer')

@include('components.newsSite.script-index')

</body>
</html>
