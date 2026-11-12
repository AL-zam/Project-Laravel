<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

// TAHAP 1 SIP-IB | PIC: Anggota 3, review UI Anggota 1.
// Jangan akses data stok sebelum auth dan ClientContext siap.
class DashboardController extends Controller
{
    public function __invoke(): View
    {
        return view('client.dashboard.index');
    }
}