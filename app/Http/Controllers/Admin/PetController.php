<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pet; // 1. Impor Model

class PetController extends Controller
{
    public function index()
    {
        // 2. Ambil semua pet, dan muat data relasi 'pemilik' & 'rasHewan'
        // Kita juga memuat relasi 'user' dari 'pemilik'
        $pets = Pet::with(['pemilik.user', 'rasHewan'])->get();
        
        // 3. Kirim data ke view
        return view('admin.pet.index', compact('pets'));
    }
}