<!-- BEGIN : Head-->
    @include('studentAffairs.layouts.header')
<!-- END : Head-->

<!-- BEGIN : Body-->

<body data-col="2-columns" class=" 2-columns">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="wrapper">


        <!-- main menu-->
        <!--.main-menu(class="#{menuColor} #{menuOpenType}", class=(menuShadow == true ? 'menu-shadow' : ''))-->
            @include('studentAffairs.layouts.main_menu')
        <!-- / main menu-->


        <!-- Navbar (Header) Starts-->
            @include('studentAffairs.layouts.nav')
        <!-- Navbar (Header) Ends-->

        <div class="main-panel">
            <!-- BEGIN : Main Content-->
            <div class="main-content">
                <div class="content-wrapper">
                    
                     {{-- <div class="alert alert-success" role="alert">
                       <h4 class="alert-heading">ERP Schools System</h4>
                       <p>Welcome to our great ERP School system</p>
                       <p class="mb-0">{{$setting->school_name_ar}}</p>
                       <p class="mb-0">{{$activeYear->year}}</p>
                     </div>   
                </div> --}}
                    {{--  start error message --}}
                        @include('studentAffairs.layouts.message')
                    {{-- end error message --}}

                @yield('content')
            </div>
            <!-- END : End Main Content-->

            <!-- BEGIN : Footer-->
            {{-- <footer class="footer footer-static footer-light">
                <p class="clearfix text-muted text-sm-center px-2"><span>Copyright  &copy; 2019 <a href="https://1.envato.market/pixinvent_portfolio" id="pixinventLink" target="_blank" class="text-bold-800 primary darken-2">PIXINVENT </a>, All rights reserved. </span></p>
            </footer> --}}
            <p class="clearfix text-sm-center"><span>Copyright  &copy; 2020 <a href="https://www.td.com.eg/" id="pixinventLink" target="_blank" class="text-bold-800 primary darken-2">Typical Design </a>, All rights reserved. </span></p>
            <!-- End : Footer-->

        </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
{{-- 
    <!-- START Notification Sidebar-->
        @include('studentAffairs.layouts.notific_menu')
    <!-- END Notification Sidebar-->

    <!-- Theme customizer Starts-->
        @include('studentAffairs.layouts.setting')
    <!-- Theme customizer Ends--> --}}

    <!-- BEGIN VENDOR JS-->
        @include('studentAffairs.layouts.footer')
    <!-- END : Body-->