<?php

namespace App\Http\Controllers\PublicSite;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Routing\Route as RoutingRoute;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Illuminate\Database\QueryException;

class PublicAuthController extends Controller
{
    public function showLogin(): View
    {
        return view('public.auth.login');
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email', 'max:150'],
            'password' => ['required', 'string'],
        ], [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Masukkan alamat email yang valid.',
            'password.required' => 'Kata sandi wajib diisi.',
        ]);

        $user = User::query()
            ->where('email', Str::lower($credentials['email']))
            ->first();

        if (! $user || ! Hash::check($credentials['password'], $user->password)) {
            return back()
                ->withErrors(['email' => 'Email atau kata sandi tidak sesuai.'])
                ->onlyInput('email');
        }

        $status = Str::lower(trim((string) $user->status));
        if (! in_array($status, ['aktif', 'active'], true)) {
            return back()
                ->withErrors(['email' => 'Akun ini tidak aktif. Hubungi pengelola client.'])
                ->onlyInput('email');
        }

        $role = Str::lower(trim((string) $user->role));
        $role = str_replace(['_', '-'], ' ', $role);

        if (! in_array($role, ['admin client', 'admin platform'], true)) {
            return back()
                ->withErrors(['email' => 'Peran akun tidak dikenali. Pastikan role tersimpan sebagai Admin Client atau Admin Platform.'])
                ->onlyInput('email');
        }

        Auth::login($user);
        $request->session()->regenerate();

        $dashboardPath = $role === 'admin platform'
            ? (string) config('sipib_public.dashboard_paths.platform', '')
            : (string) config('sipib_public.dashboard_paths.client', '');

        if ($dashboardPath !== '' && $this->isRegisteredGetPath($dashboardPath)) {
            return redirect()->intended($dashboardPath);
        }

        return redirect()->route('public.home')->with(
            'status',
            'Login berhasil sebagai ' . $user->role . '. Halaman dashboard internal belum dihubungkan pada konfigurasi proyek.'
        );
    }

    public function register(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'client_name' => ['required', 'string', 'max:150'],
            'admin_name' => ['required', 'string', 'max:150'],
            'email' => ['required', 'email', 'max:150', 'unique:tb_users,email'],
            'contact' => ['required', 'string', 'max:50'],
            'address' => ['nullable', 'string', 'max:2000'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'client_name.required' => 'Nama client wajib diisi.',
            'admin_name.required' => 'Nama Admin Client wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Masukkan alamat email yang valid.',
            'email.unique' => 'Email tersebut sudah digunakan.',
            'contact.required' => 'Nomor kontak wajib diisi.',
            'password.min' => 'Kata sandi minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi kata sandi tidak sama.',
        ]);

        try {
            $clientId = DB::transaction(function () use ($data): int {
                do {
                    $clientCode = 'CL-' . now()->format('ymd') . '-' . Str::upper(Str::random(5));
                } while (DB::table('tb_clients')->where('code', $clientCode)->exists());

                $clientId = DB::table('tb_clients')->insertGetId([
                    'code' => $clientCode,
                    'name' => trim($data['client_name']),
                    'address' => isset($data['address']) ? trim($data['address']) : null,
                    'contact' => trim($data['contact']),
                    'status' => 'Aktif',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                DB::table('tb_users')->insert([
                    'client_id' => $clientId,
                    'role' => 'Admin Client',
                    'name' => trim($data['admin_name']),
                    'email' => Str::lower(trim($data['email'])),
                    'password' => Hash::make($data['password']),
                    'status' => 'Aktif',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                return (int) $clientId;
            });
        } catch (QueryException $exception) {
            report($exception);

            return back()
                ->withInput($request->except(['password', 'password_confirmation']))
                ->withErrors([
                    'registration' => 'Pendaftaran belum dapat disimpan. Pastikan database sip_ib_multi_client dan tabel tb_clients serta tb_users sudah tersedia.',
                ]);
        }

        return redirect()->route('public.login')->with(
            'status',
            'Pendaftaran berhasil. Client dan akun Admin Client sudah dibuat. Silakan login.'
        );
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('public.home')->with('status', 'Anda berhasil keluar dari SIP-IB.');
    }

    private function isRegisteredGetPath(string $path): bool
    {
        if (! str_starts_with($path, '/') || str_starts_with($path, '//')) {
            return false;
        }

        try {
            $route = Route::getRoutes()->match(Request::create($path, 'GET'));
            return $route instanceof RoutingRoute
                && ! in_array($route->uri(), ['login', 'register'], true);
        } catch (HttpExceptionInterface) {
            return false;
        }
    }
}
