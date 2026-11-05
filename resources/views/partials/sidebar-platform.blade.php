
{{-- TAHAP 1 SIP-IB | PIC: Anggota 1, review Anggota 2. --}}
<aside class="sidebar" id="sidebar" aria-label="Navigasi Admin Platform">
    <a class="brand" href="{{ route('home') }}">
        <span class="brand-square">SI</span>
        <span><strong>SIP-IB</strong><small>Inventaris Multi-Client</small></span>
    </a>
    <div class="sidebar-role">AREA PLATFORM</div>
    <nav class="sidebar-nav" aria-label="Menu platform">
        <a class="nav-link {{ request()->routeIs('preview.platform') ? 'is-active' : '' }}" href="{{ route('preview.platform') }}">
            <span class="nav-initial">DB</span> Dashboard
        </a>
        <a class="nav-link {{ request()->routeIs('preview.platform.clients') ? 'is-active' : '' }}" href="{{ route('preview.platform.clients') }}">
            <span class="nav-initial">CL</span> Daftar & Status Client
        </a>
    </nav>
    <div class="sidebar-bottom">Preview lokal · Tidak ada perubahan data</div>
</aside>
