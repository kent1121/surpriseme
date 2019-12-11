@if (session('flash_danger'))
    <div class="text-center">
        <p class="alert alert-danger">{{ session('flash_danger') }}</p>
    </div>
@endif