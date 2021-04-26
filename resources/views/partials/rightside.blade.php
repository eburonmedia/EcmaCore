<aside id="side-overlay">

    <div>
        <div class="bg-primary-op">
            <div class="content-header">

                <div class="ml-2">
                    <a class="text-white font-w600" href="javascript:void(0)">{{ config('ecma-core.right_sidebar_title') }}</a>
                </div>

                <a class="ml-auto text-white" href="javascript:void(0)" data-toggle="layout" data-action="side_overlay_close">
                    <i class="fa fa-times-circle"></i>
                </a>

            </div>
        </div>
    </div>

    <div class="content-side">
        @yield('right_sidebar')
    </div>

</aside>
