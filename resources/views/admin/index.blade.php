<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<!--<![endif]-->

@include('admin/head')

<body class="body">

    <!-- #wrapper -->
    <div id="wrapper">
        <!-- #page -->
        <div id="page" class="">
            <!-- layout-wrap -->
            <div class="layout-wrap">
                <!-- preload -->
                <div id="preload" class="preload-container">
                    <div class="preloading">
                        <span></span>
                    </div>
                </div>
                <!-- /preload -->
                <!-- section-menu-left -->
                @include('admin/aside')
                <!-- /section-menu-left -->
                <!-- section-content-right -->
                <div class="section-content-right">
                    <!-- header-dashboard -->
                    @include('admin/header')
                    <!-- /header-dashboard -->
                    <!-- main-content -->
                    @yield('main_content')
                    <!-- /main-content -->
                </div>
                <!-- /section-content-right -->
            </div>
            <!-- /layout-wrap -->
        </div>
        <!-- /#page -->
    </div>
    <!-- /#wrapper -->
    
    <!-- Javascript -->
    <script src="{{ asset('admin/js/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('admin/js/zoom.js') }}"></script>
    <script src="{{ asset('admin/js/apexcharts/apexcharts.js') }}"></script>
    <script src="{{ asset('admin/js/apexcharts/line-chart-1.js') }}"></script>
    <script src="{{ asset('admin/js/apexcharts/line-chart-2.js') }}"></script>
    <script src="{{ asset('admin/js/apexcharts/line-chart-3.js') }}"></script>
    <script src="{{ asset('admin/js/apexcharts/line-chart-4.js') }}"></script>
    <script src="{{ asset('admin/js/apexcharts/line-chart-5.js') }}"></script>
    <script src="{{ asset('admin/js/apexcharts/line-chart-6.js') }}"></script>
    <script src="{{ asset('admin/js/switcher.js') }}"></script>
    <script src="{{ asset('admin/js/theme-settings.js') }}"></script>
    <script src="{{ asset('admin/js/main.js') }}"></script>

</body>

</html>
