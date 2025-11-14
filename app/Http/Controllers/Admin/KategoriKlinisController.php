<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KategoriKlinis; // 1. Impor Model KategoriKlinis

class KategoriKlinisController extends Controller
{
    public function index()
    {
        // 2. Ambil semua data
        $kategoriKlinis = KategoriKlinis::all();
        
        // 3. Kirim data ke view
        return view('admin.kategori-klinis.index', compact('kategoriKlinis'));
    }
}