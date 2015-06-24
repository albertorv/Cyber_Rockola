<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cyber Rockola</title>

    <!-- Styles -->
    {!! Html::style('/css/bootstrap.css') !!}

    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
</head>
<body>
    <!-- Navbar -->
    @include('partials.laravelnavbar')

    <div class="container">
        @yield('content')
    </div>

    <div class="footer">
        @yield('footer')
        <!-- Scripts -->
        {!! Html::script('/js/jquery-1.11.3.min.js') !!}
        {!! Html::script('/js/bootstrap.min.js') !!}
    </div>
</body>
</html>
