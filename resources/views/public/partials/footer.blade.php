<footer class="sp-footer">
    <div class="sp-container">
        <div class="sp-footer-main">
            <div class="sp-footer-brand">
                <a class="sp-brand sp-brand-footer" href="{{ route('public.home') }}">
                    <span class="sp-brand-mark">SI</span>
                    <span class="sp-brand-copy"><strong>SIP-IB</strong><small>Inventaris Multi-Client</small></span>
                </a>
                <p>Sistem Informasi Pengelolaan Inventaris Barang berbasis web untuk membantu pencatatan persediaan secara terstruktur dan terpisah per client.</p>
            </div>
            <div class="sp-footer-col">
                <strong>Jelajahi</strong>
                <a href="{{ route('public.home') }}#fitur">Fitur Sistem</a>
                <a href="{{ route('public.home') }}#alur">Cara Kerja</a>
                <a href="{{ route('public.home') }}#multi-client">Multi-Client</a>
            </div>
            <div class="sp-footer-col">
                <strong>Akun</strong>
                <a href="{{ route('public.login') }}">Login</a>
                <a href="{{ route('public.register') }}">Registrasi Client</a>
            </div>
        </div>
        <div class="sp-footer-bottom">
            <span>© {{ date('Y') }} SIP-IB · Proyek Pemrograman Web Lanjut</span>
            <span>Kelola inventaris dengan lebih terarah.</span>
        </div>
    </div>
</footer>
