<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JenisHewan;

class JenisHewanController extends Controller
{
    public function index()
    {
        $jenisHewan = JenisHewan::all();
        return view('admin.jenis-hewan.index', compact('jenisHewan'));
    }

    public function create()
    {
        return view('admin.jenis-hewan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_jenis_hewan' => 'required|string|max:100',
        ]);
        JenisHewan::create([
            'nama_jenis_hewan' => $request->nama_jenis_hewan
        ]);

        return redirect()->route('admin.jenis-hewan.index')->with('success', 'Data berhasil ditambahkan!');
    }
    public function edit($id)
    {
        $jenisHewan = JenisHewan::findOrFail($id);
        return view('admin.jenis-hewan.edit', compact('jenisHewan'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_jenis_hewan' => 'required|string|max:100',
        ]);

        $jenisHewan = JenisHewan::findOrFail($id);
        $jenisHewan->update([
            'nama_jenis_hewan' => $request->nama_jenis_hewan
        ]);

        return redirect()->route('admin.jenis-hewan.index')->with('success', 'Data berhasil diperbarui!');
    }
    public function destroy($id)
    {
        $jenisHewan = JenisHewan::findOrFail($id);
        $jenisHewan->delete();

        return redirect()->route('admin.jenis-hewan.index')->with('success', 'Data berhasil dihapus!');
    }
}