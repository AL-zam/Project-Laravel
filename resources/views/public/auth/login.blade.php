@extends('public.layout')

@section('title', 'Login | SIP-IB')
@section('body-class', 'sp-auth-body')

@section('content')
<section class="sp-auth-section">
    <div class="sp-container sp-auth-container">
        <div class="sp-auth-card">
            <aside class="sp-auth-aside">
                <a href="{{ route('public.home') }}" class="sp-auth-mark"><span class="sp-brand-mark">SI</span><b>SIP-IB</b></a>
                <div class="sp-auth-aside-copy">
                    <span class="sp-kicker sp-kicker-light">SELAMAT DATANG KEMBALI</span>
                    <h1>Inventaris tertata, pekerjaan lebih terarah.</h1>
                    <p>Masuk untuk melanjutkan pengelolaan barang, gudang, dan pergerakan stok pada client Anda.</p>
                    <div class="sp-auth-benefits"><span>✓ Data inventaris sesuai client</span><span>✓ Riwayat transaksi terpusat</span><span>✓ Pemantauan stok per gudang</span></div>
                </div>
                <div class="sp-auth-aside-foot">Sistem Informasi Pengelolaan Inventaris Barang</div>
            </aside>

            <div class="sp-auth-form-panel">
                <div class="sp-auth-form-head">
                    <span class="sp-kicker">AKSES AKUN</span>
                    <h2>Login ke SIP-IB</h2>
                    <p>Masukkan email dan kata sandi akun Anda.</p>
                </div>

                @if ($errors->any())
                    <div class="sp-form-alert" role="alert">{{ $errors->first() }}</div>
                @endif

                <form method="POST" action="{{ route('public.login.submit') }}" class="sp-form">
                    @csrf
                    <label class="sp-field-label" for="email">Email</label>
                    <div class="sp-input-wrap"><span class="sp-input-icon">✉</span><input id="email" name="email" type="email" value="{{ old('email') }}" placeholder="nama@email.com" autocomplete="email" required autofocus></div>
                    @error('email')<small class="sp-field-error">{{ $message }}</small>@enderror

                    <div class="sp-field-row"><label class="sp-field-label" for="password">Kata Sandi</label><a href="{{ route('public.register') }}" class="sp-small-link">Belum punya akun?</a></div>
                    <div class="sp-input-wrap"><span class="sp-input-icon">⌑</span><input id="password" name="password" type="password" placeholder="Masukkan kata sandi" autocomplete="current-password" required><button type="button" class="sp-password-toggle" data-toggle-password="password">Lihat</button></div>
                    @error('password')<small class="sp-field-error">{{ $message }}</small>@enderror

                    <button type="submit" class="sp-btn sp-btn-primary sp-btn-submit">Login <span aria-hidden="true">→</span></button>
                </form>

                <div class="sp-auth-divider"><span>atau</span></div>
                <p class="sp-auth-switch">Belum terdaftar sebagai client? <a href="{{ route('public.register') }}">Buat akun client</a></p>
                <a class="sp-back-home" href="{{ route('public.home') }}">← Kembali ke halaman utama</a>
            </div>
        </div>
    </div>
</section>
@endsection
