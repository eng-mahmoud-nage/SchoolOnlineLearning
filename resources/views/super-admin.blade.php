@extends('index')

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
            <form class="form-horizontal" novalidate method="POST" action="{{url('/super-admin-data')}}">
              @csrf
                <div class="row">
                  <div class="col-lg-12 col-md-12">

                    <div class="form-group" style="margin-buttom:20px">
                        <select name="lang" data-placeholder="@if(isset($record->lang)) {{$record->lang}} @else Select Language @endif">
                            <option value="Arabic">Arabic</option>
                            <option value="English">English</option>
                            <option value="Both">Both</option>
                        </select>
                    </div>
  
                    <div class="form-group">
                      <h5>Cost<span class="required" style="color:red">*</span></h5>
                      <div class="controls mb-1">
                      <input value='' type="number" name="cost" class="form-control" required data-validation-required-message="This field is required">
                      </div>
                    </div>
  
                  </div>
  {{-- end left side --}}
                 
                    <div class="text-right">
                  <button type="submit" class="btn btn-success">Edit <i class="fa fa-thumbs-o-up position-right"></i></button>
                      <button type="reset" class="btn btn-danger">Reset <i class="fa fa-refresh position-right"></i></button>
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

@endsection