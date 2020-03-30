@inject('stages', 'App\StudentAffairs\Stage')

@extends('index')

@section('css')

@endsection
@section('title')

@if(!empty($record) && $record['name_'.app()->getLocale()] == null)
{{__('lang.new_level')}}
@else
{{__('lang.edit_level')}}

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

            @if(!empty($record) && $record->name_ar == null)
                   {{-- @dd('create') --}}
                   <div class=" content-header col-lg-12">{{__('lang.new_level')}}</div><br>
                    <form class="form-horizontal"  method="POST" action="{{route('level.store')}}">

                @else
                   {{-- @dd('update') --}}
                   <div class=" content-header col-lg-12">{{__('lang.edit_level')}}</div><br>
                    <form class="form-horizontal"  method="POST" action="{{route('level.update', $record->id)}}">

                @endif


            @csrf
              <div class="row">

                @if($supersetting->lang == "English" || $supersetting->lang == "Both" )
              
                <div class="col-lg-6 col-md-12">
                  <div class="form-group">
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
                    <div class="form-group">
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
                <div class="col-lg-6 col-md-12">     
                  @if($supersetting->type == 0)
                  <div class="form-group">
                    <h5>{{__('lang.user_name')}}<span class="required" style="color:red">*</span></h5>
                    <div class="controls mb-1">
                    <input value="{{$record->user_name}}" type="text" name="user_name" class="form-control @error('user_name') is-invalid @enderror" required data-validation-required-message="This field is required">
                    @error('user_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  </div>
                  @endif
                </div>
                {{-- end left side --}}
                <div class="col-lg-6 col-md-12">
                  @if($supersetting->type == 0)
                  <div class="form-group">
                    <h5>{{__('lang.password')}}<span class="required" style="color:red">*</span></h5>
                    <div class="controls mb-1">
                    <input type="text" name="password" class="form-control @error('password') is-invalid @enderror" required data-validation-required-message="This field is required">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  </div>
                  @endif

                  <div class="form-group">
                    <h5>{{__('lang.stage')}}<span class="required" style="color:red">*</span></h5>
                    <div class="controls">
                      <select name="stage_id" data-placeholder="@if($stages->where('id', $record->stage_id)->first()) {{$stages->where('id', $record->stage_id)->pluck('name_'.app()->getLocale())[0]}} @else {{__('lang.select_stage')}} @endif">
                        @foreach ($stages->all() as $stage)
                          <option value="{{$stage->id}}">{{$stage['name_'.app()->getLocale()]}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>

                </div>
                
                  <div class="col-lg-12 col-md-12">
                    <div class="form-group">
                      @if(!empty($record) && $record['name_'.app()->getLocale()] == null)
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

<script>

</script>
<!-- Input Validation end -->

@endsection