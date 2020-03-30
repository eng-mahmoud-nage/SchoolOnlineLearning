@inject('acyears', 'App\StudentAffairs\AcademicYear')

@extends('index')


@section('css')

@endsection
@section('title')

@if(!empty($record) && $record['name_'.app()->getLocale()] == null)
{{__('lang.new_ac_year')}}
@else
{{__('lang.edit_ac_year')}}

@endif
@endsection

@section('content')

<!-- Input Validation start -->
<section class="input-validation">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
      
        <div class="card-content">
          <div class="card-body">

            @if(!empty($record) && $record->year == null)
                   {{-- @dd('create') --}}
                   <div class=" content-header col-lg-12">{{__('lang.new_ac_year')}}</div><br>
                    <form class="form-horizontal"  method="POST" action="{{route('academicyear.store')}}">

                @else
                   {{-- @dd('update') --}}
                   <div class=" content-header col-lg-12 @if(app()->getLocale() == 'ar') text-right @endif">{{__('lang.edit_ac_year')}}</div><br>
                    <form class="form-horizontal"  method="POST" action="{{route('academicyear.update', $record->id)}}">

                @endif


            @csrf
              <div class="row">

                <div class="col-lg-6 col-md-12">
                  <div class="form-group">
                  <h5>{{__('lang.ac_year')}}<span class="required" style="color:red">*</span></h5>
                    <div class="controls">
                      <input value="{{$record->year}}" type="text" name="year" class="form-control @error('year') is-invalid @enderror " required data-validation-required-message="This field is required">
                      @error('year')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                </div>

                  <div class="col-lg-4 col-md-12">
                    <div class="form-group">
                      <h5 style="text-align:center">{{__('lang.active')}}</h5>
                      <div class="controls mb-1">
                      <input @if($record->active) checked @endif type="checkbox" name="active" class="form-control @error('active') is-invalid @enderror " data-validation-required-message="This field is required">
                      @error('active')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                    </div>
                  </div>
                    
                    {{-- <div class="col-lg-2 col-md-12">
                      <div class="form-group">
                        <h5 style="text-align:center">{{__('lang.order')}}</h5>
                        <div class="controls mb-1">
                        <input value="{{$acyears->count()+1}}" type="number" disabled name="order" class="form-control disabled @error('order') is-invalid @enderror " required data-validation-required-message="This field is required">
                        @error('order')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                      </div>
              </div> --}}

            </div>

                
                  <div class="col-lg-12 col-md-12">
                    <div class="form-group">
                      @if(!empty($record) && $record->year == null)
                      <button type="submit" class="btn btn-success">{{__('lang.submit')}} <i class="fa fa-thumbs-o-up position-right"></i></button>
                  @else
                  @method("PUT")
                  <button type="submit" class="btn btn-success">{{__('lang.edit')}} <i class="fa fa-thumbs-o-up position-right"></i></button>
                  @endif
                      <button type="reset" class="btn btn-danger">{{__('lang.reset')}} <i class="fa fa-refresh position-right"></i></button>
                    </div>
                  </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection