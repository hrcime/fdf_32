@if (session('success'))
    <p class="text-success">
        {{ session('success') }}
    </p>
@endif

@if (session('warning'))
    <p class="text-warning">
        {{ session('warning') }}
    </p>
@endif
