<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RasHewan;
use App\Models\JenisHewan;
use Exception;

class RasHewanController extends Controller
{
    public function index()
    {
        $rasHewan = RasHewan::with('jenisHewan')->get();
        return view('admin.ras-hewan.index', compact('rasHewan'));
    }

    public function create()
    {
        $jenisHewan = JenisHewan::all();
        return view('admin.ras-hewan.create', compact('jenisHewan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_ras' => 'required|string|max:100',
            'idjenis_hewan' => 'required|exists:jenis_hewan,idjenis_hewan',
        ]);

        try {
            RasHewan::create([
                'nama_ras' => $request->nama_ras,
                'idjenis_hewan' => $request->idjenis_hewan
            ]);

            return redirect()->route('admin.ras-hewan.index')->with('success', 'Data berhasil ditambahkan!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Gagal menyimpan: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $rasHewan = RasHewan::findOrFail($id);
        $jenisHewan = JenisHewan::all();
        return view('admin.ras-hewan.edit', compact('rasHewan', 'jenisHewan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_ras' => 'required|string|max:100',
            'idjenis_hewan' => 'required|exists:jenis_hewan,idjenis_hewan',
        ]);

        try {
            $rasHewan = RasHewan::findOrFail($id);
            $rasHewan->update([
                'nama_ras' => $request->nama_ras,
                'idjenis_hewan' => $request->idjenis_hewan
            ]);

            return redirect()->route('admin.ras-hewan.index')->with('success', 'Data berhasil diperbarui!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Gagal update: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $rasHewan = RasHewan::findOrFail($id);
            $rasHewan->delete();
            return redirect()->route('admin.ras-hewan.index')->with('success', 'Data berhasil dihapus!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus: ' . $e->getMessage());
        }
    }
}