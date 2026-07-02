<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name')) - {{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
</head>
<body>
    @include('frontend.partials.navbar')

    <main>
        @yield('content')
    </main>

    @include('frontend.partials.footer')

    @stack('scripts')
</body>
</html>
