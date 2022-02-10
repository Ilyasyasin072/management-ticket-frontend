<!DOCTYPE html>
<html lang="zxx">
@include('pages.layouts.header.header')
<body id="top">
<!-- Header -->
@include('pages.navbar.navbar')
<!-- Slider Start -->
@yield('content-index')
<!-- footer Start -->
@include('pages.footer.footer')
<!--
Essential Scripts
=====================================-->


<!-- Main jQuery -->
<script src="/assets/plugins/jquery/jquery.js"></script>
<!-- Bootstrap 4.3.2 -->
<script src="/assets/plugins/bootstrap/js/popper.js"></script>
<script src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="/assets/plugins/counterup/jquery.easing.js"></script>
<!-- Slick Slider -->
<script src="/assets/plugins/slick-carousel/slick/slick.min.js"></script>
<!-- Counterup -->
<script src="/assets/plugins/counterup/jquery.waypoints.min.js"></script>

<script src="/assets/plugins/shuffle/shuffle.min.js"></script>
<script src="/assets/plugins/counterup/jquery.counterup.min.js"></script>
<!-- Google Map -->
<script src="/assets/plugins/google-map/map.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkeLMlsiwzp6b3Gnaxd86lvakimwGA6UA&callback=initMap"></script>

<script src="/assets/js/script.js"></script>
<script src="/assets/js/contact.js"></script>

<script src="/assets/js/ticket.js"></script>
@stack('js')
</body>
</html>

