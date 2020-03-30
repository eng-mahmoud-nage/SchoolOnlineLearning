@extends('index')
@section('css')

@endsection
@section('title')

{{__('lang.edit_setting')}}

@endsection
@section('content')

<div class="row">
  <div class="col-sm-12">
    {{-- <div class="content-header">Add New User</div> --}}
  </div>
</div>
<!-- Input Validation start -->
<section class="input-validation">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
      <div class="card-header">
        {{__('lang.edit_setting')}}

      </div>
        <div class="card-content">
          <div class="card-body">
@if(isset($record))
                   {{-- @dd('update') --}}
                   <div class=" content-header col-lg-12">{{__('lang.edit_setting')}}</div><br>
                    <form class="form-horizontal" method="POST" action="{{route('setting.update', $record->id)}}">

            @csrf
              <div class="row">
                @if($supersetting->lang == "English" || $supersetting->lang == "Both" )


                <div class="col-lg-6 col-md-12">
                <div class="form-group">
                  <h5>{{__('lang.school_name_en')}}<span class="required" style="color:red">*</span></h5>
                  <div class="controls">
                    <input value="{{$record->school_name_en}}" type="text" name="school_name_en" class="form-control @error('school_name_en') is-invalid @enderror" required data-validation-required-message="This field is required">
                    @if(session('danger'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{session('danger')}}</strong>
                    </span>
                    @endif
                    @error('school_name_en')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>

       

                <div class="form-group">
                  <h5>{{__('lang.educ_admin_name_en')}}<span class="required" style="color:red">*</span></h5>
                  <div class="controls">
                    <input value="{{$record->educ_admin_name_en}}" type="text" name="educ_admin_name_en" class="form-control @error('educ_admin_name_en') is-invalid @enderror" required data-validation-required-message="This field is required">
                    @if(session('danger'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{session('danger')}}</strong>
                    </span>
                    @endif
                    @error('educ_admin_name_en')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>

                
                <div class="form-group">
                  <h5>{{__('lang.stages_en')}}<span class="required" style="color:red">*</span></h5>
                  <div class="controls">
                    <input value="{{$record->stages_en}}" type="text" name="stages_en" class="form-control @error('stages_en') is-invalid @enderror" required data-validation-required-message="This field is required">
                    @if(session('danger'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{session('danger')}}</strong>
                    </span>
                    @endif
                    @error('stages_en')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>

              </div>
              @endif

              @if($supersetting->lang == "Arabic" || $supersetting->lang == "Both" )

              <div class="col-lg-6 col-md-12">
                <div class="form-group @if(app()->getLocale() == 'ar') text-right @endif">
                <h5>{{__('lang.school_name_ar')}}<span class="required" style="color:red">*</span></h5>
                  <div class="controls mb-1">
                  <input value="{{$record->school_name_ar}}" type="text" name="school_name_ar" class="form-control @error('school_name_ar') is-invalid @enderror" required="required" data-validation-required-message="This field is required">
                  @if(session('danger'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{session('danger')}}</strong>
                  </span>
                  @endif
                  @error('school_name_ar')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                </div>

                    <div class="form-group">
                    <h5>{{__('lang.educ_admin_name_ar')}}<span class="required" style="color:red">*</span></h5>
                      <div class="controls mb-1">
                      <input value="{{$record->educ_admin_name_ar}}" type="text" name="educ_admin_name_ar" class="form-control @error('educ_admin_name_ar') is-invalid @enderror" required="required" data-validation-required-message="This field is required">
                      @if(session('danger'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{session('danger')}}</strong>
                      </span>
                      @endif
                      @error('educ_admin_name_ar')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                    </div>

                    <div class="form-group @if(app()->getLocale() == 'ar') text-right @endif">
                    <h5>{{__('lang.stages_ar')}}<span class="required" style="color:red">*</span></h5>
                      <div class="controls mb-1">
                      <input value="{{$record->stages_ar}}" type="text" name="stages_ar" class="form-control @error('stages_ar') is-invalid @enderror" required="required" data-validation-required-message="This field is required">
                      @if(session('danger'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{session('danger')}}</strong>
                      </span>
                      @endif
                      @error('stages_ar')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                    </div>
              </div>
            @endif</div><div class="row">

                <div class="col-lg-12 col-md-12">
                  <div class="form-group">
                @method("PUT")
                <button type="submit" class="btn btn-success">{{__('lang.edit')}} <i class="fa fa-thumbs-o-up position-right"></i></button>
                    <button type="reset" class="btn btn-danger">{{__('lang.reset')}} <i class="fa fa-refresh position-right"></i></button>
                  </div>
                </div>
             
                </div>
                @endif
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Input Validation end -->

@endsection