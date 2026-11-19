<header class="sp-navbar-wrap">
    <nav class="sp-navbar sp-container" aria-label="Navigasi utama">
        <a class="sp-brand" href="{{ route('public.home') }}" aria-label="SIP-IB Beranda">
            <span class="sp-brand-mark">SI</span>
            <span class="sp-brand-copy">
                <strong>SIP-IB</strong>
                <small>Inventaris Multi-Client</small>
            </span>
        </a>

        <button class="sp-menu-toggle" type="button" aria-expanded="false" aria-controls="sp-main-nav" data-menu-toggle>
            <span></span><span></span><span></span>
            <span class="sp-sr-only">Buka navigasi</span>
        </button>

        <div class="sp-nav-panel" id="sp-main-nav" data-menu-panel>
            <div class="sp-nav-links">
                <a href="{{ route('public.home') }}" class="{{ request()->routeIs('public.home') ? 'is-active' : '' }}">Beranda</a>
                <a href="{{ route('public.home') }}#fitur">Fitur</a>
                <a href="{{ route('public.home') }}#alur">Cara Kerja</a>
                <a href="{{ route('public.home') }}#multi-client">Multi-Client</a>
            </div>
            <div class="sp-nav-actions">
                @auth
                    <span class="sp-user-chip">{{ auth()->user()->name }}</span>
                    <form method="POST" action="{{ route('public.logout') }}">
                        @csrf
                        <button class="sp-btn sp-btn-outline sp-btn-small" type="submit">Keluar</button>
                    </form>
                @else
                    <a class="sp-login-link" href="{{ route('public.login') }}">Login</a>
                    <a class="sp-btn sp-btn-primary sp-btn-small" href="{{ route('public.register') }}">Register <span aria-hidden="true">→</span></a>
                @endauth
            </div>
        </div>
    </nav>
</header>
