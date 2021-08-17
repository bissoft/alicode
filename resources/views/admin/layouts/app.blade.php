<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @include('admin.layouts.head')
    @section('style')
    @show
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
    @include('admin.layouts.sidebar')
    @yield('content')

    @include('admin.layouts.footer')
        @yield('scripts')
    {{-- </div> --}}
</body>
</html>
