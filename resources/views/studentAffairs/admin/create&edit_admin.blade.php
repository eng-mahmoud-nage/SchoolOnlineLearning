@inject('role', "Spatie\Permission\Models\Role")
@inject('permission', "Spatie\Permission\Models\Permission")

@extends('index')

@section('css')

@endsection
@section('title')

@if(!empty($record) && $record['name_'.app()->getLocale()] == null)
{{__('lang.new_admin')}}
@else
{{__('lang.edit_admin')}}

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

            @if(!empty($record) && $record->email == null)
                   {{-- @dd('create') --}}
                   <div class=" content-header col-lg-12 @if(app()->getLocale() == 'ar') text-right @endif">{{__('lang.new_admin')}}</div><br>
                    <form class="form-horizontal" method="POST" action="{{route('admins.store')}}">

                @else
                   {{-- @dd('update') --}}
                   <div class=" content-header col-lg-12 @if(app()->getLocale() == 'ar') text-right @endif">{{__('lang.edit_admin')}}</div><br>
                    <form class="form-horizontal" method="POST" action="{{route('admins.update', $record->id)}}">

                @endif


            @csrf
              <div class="row">
                
                <div class="col-lg-6 col-md-12">
                  @if($supersetting->lang == "English" || $supersetting->lang == "Both" )
                  <div class="form-group @if(app()->getLocale() == 'ar') text-right @endif">
                    <h5>{{__('lang.name_en')}}<span class="required" style="color:red">*</span></h5>
                    <div class="controls">
                      <input value="{{$record->name_en}}" type="text" name="name_en" class="form-control @error('name_ar') is-invalid @enderror" required data-validation-required-message="This field is required">
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

                  @if($supersetting->lang == "Arabic" || $supersetting->lang == "Both" )
                  <div class="form-group @if(app()->getLocale() == 'ar') text-right @endif">
                    <h5>{{__('lang.name_ar')}}<span class="required" style="color:red">*</span></h5>
                    <div class="controls mb-1">
                    <input value="{{$record->name_ar}}" type="text" name="name_ar" class="form-control @error('name_ar') is-invalid @enderror" required data-validation-required-message="This field is required">
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
                <div class="col-md-12 col-lg-6">
                  <div class="form-group @if(app()->getLocale() == 'ar') text-right @endif">
                    <h5>{{__('lang.email')}}<span class="required" style="color:red">*</span></h5>
                    <div class="controls mb-1">
                      <input value="{{$record->email}}" type="email" name="email" data-validation-match-match="email" class="form-control @error('name_ar') is-invalid @enderror" required autocomplete="false">
                      @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>

                  <div class="form-group @if(app()->getLocale() == 'ar') text-right @endif">
                    <h5>{{__('lang.password')}}<span class="required" style="color:red">*</span></h5>
                    <div class="controls mb-1">
                      <input  type="password" name="password" class="form-control @error('name_ar') is-invalid @enderror" @if(!$record->email) required @endif autocomplete="false" data-validation-required-message="This field is required">
                      @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                </div>
              </div>



              <div class="form-group role">
                <label for="role_list">{{__('lang.roles')}}</label><br>
                <a class="checkAllRole btn btn-sm btn-primary">checkAll</a>
                <a class="uncheckAllRole btn btn-sm btn-warning">uncheckAll</a>
                <div class="row">
                    @foreach($role->all() as $p)
                        <div class="col-md-3">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" id="role_list" value="{{$p->id}}" name="role_list[]"
                                           @if($record->hasRole($p->name))
                                           checked
                                        @endif
                                    >
                                    {{$p->name}}
                                </label>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

                <div class="form-group permission">
    <label for="permission_list">{{__('lang.permissions')}}</label><br>
    <a class="checkAllPermission btn btn-sm btn-primary">checkAll</a>
    <a class="uncheckAllPermission btn btn-sm btn-warning">uncheckAll</a>
    <div class="row">
        @foreach($permission->all() as $p)
            <div class="col-md-3">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" id="permission_list" value="{{$p->id}}" name="permission_list[]"
                               @if($record->hasPermissionTo($p->name))
                               checked
                            @endif
                        >
                        {{$p->name}}
                    </label>
                </div>
            </div>
        @endforeach
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
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@push('scripts')
    <script>
        $('.checkAllPermission').click(function(){
            $('.permission input:checkbox').each(function(){
                $(this).prop('checked',true);
            })
        });
        $('.uncheckAllPermission').click(function(){
            $('.permission input:checkbox').each(function(){
                $(this).prop('checked',false);
            })
        });
        $('.checkAllRole').click(function(){
            $('.role input:checkbox').each(function(){
                $(this).prop('checked',true);
            })
        });
        $('.uncheckAllRole').click(function(){
            $('.role input:checkbox').each(function(){
                $(this).prop('checked',false);
            })
        });

    </script>
@endpush
<!-- Input Validation end -->

@endsection