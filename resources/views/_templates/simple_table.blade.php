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
<div class="block block-rounded block-bordered">
    <div class="block-content block-content-full">
        <div class="table-responsive">
            <table id="datatable1" class="table table-bordered table-striped table-vcenter">
                <thead>
                    <tr>
                        <th>Rendering engine</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('modals')
@endsection

@section('scripts')
<script>
    jQuery(function () {
        jQuery('#datatable1').dataTable({
            pageLength: 10,
            lengthMenu: [[10, 30, 50, -1], [10, 30, 50, "Alles"]],
            autoWidth: false,
            language: {
                info: '_START_ tot _END_ van _TOTAL_'
            }
        });
    });
</script>
@endsection
