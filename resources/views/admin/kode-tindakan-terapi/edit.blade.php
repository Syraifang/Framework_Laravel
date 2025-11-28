@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Kode Tindakan Terapi</div>
                <div class="card-body">
                    <form action="{{ route('admin.kode-tindakan-terapi.update', $kodeTindakan->idkode_tindakan_terapi) }}" method="POST">
                        @csrf @method('PUT')

                        <div class="form-group mb-3">
                            <label>Kode</label>
                            <input type="text" name="kode" class="form-control" value="{{ $kodeTindakan->kode }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label>Deskripsi Tindakan</label>
                            <input type="text" name="deskripsi_tindakan_terapi" class="form-control" value="{{ $kodeTindakan->deskripsi_tindakan_terapi }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label>Kategori</label>
                            <select name="idkategori" class="form-control" required>
                                <option value="">-- Pilih Kategori --</option>
                                @foreach($kategori as $kat)
                                    <option value="{{ $kat->idkategori }}" 
                                        {{ $kodeTindakan->idkategori == $kat->idkategori ? 'selected' : '' }}>
                                        {{ $kat->nama_kategori }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label>Kategori Klinis</label>
                            <select name="idkategori_klinis" class="form-control" required>
                                <option value="">-- Pilih Kategori Klinis --</option>
                                @foreach($kategoriKlinis as $klinis)
                                    <option value="{{ $klinis->idkategori_klinis }}" 
                                        {{ $kodeTindakan->idkategori_klinis == $klinis->idkategori_klinis ? 'selected' : '' }}>
                                        {{ $klinis->nama_kategori_klinis }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('admin.kode-tindakan-terapi.index') }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection