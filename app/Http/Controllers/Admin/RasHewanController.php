<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RasHewan; // 1. Kita impor Model RasHewan

class RasHewanController extends Controller
{
    public function index()
    {
        // 2. Ambil semua ras, DAN juga data 'jenisHewan' yang terelasi
        $rasHewan = RasHewan::with('jenisHewan')->get();
        
        // 3. Kirim data ke view
        return view('admin.ras-hewan.index', compact('rasHewan'));
    }
}