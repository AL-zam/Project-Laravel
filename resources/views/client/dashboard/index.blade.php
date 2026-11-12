{{-- TAHAP 1 SIP-IB | PIC: Anggota 3, review tampilan Anggota 1. --}}
@extends('layouts.client')
@section('title', 'Dashboard Client')
@section('content')
    <div class="page-heading">
        <div><span class="eyebrow">INVENTARIS CLIENT</span><h1>Dashboard Admin Client</h1><p>Ringkasan barang, gudang, dan kondisi persediaan dalam client yang sedang login.</p></div>
        <a class="button button-primary" href="{{ route('preview.client.module', ['key' => 'items']) }}">Buka Data Barang</a>
    </div>
    <div class="notice"><strong>Belum terhubung:</strong> semua nilai “—” sengaja tidak diisi angka contoh. Statistik baru boleh dimuat setelah login dan <code>ClientContext</code> selesai.</div>

    <div class="stats-grid">
        <article class="stat-card"><span class="stat-label">Jumlah Barang</span><strong>—</strong><small>Sumber: tb_items</small></article>
        <article class="stat-card"><span class="stat-label">Gudang Aktif</span><strong>—</strong><small>Sumber: tb_warehouses</small></article>
        <article class="stat-card"><span class="stat-label">Stok Menipis</span><strong>—</strong><small>Stok &gt; 0 dan ≤ minimum</small></article>
        <article class="stat-card"><span class="stat-label">Stok Habis</span><strong>—</strong><small>Stok = 0</small></article>
    </div>

    <div class="dashboard-grid">
        <section class="panel">
            <div class="panel-heading"><div><h2>Akses Cepat</h2><p>Menu operasional utama</p></div></div>
            <div class="quick-grid">
                <a href="{{ route('preview.client.module', ['key' => 'stock-in']) }}" class="quick-action"><span class="quick-icon">IN</span><strong>Barang Masuk</strong><small>Pencatatan stok masuk</small></a>
                <a href="{{ route('preview.client.module', ['key' => 'stock-out']) }}" class="quick-action"><span class="quick-icon">OUT</span><strong>Barang Keluar</strong><small>Validasi stok tersedia</small></a>
                <a href="{{ route('preview.client.module', ['key' => 'transfers']) }}" class="quick-action"><span class="quick-icon">TF</span><strong>Transfer Gudang</strong><small>Antar-gudang satu client</small></a>
                <a href="{{ route('preview.client.module', ['key' => 'opnames']) }}" class="quick-action"><span class="quick-icon">SO</span><strong>Stock Opname</strong><small>Bandingkan stok fisik</small></a>
            </div>
        </section>
        <section class="panel">
            <div class="panel-heading"><div><h2>Pemantauan Stok</h2><p>Aturan kondisi stok sesuai SRS</p></div></div>
            <div class="status-list">
                <div><span class="dot dot-success"></span><div><strong>Stok aman</strong><small>Lebih besar dari batas minimum</small></div><span class="tag">Informasi</span></div>
                <div><span class="dot dot-warning"></span><div><strong>Stok menipis</strong><small>0 &lt; stok ≤ minimum</small></div><span class="tag">Perhatian</span></div>
                <div><span class="dot dot-danger"></span><div><strong>Stok habis</strong><small>Stok = 0</small></div><span class="tag">Prioritas</span></div>
            </div>
            <a class="text-link" href="{{ route('preview.client.module', ['key' => 'low-stock']) }}">Buka menu Stok Minimum →</a>
        </section>
    </div>
@endsection