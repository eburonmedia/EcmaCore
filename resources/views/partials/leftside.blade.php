<nav id="sidebar" aria-label="Main Navigation">

    <div class="bg-header-dark">
        <div class="content-header bg-white-10">
            <a class="link-fx font-w600 font-size-lg text-white" href="{{ route('ecma') }}">
                <span class="smini-visible">
                    {!! config('ecma-core.app_name_small') !!}
                </span>
                <span class="smini-hidden">
                    {!! config('ecma-core.app_name_large') !!}
                </span>
            </a>
            <div>
                @if(config('ecma-core.show_sidebar_mini_toggle') == true)
                <a class="text-white-75 d-none d-lg-inline ml-2" data-toggle="layout" data-action="sidebar_mini_toggle" href="javascript:void(0)">
                    <i class="fa fa-arrow-left" id="sidebar-style-toggler"></i>
                </a>
                @endif
                <a class="d-lg-none text-white ml-2" data-toggle="layout" data-action="sidebar_close" href="javascript:void(0)">
                    <i class="fa fa-times-circle"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="js-sidebar-scroll">
        <div class="content-side content-side-full">
            <ul class="nav-main">

                <li class="nav-main-item">
                    <a class="nav-main-link {{ set_active(config('ecma-core.route_name'), 1) }}" href="{{ route('ecma') }}">
                        <i class="nav-main-link-icon {{ config('ecma-core.sidebar_icon_type') }} {{ config('ecma-core.sidebar_dashboard_icon') }} fa-fw"></i>
                        <span class="nav-main-link-name">Dashboard</span>
                    </a>
                </li>
                @foreach(config('ecma-core.modules') as $menu)
                @if($menu['admin_only'] == true)
                    @if(Auth::user()->admin_role >= 2)
                    <li class="{{ $menu['class_name'] }}">
                        @if($menu['name'] != '')
                        <a class="nav-main-link {{ set_active(config('ecma-core.route_name').'/'.$menu['active_route'], $menu['single_route']) }}" href="/{{ config('ecma-core.route_name') }}/{{ $menu['route'] }}">
                            <i class="nav-main-link-icon {{ config('ecma-core.sidebar_icon_type') }} fa-{{ $menu['fa-icon'] }} fa-fw"></i>
                            <span class="nav-main-link-name">{{ $menu['name'] }}</span>
                        </a>
                        @endif
                    </li>
                    @endif
                @else
                    <li class="{{ $menu['class_name'] }}">
                        @if($menu['name'] != '')
                        <a class="nav-main-link {{ set_active(config('ecma-core.route_name').'/'.$menu['active_route'], $menu['single_route']) }}" href="/{{ config('ecma-core.route_name') }}/{{ $menu['route'] }}">
                            <i class="nav-main-link-icon {{ config('ecma-core.sidebar_icon_type') }} fa-{{ $menu['fa-icon'] }} fa-fw"></i>
                            <span class="nav-main-link-name">{{ $menu['name'] }}</span>
                        </a>
                        @endif
                    </li>
                @endif
                @endforeach

                @if(config('ecma-core.show_settings_to_all_users') == true)
                <li class="nav-main-heading"></li>
                <li class="nav-main-item {{ set_active(config('ecma-core.route_name').'/settings', 0, 'open') }}">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="#">
                        <i class="nav-main-link-icon {{ config('ecma-core.sidebar_icon_type') }} fa-fw fa-cog"></i>
                        <span class="nav-main-link-name">Instellingen</span>
                    </a>
                    <ul class="nav-main-submenu">
                        @foreach(config('ecma-core.settings') as $menu_setting)
                        <li class="{{ $menu_setting['class_name'] }}">
                            <a class="nav-main-link {{ set_active(config('ecma-core.route_name').'/settings/'. $menu_setting['active_route'], $menu_setting['single_route']) }}" href="/{{ config('ecma-core.route_name') }}/settings/{{ $menu_setting['route'] }}">
                                <span class="nav-main-link-name">{{ $menu_setting['name'] }}</span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </li>
                @else
                    @if(Auth::user()->admin_role >= 2)
                        <li class="nav-main-heading"></li>
                        <li class="nav-main-item {{ set_active(config('ecma-core.route_name').'/settings', 0, 'open') }}">
                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="#">
                                <i class="nav-main-link-icon {{ config('ecma-core.sidebar_icon_type') }} fa-fw fa-cog"></i>
                                <span class="nav-main-link-name">Instellingen</span>
                            </a>
                            <ul class="nav-main-submenu">
                                @foreach(config('ecma-core.settings') as $menu_setting)
                                <li class="{{ $menu_setting['class_name'] }}">
                                    <a class="nav-main-link {{ set_active(config('ecma-core.route_name').'/settings/'. $menu_setting['active_route'], $menu_setting['single_route']) }}" href="/{{ config('ecma-core.route_name') }}/settings/{{ $menu_setting['route'] }}">
                                        <span class="nav-main-link-name">{{ $menu_setting['name'] }}</span>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </li>
                    @endif
                @endif

                <li class="nav-main-heading"></li>
                <li class="nav-main-item">
                    <a class="nav-main-link" href="{{ env('APP_URL') }}">
                        <i class="nav-main-link-icon {{ config('ecma-core.sidebar_icon_type') }} fa-fw fa-arrow-alt-circle-left"></i>
                        <span class="nav-main-link-name">Website</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
