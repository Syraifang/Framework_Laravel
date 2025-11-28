@extends('layouts.app')

@section('content')
<div class="container">
    <div class="mb-3">
    <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">
        &larr; Kembali ke Dashboard
    </a>
</div>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Manajemen Jenis Hewan</h2>
        <a href="{{ route('admin.jenis-hewan.create') }}" class="btn btn-primary">
            + Tambah Data
        </a>
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
                        <th>Nama Jenis Hewan</th> 
                        <th width="300">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jenisHewan as $index => $hewan)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $hewan->nama_jenis_hewan }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.jenis-hewan.edit', $hewan->idjenis_hewan) }}" class="btn btn-warning btn-sm">Edit</a>
                                
                                <form action="{{ route('admin.jenis-hewan.destroy', $hewan->idjenis_hewan) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection