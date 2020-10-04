<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Abyan Fawwaz">

    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/front_css/blog-home.css') }}" rel="stylesheet">

</head>

<body>

    @include('layouts.frontLayouts.front_header')

    <div class="container">
        <div class="row">
            @yield('content')
            @include('layouts.frontLayouts.front_sidebar')
        </div>
    </div>

    @include('layouts.frontLayouts.front_footer')

    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('js/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap/bootstrap.bundle.min.js') }}"></script>

</body>

</html>
