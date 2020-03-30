@extends('front.user_index')
@section('css')

@endsection
@section('title')

@if(!empty($record) && $record['name_'.app()->getLocale()] == null)
{{__('lang.new_stage')}}
@else
{{__('lang.edit_stage')}}

@endif
@endsection
@section('content')

<div class="row container course">
    @foreach ($records as $record)
    <div class="col-lg-4 col-md-6 col-sm-12"> 
        <div class="card borderd">
            <div class="card-body">
                <div style="">
                    <h4 class="card-title" style="display: inline">{{ $record['name_'.app()->getLocale()] }}</h4> 
                    <div  style="
                    display: inline;
                    float: right;">
                        {{-- <i class="fas fa-book" style="color: #0f4d75; font-size: 35px; transform: rotate(15deg);"></i> --}}
                <img style="margin-top: -15px" src="{{url('/').'/'.'book.png'}}" width="64" height="64" alt="">
                    </div>
                </div>
                <hr>
                <div class="card-text">
                    <a class="col-8" href="{{url('/videos').'/'.$record->id}}">{{__('lang.videos')}} </a>
                    <span class="col-4 pull-right">( {{$record->files()->where('type', 'video')->count()}} )</span>
                    <br>

                    <a class="col-8" href="{{url('/files').'/'.$record->id}}">{{__('lang.files')}}  </a>
                    <span class="col-4 pull-right">( {{$record->files()->where('type', 'file')->count()}} )</span>
                </div>
            </div>
        </div>

    </div>
@endforeach
</div>
@endsection

