<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use Exception;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('admin.role.index', compact('roles'));
    }

    public function create()
    {
        return view('admin.role.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_role' => 'required|string|max:100|unique:role,nama_role',
        ]);

        try {
            Role::create([
                'nama_role' => $request->nama_role
            ]);

            return redirect()->route('admin.role.index')->with('success', 'Role berhasil ditambahkan!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Gagal menyimpan: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        return view('admin.role.edit', compact('role'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_role' => 'required|string|max:100|unique:role,nama_role,' . $id . ',idrole',
        ]);

        try {
            $role = Role::findOrFail($id);
            $role->update([
                'nama_role' => $request->nama_role
            ]);

            return redirect()->route('admin.role.index')->with('success', 'Role berhasil diperbarui!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Gagal update: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $role = Role::findOrFail($id);
            
            if ($role->users()->count() > 0) {
                return redirect()->back()->with('error', 'Gagal hapus: Role ini sedang digunakan oleh User.');
            }

            $role->delete();
            return redirect()->route('admin.role.index')->with('success', 'Role berhasil dihapus!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus: ' . $e->getMessage());
        }
    }
}