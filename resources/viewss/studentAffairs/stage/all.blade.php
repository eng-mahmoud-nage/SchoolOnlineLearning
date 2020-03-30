@extends('index')


@section('title')
    {{__('lang.stages')}}
@endsection

@section('content')

<div class="card">
    <div class="card-header">
        <h1 >{{__('lang.stages')}}</h1><br>
    </div><!-- /.card-header -->
    <div class="card-body">
        <div>
            <div class="row">
                <div class="col-sm-12">
                    {!! $dataTable->table([], true) !!}
                </div></div></div></div></div>
@endsection

@push('scripts')
    {{$dataTable->scripts()}}
            <script>

                var s_admin = {!! json_encode(auth()->guard('admin')->user()->hasRole('super admin')) !!};
                
                if(!s_admin){
                    var create = {!! json_encode(auth()->guard('admin')->user()->can('create stage')) !!};
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
</script>
@endpush

{{-- @section('content')
    @if(!empty($records))
    <div class="card">
        <div class="card-header @if(app()->getLocale() == 'ar') text-right @endif">
            <h1>{{__('lang.stages')}}</h1>

            <a class="btn btn-outline-primary" style="width: 100px;" href="{{route('stage.create')}}">
              <span class="float-md-left @if(app()->getLocale() == 'ar') float-md-right @endif">
                  <i class="fa fa-plus"></i>
              </span>{{__('lang.new')}}
            </a>
        </div><!-- /.card-header -->
        <div class="card-body">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row ">
                    <div class="col-sm-12">
                        <table class="table table-bordered table-striped" style="@if(app()->getLocale() == 'ar') direction:rtl @endif">

                            <thead>
                            <tr role="row">
                                <th class="text-center" style="width:10px">
                                     #
                                </th>
                                @if($supersetting->lang == "Arabic" || $supersetting->lang == "Both" )
                                <th class=" text-center" >
                                    {{__('lang.name_ar')}}
                                </th>

                                @endif
                                @if($supersetting->lang == "English" || $supersetting->lang == "Both" )
                                <th class=" text-center" >
                                    {{__('lang.name_en')}}
                                </th>
                                @endif

                            
                                <th class="text-center" style="width:50px">
                                    {{__('lang.actions')}}
                                </th>
                            </tr>

                            </thead>
                            <tbody>
                                @foreach($records as $record)
                                        <tr>
                                            <td class="sorting_1 text-center">{{$loop->iteration}}</td>
                                            @if($supersetting->lang == "Arabic" || $supersetting->lang == "Both" )
                                            <td class="text-center">{{$record->name_ar}}</td>

                                            @endif
                                            @if($supersetting->lang == "English" || $supersetting->lang == "Both" )
                                            <td class="text-center">{{$record->name_en}}</td>
                                            @endif
                                            <td class="text-center" >
                                                <a class="btn btn-info btn-group-vertical" href="{{route('stage.edit', $record->id)}}">
                                                    <i class="fas fa-user-edit"></i>
                                                </a>
                                
                                                <form action="{{route('stage.destroy', $record->id)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                   
                                                        <button onclick="alert()" class="btn btn-danger btn-group-vertical">
                                                            <i class="fas fa-trash-alt" ></i>
                                                        </button>
                                                </form>
                                            </td>

                                        </tr>
                  
                                @endforeach
                            </tbody>
                        </table></div></div>
                        <div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 10 of {{floor($records->count()/10)}} entries</div></div><div class="col-sm-12 col-md-7"><div class="float-md-right">{{ $records->links() }} </div></div></div></div>
        
                                   </div>


        <!-- /.card-body -->
    </div>

@else
    <div class="alert alert-danger">
        
    </div>
    @endif
@endsection --}}