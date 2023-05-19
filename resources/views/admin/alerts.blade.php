@if (session('success'))
    @php
        $message = session('success')
    @endphp
    <x-alert type="success" :message="$message"></x-alert>
@endif