{{-- @if ($errors->any())
<div class="alert alert-danger m-3" role="alert">
    <h4>Error</h4>
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</div>
@endif --}}


@if ($message = Session::get('success'))
    <div class="alert alert-success m-3" role="alert">
        <h4>Success</h4>
        {{ $message }}
    </div>
@endif
