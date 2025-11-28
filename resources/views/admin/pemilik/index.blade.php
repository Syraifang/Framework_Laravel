@extends('layouts.app')

@section('content')
<div class="container">
    <div class="mb-3">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">
            &larr; Kembali ke Dashboard
        </a>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Manajemen Data Pemilik (Admin)</h2>
        <a href="{{ route('admin.pemilik.create') }}" class="btn btn-primary">+ Lengkapi Data Pemilik</a>
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
                        <th>Nama User</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>No WA</th>
                        <th width="200">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pemilik as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->user->nama ?? '-' }}</td>
                        <td>{{ $item->user->email ?? '-' }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>{{ $item->no_wa }}</td>
                        <td>
                            <a href="{{ route('admin.pemilik.edit', $item->idpemilik) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.pemilik.destroy', $item->idpemilik) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Hapus data profil ini?');">
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