<!-- BEGIN : Head-->
@include('studentAffairs.layouts.header')
<!-- END : Head-->

  <!-- BEGIN : Body-->
  <body data-col="1-column" class=" 1-column  blank-page">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    {{--  start error message --}}
      @include('studentAffairs.layouts.message')
    {{-- end error message --}}

    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="wrapper">
      <div class="main-panel">
        <!-- BEGIN : Main Content-->
        <div class="main-content">
          <div class="content-wrapper"><!--Forgot Password Starts-->
<section id="forgot-password">
  <div class="container-fluid forgot-password-bg">
    <div class="row full-height-vh m-0 d-flex align-items-center justify-content-center">
      <div class="col-md-7 col-sm-12">
        <div class="card">
          <div class="card-content">
            <div class="card-body fg-image">
              <div class="row m-0">
                <div class="col-lg-6 d-none d-lg-block text-center py-2">
                  <img src="app-assets/img/gallery/forgot.png" alt="" class="img-fluid" width="300" height="230">
                </div>
                <div class="col-lg-6 col-md-12 bg-white px-4 pt-3">
                  <form action="{{url('/forget-pass')}}" method="POST">

                <h4 class="mb-2 card-title">{{__('lang.recover_pass')}}</h4>
                <input type="email" name="email" class="form-control mb-3" placeholder="{{__('lang.email')}}" />
                <input type="password" name="password" class="form-control mb-3" placeholder="{{__('lang.password')}}" />
                  <div class="fg-actions d-flex justify-content-between">
                   
                    <div class="recover-pass">
                      <button class="btn btn-primary">
                        {{__('lang.recover')}}
                      </button>
                    </div>
                  </div>
              </form>
            </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--Forgot Password Ends-->

          </div>
        </div>
        <!-- END : End Main Content-->
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

      <!-- BEGIN VENDOR JS-->
      @include('studentAffairs.layouts.footer')
      <!-- END : Body-->