{{-- SIP-IB | PIC: Anggota 1 | Lingkup: Wajib | Isi implementasi oleh PIC --}}
@extends('layouts.platform')
@section('title', 'Daftar Client')
@section('content')
    <div class="page-heading"><div><span class="eyebrow">ADMINISTRASI PLATFORM</span><h1>Daftar & Status Client</h1><p>Halaman untuk memantau client pada platform.</p></div></div>
    <div class="notice"><strong>Mode UI:</strong> tabel belum mengambil data <code>tb_clients</code>. Tombol aktif/nonaktif belum disediakan karena autentikasi dan audit log belum dibuat.</div>
    <section class="panel panel-no-padding">
        <div class="table-scroll">
            <table class="data-table">
                <thead><tr><th>Kode</th><th>Nama Client</th><th>Kontak</th><th>Status</th><th>Aksi</th></tr></thead>
                <tbody><tr><td colspan="5" class="empty-cell"><strong>Belum ada data yang ditampilkan</strong><span>Integrasi daftar client menjadi tugas Anggota 2 pada tahap berikutnya.</span></td></tr></tbody>
            </table>
        </div>
    </section>
@endsection
