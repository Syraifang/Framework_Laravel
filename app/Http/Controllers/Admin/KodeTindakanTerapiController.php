<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KodeTindakanTerapi; // 1. Impor Model

class KodeTindakanTerapiController extends Controller
{
    public function index()
    {
        // 2. Ambil semua data, termasuk data dari relasi 'kategori' dan 'kategoriKlinis'
        $kodeTindakan = KodeTindakanTerapi::with(['kategori', 'kategoriKlinis'])->get();
        
        // 3. Kirim data ke view
        return view('admin.kode-tindakan-terapi.index', compact('kodeTindakan'));
    }
}