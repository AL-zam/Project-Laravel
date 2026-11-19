<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#f7f9fd">
    <meta name="description" content="SIP-IB membantu pengelolaan inventaris barang multi-client: master barang, gudang, transaksi stok, stock opname, dan laporan.">
    <title>@yield('title', 'SIP-IB - Sistem Inventaris Multi-Client')</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/sipib-mark.svg') }}">
    <link rel="stylesheet" href="{{ asset('css/sipib-public.css') }}">
    @stack('head')
</head>
<body class="sp-body @yield('body-class')">
    @include('public.partials.navbar')

    @if (session('status'))
        <div class="sp-flash-wrap" role="status">
            <div class="sp-flash sp-flash-success">
                <span class="sp-flash-icon">✓</span>
                <span>{{ session('status') }}</span>
                <button type="button" class="sp-flash-close" aria-label="Tutup pesan" data-dismiss-flash>×</button>
            </div>
        </div>
    @endif

    <main id="main-content">
        @yield('content')
    </main>

    @include('public.partials.footer')
    <script src="{{ asset('js/sipib-public.js') }}" defer></script>
    @stack('scripts')
</body>
</html>
