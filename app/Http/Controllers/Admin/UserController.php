<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\RoleUser;
use Illuminate\Support\Facades\Hash;
use Exception;

class UserController extends Controller
{
    public function index()
    {
        // Ambil user beserta role-nya
        $users = User::with('roles')->get();
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        // Ambil data role untuk dropdown
        $roles = Role::all();
        return view('admin.user.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|email|unique:user,email',
            'password' => 'required|min:6',
            'idrole' => 'required|exists:role,idrole', // Validasi Role wajib dipilih
        ]);

        try {
            // 1. Buat User Baru
            $user = User::create([
                'nama' => $request->nama,
                'email' => $request->email,
                'password' => Hash::make($request->password), // Enkripsi password
            ]);

            // 2. Berikan Role ke User tersebut (Insert ke tabel role_user)
            RoleUser::create([
                'iduser' => $user->iduser,
                'idrole' => $request->idrole,
                'status' => 1 // Default aktif
            ]);

            return redirect()->route('admin.user.index')->with('success', 'User berhasil ditambahkan!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Gagal menyimpan: ' . $e->getMessage())->withInput();
        }
    }

    public function edit($id)
    {
        $user = User::with('roles')->findOrFail($id);
        $roles = Role::all();
        
        // Ambil idrole aktif user saat ini (jika ada)
        $currentRole = $user->roles->first()->idrole ?? null;

        return view('admin.user.edit', compact('user', 'roles', 'currentRole'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|email|unique:user,email,' . $id . ',iduser',
            'idrole' => 'required|exists:role,idrole',
            'password' => 'nullable|min:6', 
        ]);

        try {
            $user = User::findOrFail($id);

            $userData = [
                'nama' => $request->nama,
                'email' => $request->email,
            ];

            if ($request->filled('password')) {
                $userData['password'] = Hash::make($request->password);
            }

            $user->update($userData);

            RoleUser::where('iduser', $user->iduser)->delete();
            
            RoleUser::create([
                'iduser' => $user->iduser,
                'idrole' => $request->idrole,
                'status' => 1
            ]);

            return redirect()->route('admin.user.index')->with('success', 'User berhasil diperbarui!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Gagal update: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            
            RoleUser::where('iduser', $user->iduser)->delete();
            
            $user->delete();

            return redirect()->route('admin.user.index')->with('success', 'User berhasil dihapus!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus: ' . $e->getMessage());
        }
    }
}