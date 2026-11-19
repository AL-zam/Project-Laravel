<?php

namespace App\Http\Controllers\PublicSite;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class PublicPageController extends Controller
{
    public function home(): View
    {
        return view('public.home');
    }

    public function login(): View
    {
        return view('public.auth.login');
    }

    public function register(): View
    {
        return view('public.auth.register');
    }
}
