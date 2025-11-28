@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit User</div>
                <div class="card-body">
                    <form action="{{ route('admin.user.update', $user->iduser) }}" method="POST">
                        @csrf @method('PUT')

                        <div class="form-group mb-3">
                            <label>Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control" value="{{ $user->nama }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label>Password (Opsional)</label>
                            <input type="password" name="password" class="form-control" placeholder="">
                        </div>

                        <div class="form-group mb-3">
                            <label>Role</label>
                            <select name="idrole" class="form-control" required>
                                <option value="">-- Pilih Role --</option>
                                @foreach($roles as $role)
                                    <option value="{{ $role->idrole }}" {{ $currentRole == $role->idrole ? 'selected' : '' }}>
                                        {{ $role->nama_role }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('admin.user.index') }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection