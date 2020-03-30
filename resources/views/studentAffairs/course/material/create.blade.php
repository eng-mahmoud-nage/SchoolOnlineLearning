@inject('stages', 'App\StudentAffairs\Stage')


@extends('index')

@section('css')

@endsection
@section('title')

@if(!empty($record) && $record['name_'.app()->getLocale()] == null)
{{__('lang.new_course')}}
@else
{{__('lang.edit_course')}}

@endif
@endsection
@section('content')

<div class="row">
  <div class="col-sm-12">
  </div>
</div>
<!-- Input Validation start -->
<section class="input-validation">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
      
        <div class="card-content">
          <div class="card-body">

            <form class="form-horizontal"  method="POST" action="{{url('/upload')}}" enctype="multipart/form-data">

            @csrf

              <div class="row">

                <div class="col-lg-6 col-md-12">     
              
                  <div class="form-group">
                    <h5>{{__('lang.stage')}}<span class="required" style="color:red">*</span></h5>
                    <div class="controls">
                      <select class="stage" id="stage" name="stage_id" required >
                        <option value="" disabled selected>Stage</option>
                        @foreach ($stages->all() as $stage)
                          <option value="{{$stage->id}}" >{{$stage['name_'.app()->getLocale()]}}</option>
                        @endforeach
                      </select>
                    </div>
                </div>


                  <div class="form-group">
                    <h5>{{__('lang.level')}}<span class="required" style="color:red">*</span></h5>
                    <div class="controls">
                    <select data-type="{{$supersetting->type}}" class="level" id="level" name="level_id" required >
                        {{-- // append ajax --}}
                      </select>
                    </div>
                  </div>

                  @if($supersetting->type == 1)
                  <div class="form-group">
                    <h5>{{__('lang.class')}}<span class="required" style="color:red">*</span></h5>
                    <div class="controls">
                      <select data-type="{{$supersetting->type}}" class="class" id="class" name="classs_id" required >
                        {{-- // append ajax --}}
                      </select>
                    </div>
                  </div>
                  @endif

                  <div class="form-group">
                    <h5>{{__('lang.course')}}<span class="required" style="color:red">*</span></h5>
                    <div class="controls">
                      <select class="course" id="course" name="course_id" required>
                        {{-- // append ajax --}}
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <h5>{{__('lang.video_url')}}<span class="required" style="color:red">*</span></h5>
                    <div class="controls mb-1">
                    <input type="text" name="source" class="form-control @error('source') is-invalid @enderror" required data-validation-required-message="This field is required">
                    @error('source')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  </div>
                  
                  
                </div>
                {{-- end left side --}}
                <div class="col-lg-6 col-md-12">

                    <div class="form-group">
                        <h5>{{__('lang.title')}}<span class="required" style="color:red">*</span></h5>
                        <div class="controls mb-1">
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" required data-validation-required-message="This field is required">
                        @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                      </div>
                    
                                      <div class="form-group">
                                        <h5>{{__('lang.sources')}}<span class="required" style="color:red">*</span></h5>
                                        <div class="controls mb-1">
                                        <input type="file" name="sources[]" class="form-control @error('sources') is-invalid @enderror" data-validation-required-message="This field is required" multiple />
                                        @error('sources')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                      </div>
                                      </div>
                </div>
                  <div class="col-lg-12 col-md-12">
                    <div class="form-group">
                      <button type="submit" class="btn btn-success">{{__('lang.submit')}} <i class="fa fa-thumbs-o-up position-right"></i></button>
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