<!DOCTYPE html>
<html lang={{ app()->getLocale() }}>
<!-- BEGIN : Head-->

<!-- Mirrored from pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-5/ by HTTrack Website Copier/3.x [XR&CO'2010], Tue, 22 Oct 2019 20:21:59 GMT -->

<head>
    <!-- // seo -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Apex admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Apex admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
{{-- // datatable --}}
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    {{-- //fontawesome --}}
    <link href="{{asset('fontawesome/css/fontawesome.css')}}" rel="stylesheet">
    <link href="{{asset('fontawesome/css/brands.css')}}" rel="stylesheet">
    <link href="{{asset('fontawesome/css/solid.css')}}" rel="stylesheet">
{{-- // sweet_alert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>


    <link rel="apple-touch-icon" sizes="60x60" href="{{url('/')}}/admin/app-assets/img/ico/apple-icon-60.html">
    <link rel="apple-touch-icon" sizes="76x76" href="{{url('/')}}/admin/app-assets/img/ico/apple-icon-76.html">
    <link rel="apple-touch-icon" sizes="120x120" href="{{url('/')}}/admin/app-assets/img/ico/apple-icon-120.html">
    <link rel="apple-touch-icon" sizes="152x152" href="{{url('/')}}/admin/app-assets/img/ico/apple-icon-152.html">
    <link rel="shortcut icon" type="image/x-icon" href="{{url('/')}}/admin/app-assets/img/ico/favicon.ico">
    <link rel="shortcut icon" type="image/png" href="{{url('/')}}/admin/app-assets/img/ico/favicon-32.png">

    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900|Montserrat:300,400,500,600,700,800,900" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <!-- font icons-->
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/admin/app-assets/fonts/feather/style.min.css">
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/admin/app-assets/fonts/simple-line-icons/style.css">
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/admin/app-assets/fonts/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/admin/app-assets/vendors/css/perfect-scrollbar.min.css">
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/admin/app-assets/vendors/css/prism.min.css">
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/admin/app-assets/vendors/css/chartist.min.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN APEX CSS-->
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/admin/app-assets/css/app.css">

    <!-- END APEX CSS-->
            <!-- BEGIN Page Level CSS-->
            <link rel="stylesheet" type="text/css" href="{{url('/')}}/admin/app-assets/vendors/css/wizard.css">
            <!-- END Page Level CSS-->
    <!-- BEGIN Page Level CSS-->
    @yield('css')
        <link rel="stylesheet" href="{{url('/')}}/css/main.css">

        @if(app()->getLocale() == "ar")
        <link rel="stylesheet" href="{{url('/')}}/css/ar.css">
        @endif

    {{-- <link href="{{url('/')}}/awselect/css/awselect.css" rel="stylesheet" /> --}}

    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css"> --}}


    <!-- END Page Level CSS-->

    <title>@yield('title')</title>
</head>
<!-- END : Head-->