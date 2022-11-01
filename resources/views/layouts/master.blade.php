<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="/karma-master/img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="CodePixar">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    @yield('title')
    <!--
        CSS
        ============================================= -->
    <link rel="stylesheet" href="/karma-master/css/linearicons.css">
    <link rel="stylesheet" href="/karma-master/css/font-awesome.min.css">
    <link rel="stylesheet" href="/karma-master/css/themify-icons.css">
    <link rel="stylesheet" href="/karma-master/css/bootstrap.css">
    <link rel="stylesheet" href="/karma-master/css/owl.carousel.css">
    <link rel="stylesheet" href="/karma-master/css/nice-select.css">
    <link rel="stylesheet" href="/karma-master/css/nouislider.min.css">
    <link rel="stylesheet" href="/karma-master/css/ion.rangeSlider.css" />
    <link rel="stylesheet" href="/karma-master/css/ion.rangeSlider.skinFlat.css" />
    <link rel="stylesheet" href="/karma-master/css/magnific-popup.css">
    <link rel="stylesheet" href="/karma-master/css/main.css">
</head>

<body>

<!-- Start Header Area -->
@include('home.components.header')
<!-- End Header Area -->

@yield('content')

<!-- start footer Area -->
@include('home.components.footer')
<!-- End footer Area -->



<script src="/karma-master/js/vendor/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
        crossorigin="anonymous"></script>
<script src="/karma-master/js/vendor/bootstrap.min.js"></script>
<script src="/karma-master/js/jquery.ajaxchimp.min.js"></script>
<script src="/karma-master/js/jquery.nice-select.min.js"></script>
<script src="/karma-master/js/jquery.sticky.js"></script>
<script src="/karma-master/js/nouislider.min.js"></script>
<script src="/karma-master/js/countdown.js"></script>
<script src="/karma-master/js/jquery.magnific-popup.min.js"></script>
<script src="/karma-master/js/owl.carousel.min.js"></script>
<!--gmaps Js-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
<script src="/karma-master/js/gmaps.min.js"></script>
<script src="/karma-master/js/main.js"></script>

@yield('scripts')
</body>

</html>

