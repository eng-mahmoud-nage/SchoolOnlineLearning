@extends('index')

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
                {{-- @dd(auth()->guard('admin')->user()->can('create student')) --}}

@endsection

@push('scripts')

    {{$dataTable->scripts()}}
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
@endpush
