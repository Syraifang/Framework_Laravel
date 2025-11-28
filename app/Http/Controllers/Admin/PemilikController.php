<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pemilik;
use App\Models\User;
use Exception;

class PemilikController extends Controller
{
    public function index()
    {
        $pemilik = Pemilik::with('user')->get();
        return view('admin.pemilik.index', compact('pemilik'));
    }

    public function create()
    {
        // Cari user dengan role Pemilik (idrole=5) yang BELUM ada di tabel pemilik
        // Ini agar admin tidak membuat data ganda untuk satu user
        $users = User::whereHas('roles', function($q) {
            $q->where('role.idrole', 5);
        })->whereDoesntHave('pemilik')->get();

        return view('admin.pemilik.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'iduser' => 'required|exists:user,iduser|unique:pemilik,iduser',
            'alamat' => 'required|string|max:255',
            'no_wa' => 'required|string|max:20',
        ]);

        try {
            Pemilik::create([
                'iduser' => $request->iduser,
                'alamat' => $request->alamat,
                'no_wa' => $request->no_wa,
            ]);

            return redirect()->route('admin.pemilik.index')
                ->with('success', 'Data Pemilik berhasil ditambahkan!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Gagal menyimpan: ' . $e->getMessage());
        }
    }

  
    public function edit($id)
    {
        $pemilik = Pemilik::with('user')->findOrFail($id);
        return view('admin.pemilik.edit', compact('pemilik'));
    }

   
    public function update(Request $request, $id)
    {
        $request->validate([
            'alamat' => 'required|string|max:255',
            'no_wa' => 'required|string|max:20',
        ]);

        try {
            $pemilik = Pemilik::findOrFail($id);
            $pemilik->update([
                'alamat' => $request->alamat,
                'no_wa' => $request->no_wa,
            ]);

            return redirect()->route('admin.pemilik.index')
                ->with('success', 'Data Pemilik berhasil diperbarui!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Gagal update: ' . $e->getMessage());
        }
    }

   
    public function destroy($id)
    {
        try {
            $pemilik = Pemilik::findOrFail($id);
            $pemilik->delete();
            return redirect()->route('admin.pemilik.index')
                ->with('success', 'Data Pemilik berhasil dihapus!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus: ' . $e->getMessage());
        }
    }
}