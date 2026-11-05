
{{-- TAHAP 1 SIP-IB | PIC: Anggota 1, review A2/A3/A4. Menu dari config/sipib.php. --}}
<aside class="sidebar" id="sidebar" aria-label="Navigasi Admin Client">
    <a class="brand" href="{{ route('home') }}">
        <span class="brand-square">SI</span>
        <span><strong>SIP-IB</strong><small>Inventaris Multi-Client</small></span>
    </a>
    <div class="sidebar-role">AREA CLIENT</div>
    <nav class="sidebar-nav" aria-label="Menu client">
        <a class="nav-link {{ request()->routeIs('preview.client') ? 'is-active' : '' }}" href="{{ route('preview.client') }}">
            <span class="nav-initial">DB</span> Dashboard
        </a>
        @foreach (config('sipib.client_menus') as $section)
            <div class="nav-section">{{ $section['heading'] }}</div>
            @foreach ($section['items'] as $item)
                <a class="nav-link {{ request()->route('key') === $item['key'] ? 'is-active' : '' }}" href="{{ route('preview.client.module', ['key' => $item['key']]) }}">
                    <span class="nav-initial">{{ $item['initial'] }}</span>
                    <span>{{ $item['label'] }}</span>
                </a>
            @endforeach
        @endforeach
    </nav>
    <div class="sidebar-bottom">Preview lokal · Data belum terhubung</div>
</aside>
