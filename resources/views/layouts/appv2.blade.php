<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="Bootstrap Admin App + jQuery">
    <meta name="keywords" content="app, responsive, jquery, bootstrap, dashboard, admin">
    <title>@yield('page_title')</title>
    <!-- =============== VENDOR STYLES ===============-->
    <!-- FONT AWESOME-->
    <link rel="stylesheet" href="{{asset('angleadmin/vendor/font-awesome/css/font-awesome.css')}}">
    <!-- SIMPLE LINE ICONS-->
    <link rel="stylesheet" href="{{asset('angleadmin/vendor/simple-line-icons/css/simple-line-icons.css')}}">
    <!-- ANIMATE.CSS-->
    <link rel="stylesheet" href="{{asset('angleadmin/vendor/animate.css/animate.css')}}">
    <!-- WHIRL (spinners)-->
    <link rel="stylesheet" href="{{asset('angleadmin/vendor/whirl/dist/whirl.css')}}">
    <!-- =============== BOOTSTRAP STYLES ===============-->
    <link rel="stylesheet" href="{{asset('angleadmin/css/bootstrap.css')}}" id="bscss">
    <!-- =============== APP STYLES ===============-->
    <link rel="stylesheet" href="{{asset('angleadmin/css/app.css')}}" id="maincss">
    {{--<script src="{{asset('angleadmin/ga.js')}}"></script></head>--}}
    @yield('page_css')
<body>
<div class="wrapper">

    @include('includes.topbar')

    @include('includes.sidebar')

    <!-- Main section-->
    <section class="section-container">
        <!-- Page content-->
        @yield('main_content')
    </section>
    <!-- Page footer-->
    <footer class="footer-container">
        <span>&copy; 2018 - Angle</span>
    </footer>
</div>
<!-- =============== VENDOR SCRIPTS ===============-->
<!-- MODERNIZR-->
<script src="{{asset('angleadmin/vendor/modernizr/modernizr.custom.js')}}"></script>
<!-- JQUERY-->
<script src="{{asset('angleadmin/vendor/jquery/dist/jquery.js')}}"></script>
<!-- BOOTSTRAP-->
<script src="{{asset('angleadmin/vendor/popper.js/dist/umd/popper.js')}}"></script>
<script src="{{asset('angleadmin/vendor/bootstrap/dist/js/bootstrap.js')}}"></script>
<!-- STORAGE API-->
<script src="{{asset('angleadmin/vendor/js-storage/js.storage.js')}}"></script>
<!-- JQUERY EASING-->
<script src="{{asset('angleadmin/vendor/jquery.easing/jquery.easing.js')}}"></script>
<!-- ANIMO-->
<script src="{{asset('angleadmin/vendor/animo/animo.js')}}"></script>
<!-- SCREENFULL-->
<script src="{{asset('angleadmin/vendor/screenfull/dist/screenfull.js')}}"></script>
<!-- LOCALIZE-->
<script src="{{asset('angleadmin/vendor/jquery-localize/dist/jquery.localize.js')}}"></script>

<!-- Axios-->
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

@yield('page_js')

<!-- =============== APP SCRIPTS ===============-->
<script src="{{asset('angleadmin/js/app.js')}}"></script>
</body>
</html>