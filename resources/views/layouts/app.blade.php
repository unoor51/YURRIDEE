<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('includes.head')
<body class="skin-default fixed-layout">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">YURRIDEE Admin Panel </p>
        </div>
    </div>
    <div id="main-wrapper">
        <!-- Top Header-->
        @include('includes.top_header')
        <!-- Header navigation -->
        @include('includes.navigation')
        

        <main>
            @yield('content')
        </main>
         <footer class="footer">
            © YURRIDEE 2022 copy rights are reserved
        </footer>
    </div>
    @include('includes.footer')
    
     @yield('scripts')


</body>
</html>
