@inject('stages', 'App\StudentAffairs\Stage')
@inject('levels', 'App\StudentAffairs\Level')
@inject('classes', 'App\StudentAffairs\Classs')


@inject('nationals', 'App\StudentAffairs\Nationality')
@inject('places', 'App\StudentAffairs\Place')
@inject('regions', 'App\StudentAffairs\Region')


@extends('index')

@section('css')

@endsection

@section('title')

@if(!empty($record) && $record['name_'.app()->getLocale()] == null)
{{__('lang.new_std')}}
@else
{{__('lang.edit_std')}}

@endif
@endsection

@section('content')
                    <!-- Wizard Starts -->
                  <section id="icon-tabs">
                      <div class="row">
                          <div class="col-12">
                                  <div class="card-content">
                                      <div class="card-body">
                                        @if(!empty($record) && $record['name_'.app()->getLocale()] == null)
                                        {{-- @dd('create') --}}
                                        <div class=" content-header col-lg-12 @if(app()->getLocale() == 'ar') text-right @endif">{{__('lang.new_std')}}</div><br>
                                         <form class="icons-tab-steps wizard-circle"  method="POST" action="{{route('student.store')}}">
                     
                                     @else
                                        {{-- @dd('update') --}}
                                        <div class=" content-header col-lg-12 @if(app()->getLocale() == 'ar') text-right @endif">{{__('lang.edit_std')}}</div><br>
                                         <form class="icons-tab-steps wizard-circle"  method="POST" action="{{route('student.update', $record->id)}}">
                     
                                     @endif
                                 @csrf
                                              <!-- Step 1 -->
                                              <h6>{{__('lang.school_info')}}</h6>
                                              <fieldset>
                                                  <div class="row">
                                                      <div class="col-lg-6 col-md-12">
                                                          <div class="form-group">
                                                            <h5>{{__('lang.stage')}}<span class="required" style="color:red">*</span></h5>
                                                            <div class="controls">
                                                              <select class="stage" id="stage" name="stage_id" required data-placeholder="@if($stages->where('id', $record->stage_id)->first()) {{$stages->where('id', $record->stage_id)->pluck('name_'.app()->getLocale())}} @else {{__('lang.select_stage')}} @endif">
                                                                <option value="">Stage</option>
                                                                @foreach ($stages->all() as $stage)
                                                                  <option value="{{$stage->id}}" @if(isset($rel)) @foreach($rel as $l) @if($stage->id == $l->pivot->stage_id) selected @endif @endforeach @endif>{{$stage['name_'.app()->getLocale()]}}</option>
                                                                @endforeach
                                                              </select>
                                                            </div>
                                                        </div>

                                                          <div class="form-group">
                                                            <h5>{{__('lang.level')}}<span class="required" style="color:red">*</span></h5>
                                                            <div class="controls">
                                                              <select class="level" id="level" name="level_id" required data-placeholder="@if($levels->where('id', $record->level_id)->first()) {{$levels->where('id', $record->level_id)->pluck('name_'.app()->getLocale())}} @else {{__('lang.select_level')}} @endif">
                                                              @if(isset($rel))  @foreach($rel as $l)  <option value="{{$l->id}}"   @if($l) selected @endif >{{$l['name_'.app()->getLocale()]}}</option> @endforeach @endif
                                                              </select>
                                                            </div>
                                                          </div>

                                                          <div class="form-group">
                                                            <h5>{{__('lang.class')}}<span class="required" style="color:red">*</span></h5>
                                                            <div class="controls">
                                                              <select class="class" id="class" name="class_id" required data-placeholder="@if($classes->where('id', $record->class_id)->first()) {{$classes->where('id', $record->class_id)->pluck('name_'.app()->getLocale())}} @else {{__('lang.select_class')}} @endif">
                                                              @if(isset($rel)) @foreach($rel as $l)  <option value="{{$l->pivot->class_id}}" @if($l->pivot->class_id) selected @endif >{{$classes->where('id', $l->pivot->class_id)->pluck('name_'.app()->getLocale())[0]}}</option>@endforeach @endif
                                                              </select>
                                                            </div>
                                                          </div>

                                                      </div>
                                                  </div>

                                              </fieldset>
                                              <!-- Step 2 -->
                                              <h6>{{__('lang.std_info')}}</h6>
                                              <fieldset id="std_info">
                                                  <div class="row">
                                                      <div class="col-lg-6 col-md-12">
                                                        @if($supersetting->lang == "English" || $supersetting->lang == "Both" )
                                                        <div class="form-group">
                                                        <h5>{{__('lang.name_en')}}<span class="required" style="color:red">*</span></h5>
                                                          <div class="controls">
                                                            <input id="name_en" value="{{$record->name_en}}" type="text" name="name_en" class="form-control @error('name_en') is-invalid @enderror " required data-validation-required-message="This field is required">
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
                                                        @endif
                                                      </div>

                                                      <div class="col-lg-6 col-md-12">
                                                        @if($supersetting->lang == "Arabic" || $supersetting->lang == "Both" )
                                                        <div class="form-group">
                                                          <h5>{{__('lang.name_ar')}}<span class="required" style="color:red">*</span></h5>
                                                          <div class="controls mb-1">
                                                          <input id="name_ar" value="{{$record->name_ar}}" type="text" name="name_ar" class="form-control @error('name_ar') is-invalid @enderror " required data-validation-required-message="This field is required">
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
                                                      <div class="col-lg-6 col-md-12">
                                                        @if($supersetting->lang == "English" || $supersetting->lang == "Both" )
                                                        <div class="form-group">
                                                        <h5>{{__('lang.address_en')}}<span class="required" style="color:red">*</span></h5>
                                                          <div class="controls">
                                                            <input value="{{$record->address_en}}" type="text" name="address_en" class="form-control @error('address_en') is-invalid @enderror " required data-validation-required-message="This field is required">
                                                            @if(session('danger'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{session('danger')}}</strong>
                                                            </span>
                                                            @endif
                                                            @error('address_en')
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
                                                        <div class="form-group">
                                                          <h5>{{__('lang.address_ar')}}<span class="required" style="color:red">*</span></h5>
                                                          <div class="controls mb-1">
                                                          <input value="{{$record->address_ar}}" type="text" name="address_ar" class="form-control @error('address_ar') is-invalid @enderror " required data-validation-required-message="This field is required">
                                                          @if(session('danger'))
                                                          <span class="invalid-feedback" role="alert">
                                                              <strong>{{session('danger')}}</strong>
                                                          </span>
                                                          @endif
                                                          @error('address_ar')
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
                                                        <h5>{{__('lang.dob')}}<span class="required" style="color:red">*</span></h5>
                                                          <div class="controls">
                                                            <input value="{{$record->dob}}" type="date" name="dob" class="form-control @error('dob') is-invalid @enderror " required data-validation-required-message="This field is required">
                                                            @error('dob')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                          </div>
                                                        </div>

                                                      
                                                            <div class="form-group">
                                                                <h5>{{__('lang.phone')}}<span class="required" style="color:red">*</span></h5>
                                                                  <div class="controls">
                                                                    <input value="{{$record->phone}}" type="tel" name="phone" class="form-control @error('phone') is-invalid @enderror " required data-validation-required-message="This field is required">
                                                                    @error('phone')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                  </div>
                                                                </div>


                                                                <div class="form-group">
                                                                  <h5>{{__('lang.gender')}}<span class="required" style="color:red">*</span></h5>
                                                                  <div class="controls">
                                                                    <select class="gender" id="gender" name="gender" required data-placeholder="@if($record->gender) {{$record->gender}} @else {{__('lang.select_type')}} @endif">
                                                                      <option value="">{{__('lang.gender')}}</option>
                                                                      <option value="1">{{__('lang.male')}}</option>
                                                                      <option value="2">{{__('lang.female')}}</option>
                                                                  </select>
                                                                  </div>
                                                                </div>

                                                                <div class="form-group">
                                                                  <h5>{{__('lang.nationality')}}<span class="required" style="color:red">*</span></h5>
                                                                  <div class="controls">
                                                                    <select class="nationality" id="nationality" name="nationality_id" required data-placeholder="@if($nationals->where('id', $record->nationality_id)->first()) {{$nationals->where('id', $record->nationality_id)->pluck('name_'.app()->getLocale())}} @else {{__('lang.select_nationality')}} @endif">
                                                                      <option value="">{{__('lang.nationality')}}</option>
                                                                      
                                                                      @foreach ($nationals->all() as $nationality)
                                                                        <option value="{{$nationality->id}}">{{$nationality['name_'.app()->getLocale()]}}</option>
                                                                      @endforeach
                                                                    </select>
                                                                  </div>
                                                              </div>
      
                                                              <div class="form-group">
                                                                  <h5>{{__('lang.place')}}<span class="required" style="color:red">*</span></h5>
                                                                  <div class="controls">
                                                                    <select class="place" id="place" name="place_id" required data-placeholder="@if($places->where('id', $record->place_id)->first()) {{$places->where('id', $record->place_id)->pluck('name_'.app()->getLocale())}} @else {{__('lang.select_place')}} @endif">
                                                                      <option value="">{{__('lang.place')}}</option>
                                                                      
                                                                      @foreach ($places->all() as $place)
                                                                        <option value="{{$place->id}}">{{$place['name_'.app()->getLocale()]}}</option>
                                                                      @endforeach
                                                                    </select>
                                                                  </div>
                                                              </div>
      
                                                              <div class="form-group">
                                                                  <h5>{{__('lang.region')}}<span class="required" style="color:red">*</span></h5>
                                                                  <div class="controls">
                                                                    <select class="region" id="region" name="region_id" required data-placeholder="@if($regions->where('id', $record->region_id)->first()) {{$regions->where('id', $record->stage_id)->pluck('name_'.app()->getLocale())}} @else {{__('lang.select_region')}} @endif">
                                                                      <option value="">{{__('lang.region')}}</option>
                                                                      
                                                                      @foreach ($regions->all() as $region)
                                                                        <option value="{{$region->id}}">{{$region['name_'.app()->getLocale()]}}</option>
                                                                      @endforeach
                                                                    </select>
                                                                  </div>
                                                              </div>
      
                                                         
                                                      </div>
                                                      <div class="col-md-12 col-lg-6">

                                                        <div class="form-group">
                                                          <h5>{{__('lang.national_id')}}<span class="required" style="color:red">*</span></h5>
                                                            <div class="controls">
                                                              <input value="{{$record->dob}}" type="text" name="national_id" class="form-control @error('national_id') is-invalid @enderror " required data-validation-required-message="This field is required">
                                                              @error('national_id')
                                                              <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $message }}</strong>
                                                              </span>
                                                              @enderror
                                                            </div>
                                                          </div>


                                                          <div class="form-group">
                                                            <h5>{{__('lang.image')}}<span class="required" style="color:red">*</span></h5>
                                                              <div class="controls">
                                                                <input value="{{$record->image}}" type="file" name="image" class="form-control @error('image') is-invalid @enderror " required data-validation-required-message="This field is required">
                                                                @error('image')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                              </div>
                                                            </div>


                                                          <div class="form-group">
                                                            <h5>{{__('lang.religion')}}<span class="required" style="color:red">*</span></h5>
                                                            <div class="controls">
                                                              <select class="religion" id="religion" name="religion" required data-placeholder="@if($record->religion) {{$record->religion}} @else {{__('lang.select_religion')}} @endif">
                                                                
                                                                <option value="">{{__('lang.religion')}}</option>
                                                                <option value="1">{{__('lang.muslim')}}</option>
                                                                <option value="2">{{__('lang.qipty')}}</option>
                                                            </select>
                                                            </div>
                                                          </div>
                                                          
                                                          <div class="form-group">
                                                            <h5>{{__('lang.second_lang')}}<span class="required" style="color:red">*</span></h5>
                                                            <div class="controls">
                                                              <select class="second_lang" id="second_lang" name="second_lang" required data-placeholder="@if($record->second_lang) {{$record->second_lang}} @else {{__('lang.select_nd_lang')}} @endif">
                                                                <option value="">{{__('lang.second_lang')}}</option>
                                                                <option value="1">{{__('lang.nd_lang1')}}</option>
                                                                <option value="2">{{__('lang.nd_lang2')}}</option>
                                                                <option value="3">{{__('lang.nd_lang3')}}</option>

                                                            </select>
                                                            </div>
                                                          </div>
                                                                                                              
                                                          <div class="form-group">
                                                            <h5>{{__('lang.class_major')}}<span class="required" style="color:red">*</span></h5>
                                                            <div class="controls">
                                                              <select class="class_major" id="class_major" name="class_major" required data-placeholder="@if($record->class_major) {{$record->class_major}} @else {{__('lang.select_major')}} @endif">
                                                                <option value="">{{__('lang.class_major')}}</option>
                                                                <option value="1">{{__('lang.major1')}}</option>
                                                                <option value="2">{{__('lang.major2')}}</option>
                                                            </select>
                                                            </div>
                                                          </div>

                                                      </div>
                                                  </div>

                                              </fieldset>
                                              <!-- Step 3 -->
                                              <h6>{{__('lang.parent_info')}}</h6>
                                              <fieldset>
                                                <div class="row">
                                                  <div class="col-12">
                                                    <div class="form-group">
                                                      <h5>{{__('lang.status')}}<span class="required" style="color:red">*</span></h5>
                                                      <div class="controls">
                                                        <select class="status" id="status" name="p_status" data-placeholder="@if($record->religion) {{$record->religion}} @else {{__('lang.select_religion')}} @endif">
                                                          <option value="">{{__('lang.status')}}</option>
                                                          <option value="new">{{__('lang.new')}}</option>
                                                      </select>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div><br><br>

                                                <div class="row">
                                                        <div class="col-md-6 col-lg-6">
                                                    <div class="form-group">
                                                      <h5>{{__('lang.phone')}}<span class="required" style="color:red">*</span></h5>
                                                        <div class="controls" id="message">
                                                          <input id="parent_phone" value="{{$parent->parent_phone}}" type="tel" name="parent_phone" class="form-control @error('parent_phone') is-invalid @enderror "  data-validation-required-message="This field is required">
                                                          @error('parent_phone')
                                                          <span class="invalid-feedback" role="alert">
                                                              <strong>{{ $message }}</strong>
                                                          </span>
                                                          @enderror
                                                        </div>
                                                      </div>
                                                  </div>
                                                </div>

                                                  <div class="row" id='new' style="display: none">
        
                                                    <div class="col-lg-6 col-md-12">
                                                        @if($supersetting->lang == "English" || $supersetting->lang == "Both" )
                                                        <div class="form-group" >
                                                        <h5>{{__('lang.name_en')}}<span class="required" style="color:red">*</span></h5>
                                                          <div class="controls">
                                                            <input value="{{$parent->parent_name_en}}" type="text" name="parent_name_en" class="form-control @error('parent_name_en') is-invalid @enderror " data-validation-required-message="This field is required">
                                                            @if(session('danger'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{session('danger')}}</strong>
                                                            </span>
                                                            @endif
                                                            @error('parent_name_en')
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
                                                        <div class="form-group">
                                                          <h5>{{__('lang.name_ar')}}<span class="required" style="color:red">*</span></h5>
                                                          <div class="controls mb-1">
                                                          <input id="parent_name_ar" value="{{$parent->parent_name_ar}}" type="text" name="parent_name_ar" class="form-control @error('parent_name_ar') is-invalid @enderror "  data-validation-required-message="This field is required">
                                                          @if(session('danger'))
                                                          <span class="invalid-feedback" role="alert">
                                                              <strong>{{session('danger')}}</strong>
                                                          </span>
                                                          @endif
                                                          @error('parent_name_ar')
                                                          <span class="invalid-feedback" role="alert">
                                                              <strong>{{ $message }}</strong>
                                                          </span>
                                                          @enderror
                                                        </div>
                                                        </div>
                                                        @endif
                                                      </div>

                                                

                                                      <div class="col-md-12 col-lg-6">
                                                        <div class="form-group">
                                                            <h5>{{__('lang.job')}}<span class="required" style="color:red">*</span></h5>
                                                            <div class="controls mb-1">
                                                            <input value="{{$parent->parent_job}}" type="text" name="parent_job" class="form-control @error('parent_job') is-invalid @enderror "  data-validation-required-message="This field is required">
                                                            @error('parent_job')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                          </div>
                                                          </div>

                                                          <div class="form-group">
                                                            <h5>{{__('lang.email')}}<span class="required" style="color:red">*</span></h5>
                                                            <div class="controls mb-1">
                                                            <input value="{{$parent->parent_email}}" type="email" name="parent_email" class="form-control @error('parent_email') is-invalid @enderror "  data-validation-required-message="This field is required">
                                                            @error('parent_email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                          </div>
                                                          </div>

                                                          <div class="form-group">
                                                            <h5>{{__('lang.kindship')}}<span class="required" style="color:red">*</span></h5>
                                                            <div class="controls">
                                                              <select class="kindship" id="kindship" name="kindship" data-placeholder="@if($record->kindship) {{$record->kindship}} @else {{__('lang.select_kindship')}} @endif">
                                                                <option value="">{{__('lang.kindship')}}</option>
                                                                <option value="1">{{__('lang.father')}}</option>
                                                                <option value="2">{{__('lang.mother')}}</option>
                                                                <option value="1">{{__('lang.gfather')}}</option>
                                                                <option value="2">{{__('lang.gmother')}}</option>
                                                                <option value="1">{{__('lang.uncle')}}</option>
                                                                <option value="2">{{__('lang.aunt')}}</option>
                                                                <option value="2">{{__('lang.other')}}</option>
                                                            </select>
                                                            </div>
                                                          </div>

                                                      </div>
                                                      
                                                      <div class="col-md-12 col-lg-6">

                                                          
                                                        {{-- <div class="form-group" id='new old' style="display: none">
                                                            <h5>{{__('lang.phone')}}<span class="required" style="color:red">*</span></h5>
                                                              <div class="controls">
                                                                <input value="{{$parent->parent_phone}}" type="tel" name="parent_phone" class="form-control @error('parent_phone') is-invalid @enderror "  data-validation-required-message="This field is required">
                                                                @error('parent_phone')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                              </div>
                                                            </div> --}}

                                                        <div class="form-group">
                                                            <h5>{{__('lang.status')}}<span class="required" style="color:red">*</span></h5>
                                                            <div class="controls">
                                                              <select class="parent_status" id="parent_status" name="parent_status" data-placeholder="@if($record->parent_status) {{$record->parent_status}} @else {{__('lang.select_status')}} @endif">
                                                                <option value="">{{__('lang.status')}}</option>
                                                                <option value="1">{{__('lang.life')}}</option>
                                                                <option value="2">{{__('lang.dead')}}</option>
                                                            </select>
                                                            </div>
                                                          </div>

                                              

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
                                              </fieldset>
                                          </form>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </section>
                  <!-- Wizard Ends -->

@push('scripts')
<script type="text/javascript">
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
                      $("#level").append('<option>Level</option>');
                        $.each(data.data, function(index, level){
                            $("#level").append(new Option(level.name_ar, level.id));
                            console.log(level.name_ar, $("#class").val(), $("#level").val());
                        });
                    }

                    },
            });
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
                      $("#class").append('<option>class</option>');
                        $.each(data.data, function(index, level){
                            $("#class").append(new Option(level.name_ar, level.id));
                            console.log(level.name_ar, $("#class").val(), $("#level").val());
                        });
                    }

                    },
            });
        }
    });

    $('#status').on('change',function(){
        var st = $('#status').val();
  if(st == 'new'){
          $("#new").css("display", "block");
        }else{
          $("#new").css("display", "none");
        }
    });

$('#parent_phone').change(function(){
      
  var parent_phone = $('#parent_phone').val();
  console.log(parent_phone);
         if(parent_phone){
            $.ajax({
                url : "{{url('/parent?parent_phone=')}}" + parent_phone,
                type: "GET",
                success:function(data){
                  console.log(data.message);
                  $("#message #alert").remove();
                      $("#message").append('<div class="alert alert-success" id="alert">'+ data.message +'</div>');
                    },
            });
        }

});


});
    
</script>
@endpush

@endsection

                  