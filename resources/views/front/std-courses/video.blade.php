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
</div>
    @foreach ($videos as $video)
    
    
    
    <div class="media col-12" style="border-bottom: 2px solid #0f4d75;background-color: rgba(0,0,0,0.7); border-radius: 10px ">
        <div class="media-body col-12" style="color: white;">
         
      
          @php 
         if(strlen($video->source) > 11)
         {
           if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $video->source, $match))
             {
                $link=  $match[1].'?author=TypicalDesign&rel=0';
                         
                        echo '
                        <iframe width="100%" src="https://www.youtube.com/embed/'.$link.'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                ';
             }   
           
            else {
                echo " Wrong Link ";
             }
        
        }
         
@endphp
         
         
            
            <h4 class="mt-0" style="font-weight: 600">{{ $video['title_'.app()->getLocale()]}}</h4>
            <h4 class="mt-0">{{ $video->created_at }}</h4>
        </div>
    </div>
    <br>
    <br>
@endforeach

@endsection