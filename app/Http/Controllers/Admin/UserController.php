<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; // 1. Impor Model User

class UserController extends Controller
{
    public function index()
    {
        // 2. Ambil semua user, dan muat data relasi 'roles'
        $users = User::with('roles')->get();
        
        // 3. Kirim data ke view
        return view('admin.user.index', compact('users'));
    }
}