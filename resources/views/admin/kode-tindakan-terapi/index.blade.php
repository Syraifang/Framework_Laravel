@extends('layouts.app')

@section('content')
<div class="container">
    <div class="mb-3">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">
            &larr; Kembali ke Dashboard
        </a>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Manajemen Kode Tindakan Terapi</h2>
        <a href="{{ route('admin.kode-tindakan-terapi.create') }}" class="btn btn-primary">+ Tambah Data</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th width="50">No</th>
                        <th>Kode</th>
                        <th>Deskripsi</th>
                        <th>Kategori</th>
                        <th>Kategori Klinis</th>
                        <th width="200">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kodeTindakan as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->kode }}</td>
                        <td>{{ $item->deskripsi_tindakan_terapi }}</td>
                        <td>{{ $item->kategori->nama_kategori }}</td>
                        <td>{{ $item->kategoriKlinis->nama_kategori_klinis }}</td>
                        <td>
                            <a href="{{ route('admin.kode-tindakan-terapi.edit', $item->idkode_tindakan_terapi) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.kode-tindakan-terapi.destroy', $item->idkode_tindakan_terapi) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Hapus data ini?');">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection