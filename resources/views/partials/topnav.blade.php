<header id="page-header">

    <div class="content-header">

        <div>

            <button type="button" class="btn btn-dual mr-1" data-toggle="layout" data-action="sidebar_toggle">
                <i class="fa fa-fw fa-bars"></i>
            </button>

        </div>

        <div>
            {{-- <div class="d-inline-block">
                <button type="button" class="btn btn-dual" id="page-header-notifications-modal" data-toggle="modal" data-target="#notificationsModal">
                    <i class="fa fa-fw fa-bell"></i>
                    <span id="count-loader" class="badge badge-danger badge-pill"></span>
                </button>
            </div> --}}

            <div class="dropdown d-inline-block">
                <button type="button" class="btn btn-dual" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-fw fa-user d-sm-none"></i>
                    <span class="d-none d-sm-inline-block">{{ Auth::user()->full_name }}</span>
                    <i class="fa fa-fw fa-angle-down ml-1 d-none d-sm-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right p-0" aria-labelledby="page-header-user-dropdown">
                    <div class="p-2">
                        <a class="dropdown-item" href="{{ route('ecma.profile') }}">
                            <i class="fa fa-user-edit fa-fw mr-1"></i> Wijzig gegevens
                        </a>
                        <div role="separator" class="dropdown-divider"></div>
                        <a class="dropdown-item text-danger" href="{{ route('ecma.logout') }}">
                            <i class="fa fa-fw fa-sign-out-alt mr-1"></i> Uitloggen
                        </a>
                    </div>
                </div>
            </div>

            <button type="button" class="btn btn-dual text-info" data-toggle="layout" data-action="side_overlay_toggle">
                <i class="fas fa-fw fa-question-square"></i>
            </button>

        </div>

    </div>

    <div id="page-header-loader" class="overlay-header bg-primary-darker">
        <div class="content-header">
            <div class="w-100 text-center">
                <i class="fa fa-fw fa-2x fa-sun fa-spin text-white"></i>
            </div>
        </div>
    </div>

</header>
