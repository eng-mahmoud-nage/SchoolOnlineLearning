@extends('index')
@section('css')

@endsection
@section('title')

@if(!empty($record) && $record['name_'.app()->getLocale()] == null)
{{__('lang.new_place')}}
@else
{{__('lang.edit_place')}}

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

            @if(!empty($record) && $record['name_'.app()->getLocale()] == null)
                   {{-- @dd('create') --}}
                   <div class=" content-header col-lg-12 @if(app()->getLocale() == 'ar') text-right @endif">{{__('lang.new_place')}}</div><br>
                    <form class="form-horizontal" method="POST" action="{{route('place.store')}}">

                @else
                   {{-- @dd('update') --}}
                   <div class=" content-header col-lg-12 @if(app()->getLocale() == 'ar') text-right @endif">{{__('lang.edit_place')}}</div><br>
                    <form class="form-horizontal" method="POST" action="{{route('place.update', $record->id)}}">

                @endif


            @csrf
              <div class="row">

                @if($supersetting->lang == "English" || $supersetting->lang == "Both" )
              
                <div class="col-lg-6 col-md-12">
                  <div class="form-group @if(app()->getLocale() == 'ar') text-right @endif">
                  <h5>{{__('lang.name_en')}}<span class="required" style="color:red">*</span></h5>
                    <div class="controls">
                      <input value="{{$record->name_en}}" type="text" name="name_en" class="form-control @error('name_en') is-invalid @enderror " required data-validation-required-message="This field is required">
                      @if(session('danger'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{session('danger')}}</strong>
                      </span>
                      @endif
                      @error('name_en')
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
                
                
                <div class="col-lg-12 col-md-12">
                  <div class="form-group @if(app()->getLocale() == 'ar') text-right @endif">
                    @if(!empty($record) && $record['name_'.app()->getLocale()] == null)
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