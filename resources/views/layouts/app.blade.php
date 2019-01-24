<!DOCTYPE html>
<html lang="ru">
<head>

    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ setting('site.title') }} 
        @php
            if(isset($page)) echo " - " . $page->title;
        @endphp
    </title>
    <link rel="apple-touch-icon" sizes="76x76" href="img/apple-icon.png">
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">

    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons">

    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.lazyloadxt.fadein.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.css" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.js"></script>
    <script src="/js/jquery.lazyloadxt.js"></script>

    
    

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

<!-- <script>
    Array.prototype.forEach.call(document.querySelectorAll('[data-ripple]'), function(element){
        new RippleEffect(element);
    });
</script> -->

@yield('extra-js')

<script src="{{ asset('js/manifest.js') }}"></script>
<script src="{{ asset('js/vendor.js') }}"></script>
<script src="{{ asset('js/nouislider.min.js') }}"></script>
<script src="{{ asset('js/wNumb.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>

<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(52059306, "init", {
        id:52059306,
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true,
        ecommerce:"dataLayer"
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/52059306" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

</body>
</html>