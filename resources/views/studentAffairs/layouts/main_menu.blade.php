        'materials' => 'الدروس',
             notes
    {{-- //has-sub class for arrow --}}
    
<div data-active-color="black" data-background-color="man-of-steel" data-image="http://localhost/mnagy/ERP_school/public/admin/app-assets/img/sidebar-bg/03.jpg" class="app-sidebar  @if(app()->getLocale() == 'ar') text-right @endif">
    <!-- main menu header-->
    <!-- Sidebar Header starts-->
    <div class="sidebar-header">
        <div class="logo clearfix">
            <a href="index-2.html" class="logo-text">
            <div class="logo-img"><img src="{{url('/uploads')}}/{{$setting->logo}}"/></div><span class="text align-middle">{{$setting['school_name_'.app()->getLocale()]}}</span></a>
            
            <a
                id="sidebarClose" href="javascript:;" class="nav-close d-block d-md-block d-lg-none d-xl-none"><i class="ft-x"></i></a>
        </div>
    </div>
    <!-- Sidebar Header Ends-->
    <!-- / main menu header-->
    <!-- main menu content-->
    <div class="sidebar-content">
        <div class="nav-container">
            <ul id="main-menu-navigation" data-menu="menu-navigation" data-scroll-to-active="true" class="navigation navigation-main">
                {{-- // admins --}}
                @if(auth()->guard('admin')->user()->can('admins') | auth()->guard('admin')->user()->can('create admin')
                |auth()->guard('admin')->user()->can('edit admin')|auth()->guard('admin')->user()->can('destroy admin')
                |auth()->guard('admin')->user()->can('show admin')|auth()->guard('admin')->user()->hasRole('super admin'))
                <li class=" nav-item"><a href="{{route('admins.index')}}"><i class="ft-user"></i><span data-i18n="" class="menu-title">{{__('lang.admins')}}</span></a>
                    {{-- <ul class="menu-content">
                    <li><a href="{{route('admins.index')}}" class="menu-item">{{__('lang.admins')}}</a>
                        </li>
                    <li><a href="{{route('admins.create')}}" class="menu-item">{{__('lang.new_admin')}}</a>
                        </li>
                    </ul> --}}
                </li>
                @endif

                {{-- // stages --}}
                @if(auth()->guard('admin')->user()->can('stages') | auth()->guard('admin')->user()->can('create stage')
                |auth()->guard('admin')->user()->can('edit stage')|auth()->guard('admin')->user()->can('destroy stage')
                |auth()->guard('admin')->user()->can('show stage')|auth()->guard('admin')->user()->hasRole('super admin'))
                <li class="nav-item"><a href="{{route('stage.index')}}"><i class="ft-home"></i><span data-i18n="" class="menu-title">{{__('lang.stages')}}</span></a>
                    {{-- <ul class="menu-content">
                    <li><a href="{{route('stage.index')}}" class="menu-item">{{__('lang.stages')}}</a>
                        </li>
                    <li><a href="{{route('stage.create')}}" class="menu-item">{{__('lang.new_stage')}}</a>
                        </li>
                    </ul> --}}
                </li>
                                            @endif

                {{-- // levels --}}
                @if(auth()->guard('admin')->user()->can('levels') | auth()->guard('admin')->user()->can('create level')
                |auth()->guard('admin')->user()->can('edit level')|auth()->guard('admin')->user()->can('destroy level')
                |auth()->guard('admin')->user()->can('show level')|auth()->guard('admin')->user()->hasRole('super admin'))
                <li class=" nav-item"><a href="{{route('level.index')}}"><i class="ft-home"></i><span data-i18n="" class="menu-title">{{__('lang.levels')}}</span></a>
                    {{-- <ul class="menu-content">
                    <li><a href="{{route('level.index')}}" class="menu-item">{{__('lang.levels')}}</a>
                        </li>
                    <li><a href="{{route('level.create')}}" class="menu-item">{{__('lang.new_level')}}</a>
                        </li>
                    </ul> --}}
                </li>
                                            @endif

                {{-- // Classes --}}
                @if(auth()->guard('admin')->user()->can('classes') | auth()->guard('admin')->user()->can('create class')
                |auth()->guard('admin')->user()->can('edit class')|auth()->guard('admin')->user()->can('destroy class')
                |auth()->guard('admin')->user()->can('show class')|auth()->guard('admin')->user()->hasRole('super admin'))
                <li class=" nav-item"><a href="{{route('class.index')}}"><i class="ft-home"></i><span data-i18n="" class="menu-title">{{__('lang.classes')}}</span></a>
                    {{-- <ul class="menu-content">
                    <li><a href="{{route('class.index')}}" class="menu-item">{{__('lang.classes')}}</a>
                        </li>
                    <li><a href="{{route('class.create')}}" class="menu-item">{{__('lang.new_class')}}</a>
                        </li>
                    </ul> --}}
                </li>
                                            @endif
                {{-- // Courses --}}
                @if(auth()->guard('admin')->user()->can('courses') | auth()->guard('admin')->user()->can('create course')
                |auth()->guard('admin')->user()->can('edit course')|auth()->guard('admin')->user()->can('destroy course')
                |auth()->guard('admin')->user()->can('show course')|auth()->guard('admin')->user()->hasRole('super admin'))
                <li class=" nav-item"><a href="{{route('course.index')}}"><i class="ft-home"></i><span data-i18n="" class="menu-title">{{__('lang.courses')}}</span></a>
                    {{-- <ul class="menu-content">
                    <li><a href="{{route('course.index')}}" class="menu-item">{{__('lang.courses')}}</a>
                        </li>
                    <li><a href="{{route('class.create')}}" class="menu-item">{{__('lang.new_class')}}</a>
                        </li>
                    </ul> --}}
                </li>
                                            @endif
                                                       {{-- // Materials --}}

                @if(auth()->guard('admin')->user()->can('materials') | auth()->guard('admin')->user()->can('create material')
                |auth()->guard('admin')->user()->can('edit material')|auth()->guard('admin')->user()->can('destroy material')
                |auth()->guard('admin')->user()->can('show material')|auth()->guard('admin')->user()->hasRole('super admin'))
                <li class="has-sub nav-item"><a href="#"><i class="ft-home"></i><span data-i18n="" class="menu-title">{{__('lang.materials')}}</span></a>
                    <ul class="menu-content">
                        <li><a href="{{route('material.create')}}" class="menu-item">{{__('lang.new_material')}}</a>
                            </li>
                    <li><a href="{{url('/select-course')}}" class="menu-item">{{__('lang.edit_material')}}</a>
                        </li>
                    </ul>
                    
                </li>
                                            @endif                                           

                       {{-- // setting --}}
                                @if(auth()->guard('admin')->user()->can('settings') | auth()->guard('admin')->user()->can('create setting')
                |auth()->guard('admin')->user()->can('edit setting')|auth()->guard('admin')->user()->can('destroy setting')
                |auth()->guard('admin')->user()->can('show setting')|auth()->guard('admin')->user()->hasRole('super admin'))
            <li class=" nav-item"><a href="{{route('setting.edit',1)}}"><i class="ft-home"></i><span data-i18n="" class="menu-title">{{__('lang.setting')}}</span></a></li>
                                            @endif
                
                                        {{-- // permissions --}}
                                @if(auth()->guard('admin')->user()->can('permissions') | auth()->guard('admin')->user()->can('create permission')
                |auth()->guard('admin')->user()->can('edit permission')|auth()->guard('admin')->user()->can('destroy permission')
                |auth()->guard('admin')->user()->can('show permission')|auth()->guard('admin')->user()->hasRole('super admin'))
                                        <li class="nav-item"><a href="{{route('permission.index')}}"><i class="ft-home"></i><span data-i18n="" class="menu-title">{{__('lang.permissions')}}</span></a>
{{--                                             
                                            <ul class="menu-content">
                                            <li><a href="{{route('permission.index')}}" class="menu-item">{{__('lang.permissions')}}</a>
                                                </li>
                                            <li><a href="{{route('permission.create')}}" class="menu-item">{{__('lang.new_permission')}}</a>
                                                </li>
                                            </ul> --}}
                                            </li>
                                            @endif

            </ul>
        </div>
    </div>
    <!-- main menu content-->
    <div class="sidebar-background"></div>
    <!-- main menu footer-->
    <!-- include includes/menu-footer-->
    <!-- main menu footer-->
</div>