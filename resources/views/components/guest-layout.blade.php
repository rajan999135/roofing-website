<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Five Rivers Ltd') }}</title>

    {{-- Use Vite if your project has it --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-light">
    <main class="min-vh-100 d-flex align-items-center py-5">
        <div class="container" style="max-width: 520px;">
            <div class="bg-white border rounded-4 shadow-sm p-4 p-md-5">
                {{ $slot }}
            </div>
        </div>
    </main>
</body>
</html>
