<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role; // 1. Impor Model Role

class RoleController extends Controller
{
    public function index()
    {
        // 2. Ambil semua data
        $roles = Role::all();
        
        // 3. Kirim data ke view
        return view('admin.role.index', compact('roles'));
    }
}