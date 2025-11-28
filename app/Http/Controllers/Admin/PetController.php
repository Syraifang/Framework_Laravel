<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pet;
use App\Models\Pemilik;
use App\Models\RasHewan;
use Exception;

class PetController extends Controller
{
    public function index()
    {
        // Ambil data pet dengan relasi pemilik (dan user-nya) serta ras hewan
        $pets = Pet::with(['pemilik.user', 'rasHewan'])->get();
        return view('admin.pet.index', compact('pets'));
    }

    public function create()
    {
        // Ambil data untuk dropdown
        // Kita butuh data user dari pemilik untuk menampilkan nama
        $pemilik = Pemilik::with('user')->get();
        $rasHewan = RasHewan::all();
        
        return view('admin.pet.create', compact('pemilik', 'rasHewan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'idpemilik' => 'required|exists:pemilik,idpemilik',
            'idras_hewan' => 'required|exists:ras_hewan,idras_hewan',
            'warna_tanda' => 'required|string|max:45',
            'jenis_kelamin' => 'required|in:L,P',
            'tanggal_lahir' => 'required|date',
        ]);

        try {
            Pet::create([
                'nama' => $request->nama,
                'idpemilik' => $request->idpemilik,
                'idras_hewan' => $request->idras_hewan,
                'warna_tanda' => $request->warna_tanda,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tanggal_lahir' => $request->tanggal_lahir,
            ]);

            return redirect()->route('admin.pet.index')
                ->with('success', 'Data Pet berhasil ditambahkan!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Gagal menyimpan: ' . $e->getMessage())->withInput();
        }
    }

    public function edit($id)
    {
        $pet = Pet::findOrFail($id);
        $pemilik = Pemilik::with('user')->get();
        $rasHewan = RasHewan::all();

        return view('admin.pet.edit', compact('pet', 'pemilik', 'rasHewan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'idpemilik' => 'required|exists:pemilik,idpemilik',
            'idras_hewan' => 'required|exists:ras_hewan,idras_hewan',
            'warna_tanda' => 'required|string|max:45',
            'jenis_kelamin' => 'required|in:L,P',
            'tanggal_lahir' => 'required|date',
        ]);

        try {
            $pet = Pet::findOrFail($id);
            $pet->update([
                'nama' => $request->nama,
                'idpemilik' => $request->idpemilik,
                'idras_hewan' => $request->idras_hewan,
                'warna_tanda' => $request->warna_tanda,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tanggal_lahir' => $request->tanggal_lahir,
            ]);

            return redirect()->route('admin.pet.index')
                ->with('success', 'Data Pet berhasil diperbarui!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Gagal update: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $pet = Pet::findOrFail($id);
            $pet->delete();
            return redirect()->route('admin.pet.index')
                ->with('success', 'Data Pet berhasil dihapus!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus: ' . $e->getMessage());
        }
    }
}