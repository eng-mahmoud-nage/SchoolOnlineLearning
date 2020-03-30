@extends('index')

@section('title')
    {{__('lang.stds')}}
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h1 >{{__('lang.admins')}}</h1><br>
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
                   var create = {!! json_encode(auth()->guard('admin')->user()->can('create student')) !!};
                    var edit = {!! json_encode(auth()->guard('admin')->user()->can('edit student')) !!};
                    var del = {!! json_encode(auth()->guard('admin')->user()->can('destroy student')) !!};
                var print = {!! json_encode(auth()->guard('admin')->user()->can('print')) !!};
                var excel = {!! json_encode(auth()->guard('admin')->user()->can('excel')) !!};
                var pdf = {!! json_encode(auth()->guard('admin')->user()->can('pdf')) !!};
                var s_admin = {!! json_encode(auth()->guard('admin')->user()->hasRole('super admin')) !!};
                
                if(!s_admin){
                if(!create){
                     $('.buttons-create').addClass('disabled');
            }  if(!edit){
                     $('.edit').addClass('disabled');
            } if(!del){
                     $('.delete').addClass('disabled');
            }        if(!print){
                     $('.buttons-print').addClass('disabled');
            }        if(!excel){
                     $('.buttons-excel').addClass('disabled');
            }        if(!pdf){
                     $('.buttons-pdf').addClass('disabled');
            }}
</script>
@endpush


{{-- 
@inject('levels', 'App\StudentAffairs\Level')
@inject('stages', 'App\StudentAffairs\Stage')
@inject('classes', 'App\StudentAffairs\Classs')

@extends('index')

@section('title')
    {{__('lang.stds')}}
@endsection

@section('content')
    @if(!empty($records))
    <div class="card">
        <div class="card-header @if(app()->getLocale() == 'ar') text-right @endif">
            <a class="btn btn-outline-primary" style="width: 100px;" href="{{route('student.create')}}">
              <span class="float-md-left @if(app()->getLocale() == 'ar') float-md-right @endif">
                  <i class="fa fa-plus"></i>
              </span>{{__('lang.new')}}
            </a>
        </div><!-- /.card-header -->
        <div class="card-body">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12 col-12">
                        <table class="table table-bordered table-striped" style="@if(app()->getLocale() == 'ar') direction:rtl @endif">

                            <thead>
                            <tr role="row">
                                <th class="text-center" style="width:10px">
                                    #
                                </th>
                                <th class=" text-center" >
                                    {{__('lang.std_code')}}
                                </th>
                                <th class=" text-center" >
                                    {{__('lang.name')}}
                                </th>

                                <th class=" text-center" >
                                    {{__('lang.stage')}}
                                </th>

                                
                                <th class=" text-center" >
                                    {{__('lang.level')}}
                                </th>
                                
                                <th class=" text-center" >
                                    {{__('lang.class')}}
                                </th>
                                
                                <th class="text-center" style="width:50px">
                                    {{__('lang.actions')}}
                                </th>
                            </tr>

                            </thead>
                            <tbody>
                                @foreach($records as $record)
                                        <tr>
                                            <td class=" text-center">{{$loop->iteration}}</td>
                                            <td class="text-center">{{$record->student_code}}</td>
                                            <td class="text-center">{{$record['name_'.app()->getLocale()]}}</td>
                                        <td>{{$stages->where('id', $levels->where('id',$record->levels()->pluck('level_id'))->pluck('stage_id'))->pluck('name_'.app()->getLocale())[0]}}</td>
                                       <td>{{$levels->where('id',$record->levels()->pluck('level_id'))->pluck('name_'.app()->getLocale())[0]}}</td>
                                       <td>{{$classes->where('id',$record->levels()->pluck('class_id'))->pluck('name_'.app()->getLocale())[0]}}</td>
                                            <td class="text-center" >
                                                <a class="btn btn-info btn-group-vertical" href="{{route('student.show', $record->id)}}">
                                                    <i class="fas fa-user-edit"></i>
                                                </a>
                                                <a class="btn btn-info btn-group-vertical" href="{{route('student.edit', $record->id)}}">
                                                    <i class="fas fa-user-edit"></i>
                                                </a>
                                
                                                <form action="{{route('student.destroy', $record->id)}}" method="POST">
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
        whoops! : You don`t have Permission to access this page.
    </div>
    @endif

    @push('scripts')
    <script>
        function alert(){
const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: false
})

swalWithBootstrapButtons.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Yes, delete it!',
  cancelButtonText: 'No, cancel!',
  reverseButtons: true
}).then((result) => {
  if (result.value) {
    swalWithBootstrapButtons.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
  } else if (
    /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
  ) {
    swalWithBootstrapButtons.fire(
      'Cancelled',
      'Your imaginary file is safe :)',
      'error'
    )
  }
})
        };
    </script>
    @endpush
@endsection --}}