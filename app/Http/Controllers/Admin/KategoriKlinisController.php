<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KategoriKlinis;
use Exception;

class KategoriKlinisController extends Controller
{
    public function index()
    {
        $kategoriKlinis = KategoriKlinis::all();
        return view('admin.kategori-klinis.index', compact('kategoriKlinis'));
    }

    public function create()
    {
        return view('admin.kategori-klinis.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori_klinis' => 'required|string|max:100',
        ]);

        try {
            KategoriKlinis::create([
                'nama_kategori_klinis' => $request->nama_kategori_klinis
            ]);
            return redirect()->route('admin.kategori-klinis.index')->with('success', 'Data berhasil ditambahkan!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Gagal menyimpan: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $kategoriKlinis = KategoriKlinis::findOrFail($id);
        return view('admin.kategori-klinis.edit', compact('kategoriKlinis'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori_klinis' => 'required|string|max:100',
        ]);

        try {
            $kategoriKlinis = KategoriKlinis::findOrFail($id);
            $kategoriKlinis->update([
                'nama_kategori_klinis' => $request->nama_kategori_klinis
            ]);
            return redirect()->route('admin.kategori-klinis.index')->with('success', 'Data berhasil diperbarui!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Gagal update: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $kategoriKlinis = KategoriKlinis::findOrFail($id);
            $kategoriKlinis->delete();
            return redirect()->route('admin.kategori-klinis.index')->with('success', 'Data berhasil dihapus!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus: ' . $e->getMessage());
        }
    }
}