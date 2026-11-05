
{{-- TAHAP 1 SIP-IB | PIC: Anggota 1. Placeholder UI sampai modul dibuat PIC terkait. --}}
@extends('layouts.client')

@section('title', $module['label'])

@section('content')
    <div class="page-heading">
        <div>
            <span class="eyebrow">HALAMAN MODUL</span>
            <h1>{{ $module['label'] }}</h1>
            <p>{{ $module['description'] }}</p>
        </div>
    </div>

    <section class="panel preview-panel">
        <span class="preview-illustration" aria-hidden="true">{ }</span>
        <h2>UI menu sudah tersedia</h2>
        <p>Halaman ini <strong>belum terhubung</strong> ke controller, model, atau database untuk operasi nyata.</p>

        <div class="meta-grid">
            <div>
                <span>Penanggung jawab modul</span>
                <strong>{{ $module['owner'] }}</strong>
            </div>
            <div>
                <span>Sumber data yang direncanakan</span>
                <strong>{{ $module['source'] }}</strong>
            </div>
        </div>

        <a href="{{ route('preview.client') }}" class="button button-primary">Kembali ke Dashboard</a>
    </section>
@endsection
