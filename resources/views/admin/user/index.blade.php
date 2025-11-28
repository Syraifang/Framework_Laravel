@extends('layouts.app')

@section('content')
<div class="container">
    <div class="mb-3">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">
            &larr; Kembali ke Dashboard
        </a>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Manajemen User (Admin)</h2>
        <a href="{{ route('admin.user.create') }}" class="btn btn-primary">+ Tambah User</a>
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
                        <th>Role</th>
                        <th width="200">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $index => $user)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $user->nama }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @foreach ($user->roles as $role)
                                <span class="badge bg-info text-dark">{{ $role->nama_role }}</span>
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('admin.user.edit', $user->iduser) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.user.destroy', $user->iduser) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Hapus user ini?');">
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