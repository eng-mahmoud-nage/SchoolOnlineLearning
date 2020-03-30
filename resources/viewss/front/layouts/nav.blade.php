<nav class="navbar navbar-expand-lg navbar-light bg-faded header-navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <span class="d-lg-none navbar-right navbar-collapse-toggle">
                <a aria-controls="navbarSupportedContent" href="javascript:;" class="open-navbar-container black">
                    <i class="ft-more-vertical"></i></a></span>
        </div>
        <div class="navbar-container ">
            <div id="navbarSupportedContent" class="collapse navbar-collapse">
                <ul class="navbar-nav">
                    <li class="nav-item mr-2 d-none d-lg-block"><a id="navbar-fullscreen" href="javascript:;" class="nav-link apptogglefullscreen"><i class="ft-maximize font-medium-3 blue-grey darken-4"></i>
            <p class="d-none">fullscreen</p></a></li>
                    <li class="dropdown nav-item"><a id="dropdownBasic3" href="#" data-toggle="dropdown" class="nav-link position-relative dropdown-toggle"><i class="ft-flag font-medium-3 blue-grey darken-4"></i><span class="selected-language d-none"></span></a>
                        <div class="dropdown-menu dropdown-menu-right text-left">

                            @if($supersetting->lang == "English" || $supersetting->lang == "Both" )
                        <a href="{{route('lang','en')}}" class="dropdown-item py-1"><img src="{{url('/')}}/admin/app-assets/img/flags/us.png" class="langimg" /><span>{{__('lang.en')}}</span></a>
                            @endif
                            @if($supersetting->lang == "Arabic" || $supersetting->lang == "Both" )
                            <a href="{{route('lang','ar')}}" class="dropdown-item py-1"><img src="{{url('/')}}/admin/app-assets/img/flags/ar.png" class="langimg" /><span> {{__('lang.ar')}}</span></a>
                            @endif
                        </div>
                    </li>
                  
                    <li class="dropdown nav-item"><a id="dropdownBasic3" href="#" data-toggle="dropdown" class="nav-link position-relative dropdown-toggle"><i class="ft-user font-medium-3 blue-grey darken-4"></i>
            <p class="d-none">User Settings</p></a>
                        <div ngbdropdownmenu="" aria-labelledby="dropdownBasic3" class="dropdown-menu text-left dropdown-menu-right">

                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('lang.Logout') }}
                            </a>

                            <form id="logout-form" action="{{ url('/std-logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                        </div>
                    </li>
             
                </ul>
            </div>
        </div>
    </div>
</nav>