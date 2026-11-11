@extends('layouts.platform')
@section('title', 'Dashboard Platform')
@section('content')
    <div class="page-heading">
        <div><span class="eyebrow">OVERVIEW PLATFORM</span><h1>Dashboard Admin Platform</h1><p>Kelola client yang menggunakan SIP-IB.</p></div>
        <a class="button button-primary" href="{{ route('preview.platform.clients') }}">Lihat Daftar Client</a>
    </div>

    <div class="notice"><strong>Belum terhubung:</strong> statistik akan dibaca dari <code>tb_clients</code> setelah autentikasi Admin Platform tersedia.</div>
    <div class="stats-grid stats-grid-three">
        <article class="stat-card"><span class="stat-label">Total Client</span><strong>—</strong><small>Semua client terdaftar</small></article>
        <article class="stat-card"><span class="stat-label">Client Aktif</span><strong>—</strong><small>Client yang dapat memakai aplikasi</small></article>
        <article class="stat-card"><span class="stat-label">Client Nonaktif</span><strong>—</strong><small>Akses operasional dibatasi</small></article>
    </div>

    <section class="panel">
        <div class="panel-heading"><div><h2>Administrasi Client</h2><p>Fitur resmi menurut SRS</p></div><span class="tag">FR-TEN-01 / FR-TEN-02</span></div>
        <div class="two-column">
            <div class="feature-line"><span class="feature-symbol">01</span><div><strong>Daftar Client</strong><p>Menampilkan nama, kode, dan status client. Data belum dimuat pada tahap UI.</p></div></div>
            <div class="feature-line"><span class="feature-symbol">02</span><div><strong>Aktif/Nonaktif Client</strong><p>Tindakan perubahan status hanya boleh tersedia setelah login, validasi, dan audit log selesai.</p></div></div>
        </div>
    </section>
@endsection