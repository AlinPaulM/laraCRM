{{-- https://laravel.com/docs/9.x/validation#quick-displaying-the-validation-errors --}}
@if ($any)
    <div class="alert alert-danger">
        <p>VALIDATION ERRORS:</p>
        <ul>
            @foreach ($errors as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif