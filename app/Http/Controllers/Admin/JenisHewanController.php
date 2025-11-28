<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JenisHewan;
use Exception;

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
        $validatedData = $this->validateJenisHewan($request);

        try {
            $this->createJenisHewan($validatedData);

            return redirect()->route('admin.jenis-hewan.index')
                ->with('success', 'Jenis hewan berhasil ditambahkan.');
        } catch (Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal menyimpan data: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function edit($id)
    {
        $jenisHewan = JenisHewan::findOrFail($id);
        return view('admin.jenis-hewan.edit', compact('jenisHewan'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $this->validateJenisHewan($request, $id);

        try {
            $jenisHewan = JenisHewan::findOrFail($id);
            
            $jenisHewan->update([
                'nama_jenis_hewan' => $this->formatNamaJenisHewan($validatedData['nama_jenis_hewan'])
            ]);

            return redirect()->route('admin.jenis-hewan.index')
                ->with('success', 'Data berhasil diperbarui!');
        } catch (Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal memperbarui data: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $jenisHewan = JenisHewan::findOrFail($id);
            $jenisHewan->delete();

            return redirect()->route('admin.jenis-hewan.index')
                ->with('success', 'Data berhasil dihapus!');
        } catch (Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }

    // --- PRIVATE HELPER METHODS ---
    protected function validateJenisHewan(Request $request, $id = null)
    {
        $uniqueRule = $id ? 'unique:jenis_hewan,nama_jenis_hewan,' . $id . ',idjenis_hewan' 
                          : 'unique:jenis_hewan,nama_jenis_hewan';

        return $request->validate([
            'nama_jenis_hewan' => [
                'required', 'string', 'max:255', 'min:3', $uniqueRule
            ]
        ], [
            'nama_jenis_hewan.required' => 'Nama jenis hewan wajib diisi.',
            'nama_jenis_hewan.string'   => 'Nama jenis hewan harus berupa teks.',
            'nama_jenis_hewan.max'      => 'Nama jenis hewan maksimal 255 karakter.',
            'nama_jenis_hewan.min'      => 'Nama jenis hewan minimal 3 karakter.',
            'nama_jenis_hewan.unique'   => 'Nama jenis hewan sudah ada.',
        ]);
    }

    protected function createJenisHewan(array $data)
    {
        return JenisHewan::create([
            'nama_jenis_hewan' => $this->formatNamaJenisHewan($data['nama_jenis_hewan']),
        ]);
    }

    protected function formatNamaJenisHewan($nama)
    {
        return trim(ucwords(strtolower($nama)));
    }
}