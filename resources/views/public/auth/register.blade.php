@extends('public.layout')

@section('title', 'Register Client | SIP-IB')
@section('body-class', 'sp-auth-body')

@section('content')
<section class="sp-auth-section sp-register-section">
    <div class="sp-container sp-auth-container">
        <div class="sp-auth-card sp-register-card">
            <aside class="sp-auth-aside sp-register-aside">
                <a href="{{ route('public.home') }}" class="sp-auth-mark"><span class="sp-brand-mark">SI</span><b>SIP-IB</b></a>
                <div class="sp-auth-aside-copy">
                    <span class="sp-kicker sp-kicker-light">REGISTRASI CLIENT</span>
                    <h1>Mulai kelola inventaris dari satu tempat.</h1>
                    <p>Daftarkan organisasi atau unit usaha Anda. Sistem akan membuat client dan akun Admin Client pertama secara otomatis.</p>
                    <div class="sp-register-steps"><div><b>01</b><span>Isi data client</span></div><div><b>02</b><span>Buat akun Admin Client</span></div><div><b>03</b><span>Login dan mulai menyiapkan inventaris</span></div></div>
                </div>
                <div class="sp-auth-aside-foot">Data client akan dipisahkan dari client lainnya.</div>
            </aside>

            <div class="sp-auth-form-panel sp-register-form-panel">
                <div class="sp-auth-form-head">
                    <span class="sp-kicker">BUAT RUANG INVENTARIS</span>
                    <h2>Daftarkan Client</h2>
                    <p>Lengkapi data client dan akun Admin Client pertama.</p>
                </div>

                @if ($errors->any())
                    <div class="sp-form-alert" role="alert">{{ $errors->first() }}</div>
                @endif

                <form method="POST" action="{{ route('public.register.submit') }}" class="sp-form sp-register-form">
                    @csrf
                    <div class="sp-form-section-title"><span>01</span><b>Informasi Client</b></div>
                    <div class="sp-field-group">
                        <label class="sp-field-label" for="client_name">Nama Client <em>*</em></label>
                        <input class="sp-text-input" id="client_name" name="client_name" type="text" value="{{ old('client_name') }}" maxlength="150" placeholder="Contoh: CV Maju Bersama" autocomplete="organization" required>
                        @error('client_name')<small class="sp-field-error">{{ $message }}</small>@enderror
                    </div>
                    <div class="sp-field-group">
                        <label class="sp-field-label" for="contact">Nomor Kontak <em>*</em></label>
                        <input class="sp-text-input" id="contact" name="contact" type="tel" value="{{ old('contact') }}" maxlength="50" placeholder="Contoh: 0812xxxxxxxx" autocomplete="tel" required>
                        @error('contact')<small class="sp-field-error">{{ $message }}</small>@enderror
                    </div>
                    <div class="sp-field-group">
                        <label class="sp-field-label" for="address">Alamat <span>(opsional)</span></label>
                        <textarea class="sp-text-input sp-textarea" id="address" name="address" rows="2" maxlength="2000" placeholder="Alamat client">{{ old('address') }}</textarea>
                        @error('address')<small class="sp-field-error">{{ $message }}</small>@enderror
                    </div>

                    <div class="sp-form-section-title"><span>02</span><b>Akun Admin Client</b></div>
                    <div class="sp-field-group">
                        <label class="sp-field-label" for="admin_name">Nama Admin Client <em>*</em></label>
                        <input class="sp-text-input" id="admin_name" name="admin_name" type="text" value="{{ old('admin_name') }}" maxlength="150" placeholder="Nama lengkap pengelola" autocomplete="name" required>
                        @error('admin_name')<small class="sp-field-error">{{ $message }}</small>@enderror
                    </div>
                    <div class="sp-field-group">
                        <label class="sp-field-label" for="email">Email <em>*</em></label>
                        <input class="sp-text-input" id="email" name="email" type="email" value="{{ old('email') }}" maxlength="150" placeholder="nama@email.com" autocomplete="email" required>
                        @error('email')<small class="sp-field-error">{{ $message }}</small>@enderror
                    </div>
                    <div class="sp-form-two-cols">
                        <div class="sp-field-group">
                            <label class="sp-field-label" for="password">Kata Sandi <em>*</em></label>
                            <div class="sp-password-field"><input class="sp-text-input" id="password" name="password" type="password" minlength="8" autocomplete="new-password" placeholder="Minimal 8 karakter" required><button type="button" class="sp-password-toggle" data-toggle-password="password">Lihat</button></div>
                            @error('password')<small class="sp-field-error">{{ $message }}</small>@enderror
                        </div>
                        <div class="sp-field-group">
                            <label class="sp-field-label" for="password_confirmation">Konfirmasi Sandi <em>*</em></label>
                            <div class="sp-password-field"><input class="sp-text-input" id="password_confirmation" name="password_confirmation" type="password" minlength="8" autocomplete="new-password" placeholder="Ulangi kata sandi" required><button type="button" class="sp-password-toggle" data-toggle-password="password_confirmation">Lihat</button></div>
                        </div>
                    </div>

                    <div class="sp-register-note"><span>i</span><p>Setelah registrasi berhasil, sistem membuat satu data client dan satu akun dengan role <b>Admin Client</b>. Kode client dibuat otomatis oleh sistem.</p></div>
                    <button type="submit" class="sp-btn sp-btn-primary sp-btn-submit">Buat Client & Akun <span aria-hidden="true">→</span></button>
                </form>
                <p class="sp-auth-switch sp-register-switch">Sudah memiliki akun? <a href="{{ route('public.login') }}">Login di sini</a></p>
                <a class="sp-back-home" href="{{ route('public.home') }}">← Kembali ke halaman utama</a>
            </div>
        </div>
    </div>
</section>
@endsection
