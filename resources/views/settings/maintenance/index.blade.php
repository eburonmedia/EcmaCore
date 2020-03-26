@extends('ecma-core::ecma')

@section('module_title')
Onderhoud
@endsection

@section('head_styles')
@endsection

@section('head_scripts')
@endsection

@section('pageheader')
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Onderhoud</h1>

            <div class="flex-sm-00-auto ml-sm-3">
                <button type="button" class="btn btn-primary mr-1 mb-1" data-toggle="modal" data-target="#addModal" data-backdrop="static"><i class="fal fa-fw fa-plus mr-1"></i> IP toevoegen</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-4">
        <form method="POST" action="{{ route('ecma.maintenance.update') }}" data-parsley-validate>
            @csrf
            <input type="hidden" name="maintenance_mode" value="{{ $settings->maintenance_mode }}">
            <div class="block block-rounded block-bordered">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Onderhoudsmodus</h3>
                </div>
                <div class="block-content">
                    @if($settings->maintenance_mode == 1)
                    <p class="text-center text-danger font-weight-bold">De onderhoudsmodus is op dit moment ingeschakeld</p>
                    @else
                    <p class="text-center text-success font-weight-bold">De onderhoudsmodus is uitgeschakeld</p>
                    @endif
                </div>
                <div class="block-content block-content-full block-content-sm bg-body-light font-size-sm">
                    @if($settings->maintenance_mode == 1)
                    <button class="btn btn-success btn-block" type="submit">Onderhoudsmodus uitschakelen</button>
                    @else
                    <button class="btn btn-danger btn-block" type="submit">Onderhoudsmodus inschakelen</button>
                    @endif
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-8">

        <div class="block block-rounded block-bordered">
            <div class="block-content block-content-full">
                <div class="table-responsive">
                    <table id="datatable1" class="table table-bordered table-striped table-vcenter">
                        <thead>
                            <tr>
                                <th width="50"></th>
                                <th>Naam</th>
                                <th>IP</th>
                                <th>Toegevoegd</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ips as $ip)
                            <tr>
                                <td>
                                    <form method="POST" action="{{ route('ecma.maintenance.delete_ip') }}" data-parsley-validate>
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $ip->id }}">
                                        <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-fw fa-times"></i></button>
                                    </form>
                                </td>
                                <td>{{ $ip->name }}</td>
                                <td>{{ $ip->ip }}</td>
                                <td>{{ changeDate($ip->created_at) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection

@section('modals')
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="addModalLabel">IP toevoegen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('ecma.maintenance.store_ip') }}" data-parsley-validate>
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name" class="control-label">Naam<span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" data-parsley-required="true" data-parsley-trigger="change" value="">

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="ip" class="control-label">IP<span class="text-danger">*</span></label>
                        <input type="text" name="ip" id="ip" class="form-control @error('ip') is-invalid @enderror" data-parsley-required="true" data-parsley-trigger="change" value="{{ $_SERVER['REMOTE_ADDR'] }}">

                        @error('ip')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link" data-dismiss="modal">Sluiten</button>
                    <button type="submit" class="btn btn-success">Toevoegen</button>
                </div>
            </form>
        </div>
    </div>
</div>
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

@section('help')
<p>Met de onderhouds modus kun je de website onbereikbaar maken voor de buitenwereld. Als je hier je eigen naam/ipadres toevoegd kun je de website vanaf het opgegeven ipadres normaal bezoeken.</p>
<p>De Content Management Applicatie is altijd te bereiken via {{ env('APP_URL') }}/{{ config('ecma-core.route_name') }}</p>
@endsection
