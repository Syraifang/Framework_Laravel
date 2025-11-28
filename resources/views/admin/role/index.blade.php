@extends('layouts.app')

@section('content')
<div class="container">
    <div class="mb-3">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">
            &larr; Kembali ke Dashboard
        </a>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Manajemen Role (Admin)</h2>
        <a href="{{ route('admin.role.create') }}" class="btn btn-primary">+ Tambah Data</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th width="50">No</th>
                        <th>Nama Role</th>
                        <th width="200">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->nama_role }}</td>
                        <td>
                            <a href="{{ route('admin.role.edit', $item->idrole) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.role.destroy', $item->idrole) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Hapus data ini?');">
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