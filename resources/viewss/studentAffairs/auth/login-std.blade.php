<!-- BEGIN : Head-->
  @include('studentAffairs.layouts.header')
<!-- END : Head-->

  <!-- BEGIN : Body-->
  <body data-col="1-column" class=" 1-column  blank-page">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    {{--  start error message --}}
      @include('studentAffairs.layouts.message')
    {{-- end error message --}}

    <div class="wrapper">
      <div class="main-panel">
        <!-- BEGIN : Main Content-->
        <div class="main-content">
          <div class="content-wrapper">
            <!--Login Page Starts-->
<section id="login">
  <div class="container-fluid">
    <div class="row full-height-vh m-0">
      <div class="col-12 d-flex align-items-center justify-content-center">
        <div class="card @if(app()->getLocale() == 'ar') text-right @endif">
          <div class="card-content">
            <div class="card-body login-img">
              <div class="row m-0">
                <div class="col-lg-6 d-lg-block d-none py-2 text-center align-middle">
                  <img src="{{url('/')}}/admin/app-assets/img/gallery/login.png" alt="" class="img-fluid mt-5" width="400" height="230">
                </div>
                <div class="col-lg-6 col-md-12 bg-white px-4 pt-3">
                <h4 class="mb-2 card-title">{{__('lang.login')}}</h4>
                  <p class="card-text mb-3">
                    {{__('lang.welcome_msg')}}
                  </p>

                <form action="{{url('/login-std')}}" method="POST">
                    @csrf

                  <input type="text" name="user_name" class="form-control mb-3" autocomplete="false" placeholder="{{__('lang.user_name')}}" />
                <input type="password" name="password" class="form-control mb-1" autocomplete="false" placeholder="{{__('lang.password')}}" />
              
                  <div class="fg-actions d-flex justify-content-between">


                    <div class="recover-pass">
                      <button class="btn btn-primary"  type="submit">{{__('lang.login')}}
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
<!--Login Page Ends-->

          </div>
        </div>
        <!-- END : End Main Content-->
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

      <!-- BEGIN VENDOR JS-->
      @include('studentAffairs.layouts.footer')
      <!-- END : Body-->

