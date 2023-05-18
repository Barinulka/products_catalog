<div class="mt-5">
    @if (session('success'))

        <div class="alert alert-success" role="alert">
            {{ session('succsess') }}
        </div>
        
    @endif

    @if (session('error'))

        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
        
    @endif
</div>