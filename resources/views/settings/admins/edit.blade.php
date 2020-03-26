<div class="modal-header">
<h5 class="modal-title" id="editModalLabel">Admin wijzigen</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form method="POST" action="{{ route('ecma.admins.update', $admin->id) }}" data-parsley-validate>
    @csrf
    <div class="modal-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="first_name" class="control-label">Voornaam<span class="text-danger">*</span></label>
                    <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" data-parsley-required="true" data-parsley-trigger="change" value="{{ $admin->first_name }}">

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
                    <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" data-parsley-required="true" data-parsley-trigger="change" value="{{ $admin->last_name }}">

                    @error('last_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="email" class="control-label">Email<span class="text-danger">*</span></label>
            <input type="email" class="form-control" name="email" data-parsley-whitespace="trim" data-parsley-required="true" data-parsley-remote-options='{ "type": "POST", "dataType": "json", "data": { "_token": "{{ csrf_token() }}" } }' data-parsley-trigger="focusout" data-parsley-remote="{{ route('ecma.admins.email_update', $admin->id) }}" data-parsley-remote-message="Dit email adres is al in gebruik" autocomplete="off" value="{{ $admin->email }}">
        </div>
        <div class="form-group">
            <label for="admin_role">Type Admin<span class="text-danger">*</span></label>
            <select name="admin_role" class="select2-ns" data-parsley-required="true">
                <option value="">Maak een keuze</option>
                @foreach(adminTypes() as $id => $name)
                <option value="{{ $id }}" @if($admin->admin_role == $id) selected @endif >{{ $name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <div class="custom-control custom-checkbox custom-control-primary mb-1">
                <input type="checkbox" class="custom-control-input" id="active" name="active" value="1" @if($admin->active == 1) checked="" @endif>
                <label class="custom-control-label" for="active">Actief</label>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-link" data-dismiss="modal">Sluiten</button>
        <button type="submit" class="btn btn-success">Wijzigingen opslaan</button>
    </div>
</form>
<script>
jQuery(function() {
    jQuery('.select2-ns').select2({
        width: '100%',
        placeholder: jQuery(this).attr('placeholder'),
        minimumResultsForSearch: Infinity
    });
});
</script>
