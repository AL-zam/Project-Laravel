{{-- TAHAP 1 SIP-IB | PIC: Anggota 1. Layout pratinjau Admin Platform. --}}
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Dashboard Platform') | SIP-IB</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="sipib-body">
    <div class="app-shell">
        @include('partials.sidebar-platform')
        <div class="app-main">
            @include('partials.navbar', ['roleLabel' => 'Admin Platform'])
            <main class="page-content" id="main-content">
                @yield('content')
            </main>
            @include('partials.footer')
        </div>
    </div>
</body>
</html>
