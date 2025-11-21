@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Manajemen Jenis Hewan</h2>
        <a href="{{ route('admin.jenis-hewan.create') }}" class="btn btn-primary">
            + Tambah Jenis Hewan
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
                        <th width="200">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jenisHewan as $index => $hewan)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $hewan->nama_jenis_hewan }}</td>
                        <td>
                            <a href="{{ route('admin.jenis-hewan.edit', $hewan->idjenis_hewan) }}" class="btn btn-warning btn-sm">Edit</a>
                            
                            <form action="{{ route('admin.jenis-hewan.destroy', $hewan->idjenis_hewan) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus?');">
                                @csrf
                                @method('DELETE')
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