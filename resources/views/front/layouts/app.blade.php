<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('style')
    <title>@yield('title')</title>
    @include('front.layouts.head')
</head>
<body class="light-version">
    @include('front.layouts.navbar')

        @yield('content')

    @include('front.layouts.footer')
    @yield('scripts')
</body>
</html>
