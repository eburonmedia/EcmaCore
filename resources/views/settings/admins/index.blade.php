@extends('ecma-core::ecma')

@section('module_title')
Admins
@endsection

@section('head_styles')
@endsection

@section('head_scripts')
@endsection

@section('pageheader')
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Admins</h1>
            @if(Auth::user()->admin_role == 3)
            <div class="flex-sm-00-auto ml-sm-3">
                <button type="button" class="btn btn-primary mr-1 mb-1" data-toggle="modal" data-target="#addModal" data-backdrop="static"><i class="fal fa-fw fa-plus mr-1"></i> Admin toevoegen</button>
            </div>
            @endif
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
                        <th width="50"></th>
                        <th>Naam</th>
                        <th>Admin type</th>
                        <th>Actief</th>
                        <th>Toegevoegd</th>
                        <th>Gewijzigd</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($admins as $admin)
                    <tr>
                        <td>
                            @if(Auth::user()->admin_role == 3)
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editModal" data-backdrop="static" data-id="{{ $admin->id }}"><i class="fa fa-fw fa-pencil"></i></button>
                            @endif
                        </td>
                        <td>{{ $admin->full_name }}</td>
                        <td>{{ adminTypes($admin->admin_role) }}</td>
                        <td>{!! boolean($admin->active) !!}</td>
                        <td>{{ changeDate($admin->created_at) }}</td>
                        <td>{{ changeDate($admin->updated_at) }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
  </div>
</div>
@endsection

@section('modals')
<div class="modal fade" id="addModal" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="addModalLabel">Admin toevoegen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('ecma.admins.store') }}" id="storeform" data-parsley-validate>
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="user">kies een bestaande gebruiker</label>
                        <select name="user" id="user" class="select2" data-parsley-required="false">
                            <option value="">Kies een gebruiker</option>
                            @foreach($all_users as $user)
                            <option value="{{ $user->id }}">{{ $user->full_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="add_admin" id="add_admin">
                            <label class="form-check-label" for="add_admin">
                                Of voeg een nieuwe gebruiker toe
                            </label>
                        </div>
                    </div>
                    <div id="new_admin" style="display:none;">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="first_name" class="control-label">Voornaam<span class="text-danger">*</span></label>
                                    <input type="text" name="first_name" id="first_name" class="form-control @error('first_name') is-invalid @enderror" data-parsley-required="false" data-parsley-trigger="change" value="">

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
                                    <input type="text" name="last_name" id="last_name" class="form-control @error('last_name') is-invalid @enderror" data-parsley-required="false" data-parsley-trigger="change" value="">

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
                                    <input type="email" class="form-control" name="email" id="email" data-parsley-whitespace="trim" data-parsley-required="false" data-parsley-remote-options='{ "type": "POST", "dataType": "json", "data": { "_token": "{{ csrf_token() }}" } }' data-parsley-trigger="focusout" data-parsley-remote="{{ route('ecma.admins.email_add') }}" data-parsley-remote-message="Dit email adres is al in gebruik" autocomplete="off" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password" class="control-label">Wachtwoord<span class="text-danger">*</span></label>
                                    <input type="text" name="password" id="password" class="form-control @error('password') is-invalid @enderror" data-parsley-required="false" data-parsley-trigger="change" value="">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="admin_role">Type Admin<span class="text-danger">*</span></label>
                        <select name="admin_role" id="admin_role" class="select2-ns" data-parsley-required="true">
                            <option value="">Maak een keuze</option>
                            @foreach(adminTypes() as $id => $name)
                            <option value="{{ $id }}">{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link" data-dismiss="modal">Sluiten</button>
                    <button type="submit" class="btn btn-success">Admin toevoegen</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="editModal" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" id="editcontent">

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
        jQuery('input[type=checkbox][name=add_admin]').change(function() {
            var value = jQuery('input[name=add_admin]:checked').val();

            if (value == 1) {
                jQuery('#new_admin').show();
                jQuery('#storeform').parsley().destroy();
                jQuery('#first_name, #last_name, #email, #password').attr('data-parsley-required', 'true');
                jQuery('#user').val('').change();
                jQuery('#storeform').parsley();
            } else {
                jQuery('#new_admin').hide();
                jQuery('#storeform').parsley().destroy();
                jQuery('#first_name, #last_name, #email, #password').attr('data-parsley-required', 'false').val('');
                jQuery('#storeform').parsley();
            }
        });
        jQuery('#editModal').on('show.bs.modal', function (event) {
            var button = jQuery(event.relatedTarget);
            var id = button.data('id');

            jQuery('#editcontent').load('/'+ ecma_route +'/settings/admins/edit/' + id);
        });
    });
</script>
@endsection

@section('right_sidebar')
<p>Admins hebben toegang tot de Content Management Applicatie</p>
<p>Alleen admins met de rol "Super Admin" kunnen hier admins toevoegen en wijzigen</p>
@endsection
