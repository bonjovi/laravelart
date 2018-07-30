<!DOCTYPE html>
<html lang="ru">
<head>

    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>ArtMarket - @yield('title')</title>
    <link rel="apple-touch-icon" sizes="76x76" href="img/apple-icon.png">
    <link rel="icon" type="image/png" href="img/favicon.png">

    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons">

    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

</head>
<body>

<div class="wrapper">
    @yield('header')

    <main class="main">
        <div class="container">
            @yield('content')
        </div><!-- /.container -->
    </main>

    @include('layouts.footer')
</div><!-- /.wrapper-->

<script>
    Array.prototype.forEach.call(document.querySelectorAll('[data-ripple]'), function(element){
        new RippleEffect(element);
    });
</script>

<script src="js/main.js"></script>

</body>
</html>