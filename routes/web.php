<?php

use App\Http\Controllers\Client\DashboardController as ClientDashboardController;
use App\Http\Controllers\Platform\DashboardController as PlatformDashboardController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

// PENTING: preview tidak terdaftar di production.
// Ini bukan pengganti middleware auth/role/client yang akan dibuat tahap berikutnya.
if (app()->environment(['local', 'testing'])) {
    Route::prefix('preview')->name('preview.')->group(function (): void {
        Route::get('/platform', PlatformDashboardController::class)->name('platform');
        Route::view('/platform/clients', 'platform.clients.index')->name('platform.clients');

        Route::get('/client', ClientDashboardController::class)->name('client');
        Route::get('/client/menu/{key}', function (string $key) {
            $module = collect(config('sipib.client_menus'))
                ->flatMap(fn (array $section) => $section['items'])
                ->firstWhere('key', $key);

            abort_if($module === null, 404);

            return view('client.preview-module', compact('module'));
        })->where('key', '[a-z0-9-]+')->name('client.module');
    });
}