<!DOCTYPE html>
<html lang="{{ str_replace('_','-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Five Rivers Ltd') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- If your main site uses bootstrap CDN instead of tailwind, add it here too (optional) --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
</head>

<body class="bg-light">
    {{-- If you want your logged-in pages to use your site navbar --}}
    @includeIf('layouts.navigation')

    <main class="py-4">
        <div class="container">
            {{ $slot }}
        </div>
    </main>
</body>
</html>

