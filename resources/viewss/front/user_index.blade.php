<!-- BEGIN : Head-->
    @include('front.layouts.header')
<!-- END : Head-->

<!-- BEGIN : Body-->

<body data-col="2-columns" class=" 2-columns">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="wrapper">

        <!-- Navbar (Header) Starts-->
            @include('front.layouts.nav')
        <!-- Navbar (Header) Ends-->

        <div class="main-panel">
            <!-- BEGIN : Main Content-->
            <div class="main-content">
                <div class="content-wrapper container" style="width:100%">

                    {{--  start error message --}}
                        @include('front.layouts.message')
                    {{-- end error message --}}

                @yield('content')
            </div>
            <!-- END : End Main Content-->

            <!-- BEGIN : Footer-->

            {{-- <footer class="footer footer-static footer-light" >
                <p class="clearfix  text-sm-center" style="color: white; margin-left: -250px"><span>Copyright  &copy; 2020 <a href="https://www.td.com.eg/" id="pixinventLink" target="_blank" class="text-bold-800 primary darken-2">Typical Design </a>, All rights reserved. </span></p>
            </footer> --}}
            <!-- End : Footer-->
            
        </div>
        <p class="clearfix text-sm-center"><span>Copyright  &copy; 2020 <a href="https://www.td.com.eg/" id="pixinventLink" target="_blank" class="text-bold-800 primary darken-2">Typical Design </a>, All rights reserved. </span></p>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <!-- START Notification Sidebar-->
        {{-- @include('front.layouts.notific_menu') --}}
    <!-- END Notification Sidebar-->

    <!-- Theme customizer Starts-->
        {{-- @include('front.layouts.setting') --}}
    <!-- Theme customizer Ends-->

    <!-- BEGIN VENDOR JS-->
        @include('front.layouts.footer')
    <!-- END : Body-->