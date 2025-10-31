<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        return view('site.home');
    }
    public function layanan()
    {
        return view('site.layanan');
    }
    public function strukturOrganisasi()
    {
        return view('site.struktur');
    }
    public function VisiMisi()
    {
        return view('site.visimisi');
    }
    public function login()
    {
        return view('site.login');
    }
}
