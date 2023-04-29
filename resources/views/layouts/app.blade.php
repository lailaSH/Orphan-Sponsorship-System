<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>تسجيل الدخول</title>
    

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
    <div class="img2" style=" left:50%
   margin: auto;
   height: 100%;
   padding: 0;
   position: fixed;
   top: 0;
   width: 100%;
   z-index: -2;  ">
     <img src="{{asset('img/login.jpg')}}"   width="100%" height="100%">
   </div>
    <div  style=" left:50%
   margin: auto;
   height: 100%;
   padding: 0;
   position: fixed;
   top: 0;
   width: 100%;
   opacity:0.01;
   background-color:blue;
   z-index: -1;  ">
   </div>
   
        <main class="py-4">
            @yield('content')
        </main>
    </div>

</body>
</html>
