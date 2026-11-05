
{{-- TAHAP 1 SIP-IB | PIC: Anggota 1. --}}
<header class="topbar">
    <div class="topbar-left">
        <button class="menu-toggle" type="button" data-sidebar-toggle aria-label="Buka atau tutup menu" aria-controls="sidebar" aria-expanded="false">☰</button>
        <div>
            <div class="topbar-label">{{ $roleLabel }}</div>
            <div class="topbar-title">@yield('title', 'Dashboard')</div>
        </div>
    </div>
    <div class="topbar-actions">
        <span class="preview-badge">● Mode Pratinjau</span>
        <a class="topbar-home" href="{{ route('home') }}">Beranda</a>
    </div>
</header>
