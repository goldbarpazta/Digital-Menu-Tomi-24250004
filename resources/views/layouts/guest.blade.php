<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-light">
    <div class="min-vh-100 d-flex flex-column align-items-center justify-content-center py-5">
        <div class="text-center mb-4">
            <a href="/" class="text-decoration-none">
                <div class="mb-3">
                    <span class="display-6 fw-bold text-primary">
                        <i class="fas fa-utensils me-2"></i>{{ config('app.name') }}
                    </span>
                </div>
            </a>
        </div>
        <div class="card shadow-sm" style="max-width: 450px; width: 100%;">
            <div class="card-body p-4">
                {{ $slot }}
            </div>
        </div>
    </div>
</body>
</html>
