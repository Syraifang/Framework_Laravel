@extends('layouts.app')

@section('content')
<div class="container">
    <div class="mb-3">
    <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">
        &larr; Kembali ke Dashboard
    </a>
</div>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Manajemen Ras Hewan</h2>
        <a href="{{ route('admin.ras-hewan.create') }}" class="btn btn-primary">+ Tambah Data</a>
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
                        <th>Nama Ras</th>
                        <th>Jenis Hewan</th>
                        <th width="300">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rasHewan as $index => $ras)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $ras->nama_ras }}</td>
                        <td>{{ $ras->jenisHewan->nama_jenis_hewan }}</td>
                        <td>
                            <a href="{{ route('admin.ras-hewan.edit', $ras->idras_hewan) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.ras-hewan.destroy', $ras->idras_hewan) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Hapus data ini?');">
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