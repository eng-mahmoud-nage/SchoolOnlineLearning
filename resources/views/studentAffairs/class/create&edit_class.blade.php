@inject('stages', 'App\StudentAffairs\Stage')
@inject('levels', 'App\StudentAffairs\Level')

@extends('index')

@section('css')

@endsection
@section('title')

@if(!empty($record) && $record['name_'.app()->getLocale()] == null)
{{__('lang.new_class')}}
@else
{{__('lang.edit_class')}}

@endif
@endsection

@section('content')
<!-- Input Validation start -->
<section class="input-validation">
  <div class="row">
    <div class="col-md-12 col-lg-12">
      <div class="card">
      
        <div class="card-content">
          <div class="card-body">

            @if(!empty($record) && $record['name_'.app()->getLocale()] == null)
                   {{-- @dd('create') --}}
                    <div class=" content-header col-lg-12 @if(app()->getLocale() == 'ar') text-right @endif">{{__('lang.new_class')}}</div><br>
                    <form class="form-horizontal" method="POST" action="{{route('class.store')}}" >

                @else
                   {{-- @dd('update') --}}
                   <div class=" content-header col-lg-12 @if(app()->getLocale() == 'ar') text-right @endif">{{__('lang.edit_class')}}</div><br>
                    <form class="form-horizontal" method="POST" action="{{route('class.update', $record->id)}}" >

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
                  <div class="col-lg-6 col-md-12">

      
                    
                    <div class="form-group">
                      <h5>{{__('lang.stage')}}<span class="required" style="color:red">*</span></h5>
                      <div class="controls">
                        <select class="stage" id="stage" name="stage_id" @if($record['name_'.app()->getLocale()]) required @endif data-placeholder="@if($stages->where('id', $record->stage_id)->first()) {{$stages->where('id', $record->stage_id)->pluck('name_'.app()->getLocale())[0]}} @else {{__('lang.select_stage')}} @endif">
                          @if($record->level_id)
                          <option value="{{$record->level->stage->id}}" selected  disabled>{{$record->level->stage['name_'.app()->getLocale()]}}</option>
                        @else
                          <option value="" selected  disabled>{{__('lang.stage')}}</option>
                        @endif
                         @foreach ($stages->all() as $stage)
                            <option value="{{$stage->id}}">{{$stage['name_'.app()->getLocale()]}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
    

                  </div>
                    <div class="col-lg-6 col-md-12">


                  <div class="form-group">
                    <h5>{{__('lang.level')}}<span class="required" style="color:red">*</span></h5>
                    <div class="controls">
                      <select class="level" id="level" name="level_id"  @if($record['name_'.app()->getLocale()]) required @endif data-placeholder="@if($levels->where('id', $record->level_id)->first()) {{$levels->where('id', $record->level_id)->pluck('name_'.app()->getLocale())[0]}} @else {{__('lang.select_level')}} @endif">
                        @if($record->level_id)
                        <option value="{{$record->level->id}}" selected  disabled>{{$record->level['name_'.app()->getLocale()]}}</option>
                          @else
                          <option value="" selected  disabled>{{__('lang.level')}}</option>
                          @endif
                         </select>
                    </div>
                  </div>


                </div>

                
                </div>

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
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@push('scripts')
<script>
    $(document).ready(function(){
        
        $('#stage').on('change',function(){
        var stage_id = $('#stage').val();
        if(stage_id){
            $.ajax({
                url : "{{url('/level?stage_id=')}}" + stage_id,
                type: "GET",
                success:function(data){

                    if(data.status === 1){
                      $("#level").empty();
                      $("#level").append("<option value='' selected  disabled>{{__('lang.level')}}</option>");
                        $.each(data.data, function(index, level){
                            $("#level").append(new Option(level.name_ar, level.id));
                            console.log(level.name_ar, $("#class").val(), $("#level").val());
                        });
                    }else{
                      $("#level").empty();
                      $("#level").append("<option value='' selected  disabled>{{__('lang.level')}}</option>");
                    }
                    },
            });
        }else{
                      $("#level").empty();
                      $("#level").append("<option value='' selected  disabled>{{__('lang.level')}}</option>");
                    }
    });
  });
</script>
@endpush
<!-- Input Validation end -->

@endsection