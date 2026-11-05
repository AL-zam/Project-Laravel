{{-- TAHAP 1 SIP-IB | PIC: Anggota 1. Layout pratinjau Admin Client. --}}
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Dashboard Client') | SIP-IB</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="sipib-body">
    <div class="app-shell">
        @include('partials.sidebar-client')
        <div class="app-main">
            @include('partials.navbar', ['roleLabel' => 'Admin Client'])
            <main class="page-content" id="main-content">
                @yield('content')
            </main>
            @include('partials.footer')
        </div>
    </div>
</body>
</html>
