
{{-- TAHAP 1 SIP-IB | PIC: Anggota 1. Halaman awal untuk memilih preview UI. --}}
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIP-IB | Sistem Inventaris Multi-Client</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="welcome-page">
    <main class="welcome-box">
        <span class="eyebrow">PROYEK KELOMPOK · PEMROGRAMAN WEB LANJUT</span>
        <div class="welcome-mark" aria-hidden="true">SI</div>
        <h1>SIP-IB</h1>
        <p class="lead">Sistem Informasi Pengelolaan Inventaris Barang Multi-Client</p>
        <p class="muted">Tahap 1: fondasi tampilan dan navigasi. Login, transaksi, laporan, dan database belum dihubungkan.</p>
        @if (app()->environment(['local', 'testing']))
            <div class="welcome-actions">
                <a class="button button-primary" href="{{ route('preview.client') }}">Lihat Dashboard Admin Client</a>
                <a class="button button-quiet" href="{{ route('preview.platform') }}">Lihat Dashboard Admin Platform</a>
            </div>
        @else
            <p class="notice">Pratinjau hanya tersedia di lingkungan lokal. Akses produksi akan memakai login yang aman.</p>
        @endif
    </main>
</body>
</html>
