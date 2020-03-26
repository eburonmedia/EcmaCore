@if (session('errors'))
<div class="alert alert-danger" role="alert">
    @if ($message = $errors->first(0, ':message'))
    {{ $message }}
    @else
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif
</div>
@endif

@if ($message = Session::get('success'))
<div class="alert alert-success" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    {{ $message }}
</div>
@endif
