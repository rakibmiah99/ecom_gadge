<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>General Dashboard &mdash; Stisla</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{asset("assets/modules/bootstrap/css/bootstrap.min.css")}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{asset("assets/modules/fontawesome/css/all.min.css")}}">
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{asset("assets/modules/jqvmap/dist/jqvmap.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/modules/weather-icon/css/weather-icons.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/modules/weather-icon/css/weather-icons-wind.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/modules/summernote/summernote-bs4.css")}}">
    ")}}"
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset("assets/css/style.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/components.css")}}">
    <!-- Start GA -->


    <!-- Datatable Css -->
    <link rel="stylesheet" href="{{asset("assets/modules/datatables/datatables.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css")}}">
</head>

<body>
<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>
        <!--Top Navbar -->
    @include('layout.top-nav')
    <!-- Top Navbar Close -->

        <!-- Sidebar Start -->
    @include('layout.sidebar')
    <!-- Sidebar End -->


        <!-- Main Content -->
        <div class="main-content">
            <section class="section">
                @yield('main-content')
                <!-- End Main Content -->
            </section>
        </div>

        @yield('modals')

        <footer class="main-footer">
            <div class="footer-left">
                Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
            </div>
            <div class="footer-right">

            </div>
        </footer>
    </div>
</div>

<!--Axios -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js" integrity="sha512-odNmoc1XJy5x1TMVMdC7EMs3IVdItLPlCeL5vSUPN2llYKMJ2eByTTAIiiuqLg+GdNr9hF6z81p27DArRFKT7A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- General JS Scripts -->
<script src="{{asset("assets/modules/jquery.min.js")}}"></script>
<script src="{{asset("assets/modules/popper.js")}}"></script>
<script src="{{asset("assets/modules/tooltip.js")}}"></script>
<script src="{{asset("assets/modules/bootstrap/js/bootstrap.min.js")}}"></script>
<script src="{{asset("assets/modules/nicescroll/jquery.nicescroll.min.js")}}"></script>
<script src="{{asset("assets/modules/moment.min.js")}}"></script>
<script src="{{asset("assets/js/stisla.js")}}"></script>

<!-- JS Libraies -->
<script src="{{asset("assets/modules/simple-weather/jquery.simpleWeather.min.js")}}"></script>
<script src="{{asset("assets/modules/chart.min.js")}}"></script>
<script src="{{asset("assets/modules/jqvmap/dist/jquery.vmap.min.js")}}"></script>
<script src="{{asset("assets/modules/jqvmap/dist/maps/jquery.vmap.world.js")}}"></script>
<script src="{{asset("assets/modules/summernote/summernote-bs4.js")}}"></script>
<script src="{{asset("assets/modules/chocolat/dist/js/jquery.chocolat.min.js")}}"></script>

<!-- Page Specific JS File -->
<script src="{{asset("assets/js/page/index-0.js")}}"></script>

<!--Data Table -->
<script src="{{asset("assets/modules/datatables/datatables.min.js")}}"></script>
<script src="{{asset("assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js")}}"></script>
<script src="{{asset("assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js")}}"></script>
{{--<script src="{{asset("assets/js/page/modules-datatables.js")}}"></script>--}}


<!-- Template JS File -->
<script src="{{asset("assets/js/scripts.js")}}"></script>
<script src="{{asset("assets/js/custom.js")}}"></script>
@yield('scripts')
</body>
</html>
