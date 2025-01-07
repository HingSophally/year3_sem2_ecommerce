<!DOCTYPE html>
<html lang="en">
@include('user/head')

<body class="animsition">

    @include('user/header')
    @include('user.cart')
    @yield('main_content')

    @include('user/footer')

    <!-- Back to top -->
    <div class="btn-back-to-top" id="myBtn">
        <span class="symbol-btn-back-to-top">
            <i class="zmdi zmdi-chevron-up"></i>
        </span>
    </div>



    @include('user/scripts')
    @yield('new_js')
</body>

</html>
