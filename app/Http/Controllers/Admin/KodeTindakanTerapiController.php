<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KodeTindakanTerapi;
use App\Models\Kategori;
use App\Models\KategoriKlinis;
use Exception;

class KodeTindakanTerapiController extends Controller
{
    public function index()
    {
        // Ambil data beserta relasinya
        $kodeTindakan = KodeTindakanTerapi::with(['kategori', 'kategoriKlinis'])->get();
        return view('admin.kode-tindakan-terapi.index', compact('kodeTindakan'));
    }

    public function create()
    {
        // Ambil data untuk dropdown
        $kategori = Kategori::all();
        $kategoriKlinis = KategoriKlinis::all();
        
        return view('admin.kode-tindakan-terapi.create', compact('kategori', 'kategoriKlinis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|string|max:50|unique:kode_tindakan_terapi,kode',
            'deskripsi_tindakan_terapi' => 'required|string|max:255',
            'idkategori' => 'required|exists:kategori,idkategori',
            'idkategori_klinis' => 'required|exists:kategori_klinis,idkategori_klinis',
        ]);

        try {
            KodeTindakanTerapi::create([
                'kode' => $request->kode,
                'deskripsi_tindakan_terapi' => $request->deskripsi_tindakan_terapi,
                'idkategori' => $request->idkategori,
                'idkategori_klinis' => $request->idkategori_klinis,
            ]);

            return redirect()->route('admin.kode-tindakan-terapi.index')
                ->with('success', 'Data berhasil ditambahkan!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Gagal menyimpan: ' . $e->getMessage())->withInput();
        }
    }

    public function edit($id)
    {
        $kodeTindakan = KodeTindakanTerapi::findOrFail($id);
        $kategori = Kategori::all();
        $kategoriKlinis = KategoriKlinis::all();

        return view('admin.kode-tindakan-terapi.edit', compact('kodeTindakan', 'kategori', 'kategoriKlinis'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode' => 'required|string|max:50|unique:kode_tindakan_terapi,kode,' . $id . ',idkode_tindakan_terapi',
            'deskripsi_tindakan_terapi' => 'required|string|max:255',
            'idkategori' => 'required|exists:kategori,idkategori',
            'idkategori_klinis' => 'required|exists:kategori_klinis,idkategori_klinis',
        ]);

        try {
            $kodeTindakan = KodeTindakanTerapi::findOrFail($id);
            $kodeTindakan->update([
                'kode' => $request->kode,
                'deskripsi_tindakan_terapi' => $request->deskripsi_tindakan_terapi,
                'idkategori' => $request->idkategori,
                'idkategori_klinis' => $request->idkategori_klinis,
            ]);

            return redirect()->route('admin.kode-tindakan-terapi.index')
                ->with('success', 'Data berhasil diperbarui!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Gagal update: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $kodeTindakan = KodeTindakanTerapi::findOrFail($id);
            $kodeTindakan->delete();
            return redirect()->route('admin.kode-tindakan-terapi.index')
                ->with('success', 'Data berhasil dihapus!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus: ' . $e->getMessage());
        }
    }
}