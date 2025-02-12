@inject('stages', 'App\StudentAffairs\Stage')


@extends('index')

@section('css')

@endsection
@section('title')

{{__('lang.materials')}}

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
<div class="card-header">
  <h3>{{__('lang.materials')}}</h3>
</div>

          <div class="card-body" style="
          display: flex;
          text-align: center;
          flex-wrap: wrap;
      ">
      <div class="col-lg-3"></div>
                   <div class="col-lg-6 col-md-12">     
                    <div class="form-group">

                      <h5>{{__('lang.stage')}}<span class="required" style="color:red">*</span></h5>
                      <div class="controls">
                        <select class="stage" id="stage" name="stage_id" required >
                          <option value="" selected  disabled>{{__('lang.stage')}}</option>
                          @foreach ($stages->all() as $stage)
                            <option value="{{$stage->id}}">{{$stage['name_'.app()->getLocale()]}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
  
               
                    <div class="form-group">
                      <h5>{{__('lang.level')}}<span class="required" style="color:red">*</span></h5>
                      <div class="controls">
                        <select class="level" id="level" name="level_id"  required  >
                          <option value="" selected  disabled>{{__('lang.level')}}</option>
                      </select>
                      </div>
                    </div>
{{--                  
                    <div class="form-group">
                      <h5>{{__('lang.class')}}<span class="required" style="color:red">*</span></h5>
                      <div class="controls">
                        <select class="class" id="class" name="classs_id" required >
                          <option value="" selected  disabled>{{__('lang.class')}}</option> </select>
                      </div>
                    </div> --}}

                    <form class="form-horizontal" method="get" action="{{route('material.index')}}">
                      @csrf
            
                      <div class="form-group">
                        <h5>{{__('lang.course')}}<span class="required" style="color:red">*</span></h5>
                        <div class="controls">
                          <select class="course" id="course" name="course_id" required>
                            <option value='' selected  disabled>{{__('lang.course')}}</option>
                          </select>
                        </div>
                      </div>

                    <button type="submit" class="btn btn-success">{{__('lang.search')}} <i class="fa fa-thumbs-o-up position-right"></i></button>
                    </form>

                  </div>
                  <div class="col-lg-3"></div>
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
                url : "{{url('/course?level_id=')}}" + level_id,
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

          var s_admin = {!! json_encode(auth()->guard('admin')->user()->hasRole('super admin')) !!};
                
                if(!s_admin){
                    var create = {!! json_encode(auth()->guard('admin')->user()->can('create level')) !!};
                var print = {!! json_encode(auth()->guard('admin')->user()->can('print')) !!};
                var excel = {!! json_encode(auth()->guard('admin')->user()->can('excel')) !!};
                var pdf = {!! json_encode(auth()->guard('admin')->user()->can('pdf')) !!};
                if(!create){
                     $('.buttons-create').addClass('disabled');
            }        if(!print){
                     $('.buttons-print').addClass('disabled');
            }        if(!excel){
                     $('.buttons-excel').addClass('disabled');
            }        if(!pdf){
                     $('.buttons-pdf').addClass('disabled');
            }}

});

</script>

@endpush

<!-- Input Validation end -->

@endsection

{{-- $('#course').on('change',function(){
  var course_id = $('#course').val();
  if(course_id){
    console.log(course_id);

    $('#data').dataTable( {

      "ajax" : {
          "url"  : "{{url('/get-material?course_id=')}}" + course_id,
          "type" : "GET",
          "dataSrc": "tableData",
          "success" : function(data){
                console.log(data.data);

              },
      }
} ); --}}