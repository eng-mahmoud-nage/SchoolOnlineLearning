@inject('stages', 'App\StudentAffairs\Stage')


@extends('front.user_index')

@section('css')

@endsection
@section('title')

{{__('lang.materials')}}

@endsection
@section('content')

<div class="row">

    <div class="col-12">
        <a href="{{url('/')}}" class="btn btn-primary">{{__('lang.courses')}}</a>
        </div>


    <table id="example" class="table table-striped table-bordered table-dark" style="width:100%">
        <thead>
            <tr>
            <th>{{__('lang.title')}}</th>
            <th>{{__('lang.actions')}}</th>
            </tr>
        </thead>
        <tbody>


    @foreach ($files as $file)
<tr>
<td>{{$file['title_'.app()->getLocale()]}}</td>
<td>
    <div style="display:inline-flex">
    <a href="{{url('/uploads').'/'.$file->source}}" style="padding: 0 25px; color: white" download>
            <i class="fas fa-download"></i>
        </a>
    <a href="{{url('/uploads').'/'.$file->source}}" target="blank" style="padding: 0 25px; color: white">
            <i class="fa fa-eye"></i>
        </a>
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