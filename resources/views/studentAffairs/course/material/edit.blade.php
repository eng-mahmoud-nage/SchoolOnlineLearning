@inject('stages', 'App\StudentAffairs\Stage')



@extends('index')

@section('css')

@endsection
@section('title')

@if(!empty($record) && $record['name_'.app()->getLocale()] == null)
{{__('lang.new_material')}}
@else
{{__('lang.edit_material')}}

@endif
@endsection
@section('content')

<div class="row">
  <div class="col-sm-12">
    {{-- <div class="content-header">Add course User</div> --}}
  </div>
</div>
<!-- Input Validation start -->
<section class="input-validation">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
      
        <div class="card-content">
          <div class="card-body">

            @if(!empty($record) && $record['title_'.app()->getLocale()] == null)
                   {{-- @dd('create') --}}
                   <div class=" content-header col-lg-12 @if(app()->getLocale() == 'ar') text-right @endif">{{__('lang.new_material')}}</div><br>
                    <form class="form-horizontal"  method="POST" action="{{route('material.store')}}" enctype="multipart/form-data">

                @else
                   {{-- @dd('update') --}}
                   <div class=" content-header col-lg-12 @if(app()->getLocale() == 'ar') text-right @endif">{{__('lang.edit_material')}}</div><br>
                    <form class="form-horizontal"  method="POST" action="{{route('material.update', $record->id)}}" enctype="multipart/form-data">

                @endif
            @csrf

              <div class="row">
                @if(!empty($record) && $record['title_'.app()->getLocale()] == null)

                <div class="col-lg-6 col-md-12">     


                  <div class="form-group">
                    <h5>{{__('lang.stage')}}<span class="required" style="color:red">*</span></h5>
                    <div class="controls">
                      <select class="stage" id="stage" name="stage_id" @if($record['name_'.app()->getLocale()]) required @endif >
                        
                        @if($record->classs_id)
                          <option value="{{$record->class->level->stage->id}}" selected  disabled>{{$record->class->level->stage['name_'.app()->getLocale()]}}</option>
                        @else
                          <option value="" selected  disabled>{{__('lang.stage')}}</option>
                        @endif

                        @foreach ($stages->all() as $stage)
                          <option value="{{$stage->id}}">{{$stage['name_'.app()->getLocale()]}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>

   
                  <div class="form-group">
                    <h5>{{__('lang.class')}}<span class="required" style="color:red">*</span></h5>
                    <div class="controls">
                      <select class="class" id="class" name="classs_id" required >
                       
                        @if($record->classs_id)
                      <option value="{{$record->class->id}}" selected  disabled>{{$record->class['name_'.app()->getLocale()]}}</option> </select>
                        @else
                        <option value="" selected  disabled>{{__('lang.class')}}</option> </select>
                        @endif

                    </div>
                  </div>



                </div>

                  <div class="col-lg-6 col-md-12">     
  
                    <div class="form-group">
                      <h5>{{__('lang.level')}}<span class="required" style="color:red">*</span></h5>
                      <div class="controls">
                        <select class="level" id="level" name="level_id"  @if($record['name_'.app()->getLocale()]) required @endif >
                         
                          @if($record->classs_id)
                        <option value="{{$record->class->level->id}}" selected  disabled>{{$record->class->level['name_'.app()->getLocale()]}}</option>
                          @else
                          <option value="" selected  disabled>{{__('lang.level')}}</option>
                          @endif
  
                      </select>
                      </div>
                    </div>

                  <div class="form-group">
                    <h5>{{__('lang.course')}}<span class="required" style="color:red">*</span></h5>
                    <div class="controls">
                      <select class="course" id="course" name="course_id" required>
                        <option value='' selected  disabled>{{__('lang.course')}}</option>
                      </select>
                    </div>
                  </div>
                  
                </div>
                @endif

                                
                <div class="col-lg-6 col-md-12">
                  @if($supersetting->lang == "English" || $supersetting->lang == "Both" )
                  <div class="form-group @if(app()->getLocale() == 'ar') text-right @endif">
                  <h5>{{__('lang.title_en')}}<span class="required" style="color:red">*</span></h5>
                    <div class="controls">
                      <input value="{{$record->title_en}}" type="text" name="title_en" class="form-control @error('title_en') is-invalid @enderror " required data-validation-required-message="This field is required">
                      @if(session('danger'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{session('danger')}}</strong>
                      </span>
                      @endif
                      @error('title_en')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                  @endif
                </div>

                <div class="col-lg-6 col-md-12">
                  @if($supersetting->lang == "Arabic" || $supersetting->lang == "Both" )
                    <div class="form-group @if(app()->getLocale() == 'ar') text-right @endif">
                      <h5>{{__('lang.title_ar')}}<span class="required" style="color:red">*</span></h5>
                      <div class="controls mb-1">
                      <input value="{{$record->title_ar}}" type="text" name="title_ar" class="form-control @error('title_ar') is-invalid @enderror " required data-validation-required-message="This field is required">
                      @if(session('danger'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{session('danger')}}</strong>
                      </span>
                      @endif
                      @error('title_ar')
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
                    
                    @if($record->type == 'video' || $record->type == null)
                                      <div class="form-group">
                                        <h5>{{__('lang.video_url')}}<span class="required" style="color:red">*</span></h5>
                                        <div class="controls mb-1">
                                          <input value="{{$record->source}}"  type="text" name="source" class="form-control @error('source') is-invalid @enderror" data-validation-required-message="This field is required">
                                          @error('source')
                                          <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                          </span>
                                          @enderror
                                        </div>
                                      </div>
                                      @endif
                  </div>
                  <div class="col-lg-6 col-md-12">
                    @if($record->type == 'file' || $record->type == null)

                                      <div class="form-group">
                                        <h5>{{__('lang.sources')}}<span class="required" style="color:red">*</span></h5>
                                        <div class="controls mb-1">
                                        <input type="file" name="sources[]" class="form-control @error('sources') is-invalid @enderror" data-validation-required-message="This field is required" @if(!$record->type) multiple @endif />
                                        @error('sources')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                      </div>
                                      </div>
                                      @endif
                </div>

                <div class="col-lg-12 col-md-12">
                  <div class="form-group @if(app()->getLocale() == 'ar') text-right @endif">
                    @if(!empty($record) && $record['title_'.app()->getLocale()] == null)
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

    $('#level').on('change',function(){
        var level_id = $('#level').val();
        if(level_id){
            $.ajax({
                url : "{{url('/class?level_id=')}}" + level_id,
                type: "GET",
                success:function(data){
                    if(data.status === 1){
                      $("#class").empty();
                      $("#class").append("<option value='' selected  disabled>{{__('lang.class')}}</option>");
                        $.each(data.data, function(index, level){
                            $("#class").append(new Option(level.name_ar, level.id));
                            console.log(level.name_ar, $("#class").val(), $("#level").val());
                        });
                    }else{
                      $("#class").empty();
                      $("#class").append("<option value='' selected  disabled>{{__('lang.class')}}</option>");
                    }

                    },
            });
        }else{
                      $("#class").empty();
                      $("#class").append("<option value='' selected  disabled>{{__('lang.class')}}</option>");
                    }
 });
   
 $('#class').on('change',function(){
        var classs_id = $('#class').val();
        var type = $('#class').data('type');
      
        if(classs_id){
            $.ajax({
                url : "{{url('/course?classs_id=')}}" + classs_id,
                type: "GET",
                success:function(data){
                    if(data.status === 1){
                      $("#course").empty();
                      $("#course").append("<option value='' selected  disabled>{{__('lang.course')}}</option>");
                        $.each(data.data, function(index, course){
                            $("#course").append(new Option(course.name_ar, course.id));
                            console.log(course.name_ar, $("#course").val(), $("#class").val());
                        });
                    }else{
                      $("#course").empty();
                      $("#course").append("<option value='' selected  disabled>{{__('lang.course')}}</option>");
                        
                    }
                    },
            });
        }else{
                      $("#course").empty();
                      $("#course").append("<option value='' selected  disabled>{{__('lang.course')}}</option>");
                        
                    }
 });
 $('.delete_file').on('click', function(e){
    e.preventDefault();
    let course_id = $(this).data('course_id');
    let file_id = $(this).data('file_id');
    console.log(course_id,file_id);
        if(confirm("Are you sure you want to delete this iamge?")){
            $.ajax({
                type : 'DELETE',
                url : '{{url("/destroyfile")}}',
                data : {
                    'course_id' : course_id,
                    'file_id' : file_id,
                    _token: '{{csrf_token()}}'
                },
                success : function(data){
                  console.log(data.data);
                  $(this).parents('.file').slideUp().remove();
                }.bind(this)
            })
        }
    });
 });
</script>
@endpush
<!-- Input Validation end -->

@endsection