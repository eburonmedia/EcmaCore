@extends('ecma-core::ecma')

@section('module_title')
Profiel
@endsection

@section('head_styles')
@endsection

@section('head_scripts')
@endsection

@section('pageheader')
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Profiel</h1>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <form method="POST" action="{{ route('ecma.update_profile') }}" data-parsley-validate>
            @csrf
            <div class="block block-rounded block-bordered">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Wijzig je gegevens</h3>
                </div>
                <div class="block-content">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="first_name" class="control-label">Voornaam<span class="text-danger">*</span></label>
                                <input type="text" name="first_name" id="first_name" class="form-control @error('first_name') is-invalid @enderror" data-parsley-required="true" data-parsley-trigger="change" value="{{ Auth::user()->first_name }}">

                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="last_name" class="control-label">Achternaam<span class="text-danger">*</span></label>
                                <input type="text" name="last_name" id="last_name" class="form-control @error('last_name') is-invalid @enderror" data-parsley-required="true" data-parsley-trigger="change" value="{{ Auth::user()->last_name }}">

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email" class="control-label">Email<span class="text-danger">*</span></label>
                                <input type="email" class="form-control" name="email" data-parsley-whitespace="trim" data-parsley-required="true" data-parsley-remote-options='{ "type": "POST", "dataType": "json", "data": { "_token": "{{ csrf_token() }}" } }' data-parsley-trigger="focusout" data-parsley-remote="{{ route('ecma.admins.email_update', Auth::id()) }}" data-parsley-remote-message="Dit email adres is al in gebruik" autocomplete="off" value="{{ Auth::user()->email }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password" class="control-label">Wachtwoord</label>
                                <input type="text" name="password" id="password" class="form-control @error('password') is-invalid @enderror" data-parsley-required="false" data-parsley-trigger="change" value="">
                                <small class="form-text text-muted"> Vul het wachtwoord alleen in als je het wilt wijzigingen </small>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block-content block-content-full block-content-sm bg-body-light font-size-sm">
                    <button type="submit" class="btn btn-success">Wijzigingen opslaan</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('right_sidebar')
<p>Hier kun jij je eigen gegevens wijzigen. Het e-mailadres wordt gecontroleerd of het niet al bestaat.</p>
<p>Vul het wachtwoord alleen in als je dit wijzigen, wanneer het veld wachtwoord leeg is blijft je huidige wachtwoord geldig.</p>
@endsection

@section('modals')
@endsection

@section('scripts')
@endsection
