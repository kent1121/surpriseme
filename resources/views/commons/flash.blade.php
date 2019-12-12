@if (session('flash_danger'))
    <div class="text-center">
        <p class="alert alert-danger">{{ session('flash_danger') }}</p>
    </div>
@elseif (session('flash_success'))
    <div class="text-center">
        <p class="alert alert-success">{{ session('flash_success') }}</p>
    </div>
@endif