@inject('stages', 'App\StudentAffairs\Stage')


@extends('index')

@section('css')

@endsection
@section('title')

{{__('lang.materials')}}

@endsection
@section('content')

<div class="row">

    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
            <th>{{__('lang.title')}}</th>
            <th>{{__('lang.type')}}</th>
            <th>{{__('lang.actions')}}</th>
            </tr>
        </thead>
        <tbody>


    @foreach ($files as $file)
<tr>
<td>{{$file['title_'.app()->getLocale()]}}</td>
<td>{{$file->type}}</td>

<td>
    <div style="display:inline-flex">
        @if($file->type == 'video')
    <a class="btn btn-primary" href="{{route('material.edit', $file->id)}}"  style="background: none;border: none;color: blue; display:inline-flex">
            <i class="fas fa-edit"></i>
        </a>
        @else
          <a class="btn btn-primary" href="{{route('material.edit', $file->id)}}" style="background: none;border: none;color: blue; display:inline-flex">
            <i class="fas fa-edit"></i>
        </a>
@endif
        @if($file->type == 'video')
    <a class="btn btn-warning" target="blank" href="{{$file->source}}" style="background: none;border: none;color: orange; display:inline-flex">
            <i class="fa fa-eye"></i>
        </a>
        @else  <a  class="btn btn-warning" target="blank" href="{{url('/uploads').'/'.$file->source}}" style="background: none;border: none;color: orange; display:inline-flex">
            <i class="fa fa-eye"></i>
        </a>
@endif
<form action="{{route('material.destroy', $file->id)}}" method="POST">
    @csrf
    @method('DELETE')
   
        <button onclick="return confirms('are you sure?')" class="" style="background: none;border: none;color: red; display:inline-flex">
            <i class="fas fa-trash-alt" ></i>
        </button>
</form>

        </div>
</td>
</tr>
@endforeach
        </tbody>
    </table>
</div>



@endsection

@push('scripts')
<script>

$(document).ready(function() {
    $('#example').DataTable();
} );

</script>
@endpush
















{{-- @extends('index')

@section('title')
    {{__('lang.admins')}}
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

    {!!$dataTable->scripts()!!}
<script>

            var s_admin = {!! json_encode(auth()->guard('admin')->user()->hasRole('super admin')) !!};
                
                if(!s_admin){
                    var create = {!! json_encode(auth()->guard('admin')->user()->can('create admin')) !!};
                    var edit = {!! json_encode(auth()->guard('admin')->user()->can('edit admin')) !!};
                    var del = {!! json_encode(auth()->guard('admin')->user()->can('destroy admin')) !!};
                var print = {!! json_encode(auth()->guard('admin')->user()->can('print')) !!};
                var excel = {!! json_encode(auth()->guard('admin')->user()->can('excel')) !!};
                var pdf = {!! json_encode(auth()->guard('admin')->user()->can('pdf')) !!};
                if(!create){
                     $('.buttons-create').addClass('disabled');
            } if(!edit){
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
@endpush --}}
