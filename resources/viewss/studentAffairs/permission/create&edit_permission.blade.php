@extends('index')
@section('css')

@endsection
@section('title')

@if(!empty($record) && $record['name_'.app()->getLocale()] == null)
{{__('lang.new_permission')}}
@else
{{__('lang.edit_permission')}}

@endif
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
      
        <div class="card-content">
          <div class="card-body">

            @if(!empty($record) && $record->name == null)
                   {{-- @dd('create') --}}
                   <div class=" content-header col-lg-12 @if(app()->getLocale() == 'ar') text-right @endif">{{__('lang.new_permission')}}</div><br>
                    <form class="form-horizontal" method="POST" action="{{route('permission.store')}}">

                @else
                   {{-- @dd('update') --}}
                   <div class=" content-header col-lg-12 @if(app()->getLocale() == 'ar') text-right @endif">{{__('lang.edit_permission')}}</div><br>
                    <form class="form-horizontal" method="POST" action="{{route('permission.update', $record->id)}}">

                @endif


            @csrf
              <div class="row">

                  @if($supersetting->lang == "English" || $supersetting->lang == "Both" )
                
                  <div class="col-lg-6 col-md-12">
                    <div class="form-group @if(app()->getLocale() == 'ar') text-right @endif">
                    <h5>{{__('lang.name')}}<span class="required" style="color:red">*</span></h5>
                      <div class="controls">
                        <input value="{{$record->name}}" type="text" name="name" class="form-control @error('name') is-invalid @enderror " required data-validation-required-message="This field is required">
                        @if(session('danger'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{session('danger')}}</strong>
                        </span>
                        @endif
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                  </div>
                  @endif
  
                  <div class="col-lg-6 col-md-12">
                    @if($supersetting->lang == "Arabic" || $supersetting->lang == "Both" )
                      <div class="form-group @if(app()->getLocale() == 'ar') text-right @endif">
                        <h5>{{__('lang.name_ar')}}<span class="required" style="color:red">*</span></h5>
                        <div class="controls mb-1">
                        <input value="{{$record->name_ar}}" type="text" name="name_ar" class="form-control @error('name_ar') is-invalid @enderror " required data-validation-required-message="This field is required">
                        @if(session('danger'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{session('danger')}}</strong>
                        </span>
                        @endif
                        @error('name_ar')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                      </div>
                      @endif
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 col-lg-6">
                    <div class="form-group">
                      <h5>{{__('lang.route')}}<span class="required" style="color:red">*</span></h5>
                      <div class="controls mb-1">
                      <input value="{{$record->route}}" type="text" name="route" class="form-control @error('route') is-invalid @enderror " required data-validation-required-message="This field is required">
                      @error('route')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                    </div>
                  </div>
                </div>
                <div class="row">

                
                <div class="col-lg-12 col-md-12">
                  <div class="form-group @if(app()->getLocale() == 'ar') text-right @endif">
                    @if(!empty($record) && $record->name== null)
                    <button type="submit" class="btn btn-success">{{__('lang.submit')}} <i class="fa fa-thumbs-o-up position-right"></i></button>
                @else
                @method("PUT")
                <button type="submit" class="btn btn-success">{{__('lang.edit')}} <i class="fa fa-thumbs-o-up position-right"></i></button>
                @endif
                    <button type="reset" class="btn btn-danger">{{__('lang.reset')}} <i class="fa fa-refresh position-right"></i></button>
                  </div>
                </div>
             
                </div>
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