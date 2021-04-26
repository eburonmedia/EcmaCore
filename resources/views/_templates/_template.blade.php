@extends('ecma-core::ecma')

@section('module_title')
Dashboard
@endsection

@section('head_styles')
@endsection

@section('head_scripts')
@endsection

@section('pageheader')
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Dashboard</h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Pages</li>
                    <li class="breadcrumb-item">Generic</li>
                    <li class="breadcrumb-item active" aria-current="page">Blank</li>
                </ol>
            </nav>

            <div class="flex-sm-00-auto ml-sm-3">
                <button type="button" class="btn btn-primary mr-1 mb-1" data-toggle="modal" data-target="#addModal" data-backdrop="static"><i class="fal fa-fw fa-plus mr-1"></i> Admin toevoegen</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="bg-white p-3 rounded push">
    <div class="d-lg-none">
        <button type="button" class="btn btn-block btn-light d-flex justify-content-between align-items-center" data-toggle="class-toggle" data-target="#horizontal-navigation-hover-normal" data-class="d-none">
            Menu - Bestellingen
            <i class="fa fa-bars"></i>
        </button>
    </div>

    <div id="horizontal-navigation-hover-normal" class="d-none d-lg-block mt-2 mt-lg-0">
        <ul class="nav-main nav-main-horizontal nav-main-hover">
            <li class="nav-main-item">
                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                    <span class="nav-main-link-name">Jaar</span>
                </a>
                <ul class="nav-main-submenu">
                    <li class="nav-main-item">
                        <a class="nav-main-link active" href="#">
                            <span class="nav-main-link-name">jaar</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link" href="#">
                    <i class="nav-main-link-icon fal fa-download"></i>
                    <span class="nav-main-link-name">Bestellingen exporteren</span>
                </a>
            </li>
        </ul>
    </div>
</div>

<div class="block block-rounded block-bordered">
    <div class="block-header block-header-default">
        <h3 class="block-title">Block Title..</h3>
    </div>
    <div class="block-content">
        <p>Your content..</p>
    </div>
    <div class="block-content block-content-full block-content-sm bg-body-light font-size-sm">
        Footer content..
    </div>
</div>
@endsection

@section('modals')
@endsection

@section('scripts')
@endsection

@section('right_sidebar')
@endsection
