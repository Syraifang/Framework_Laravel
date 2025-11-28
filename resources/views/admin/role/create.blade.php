@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Role</div>
                <div class="card-body">
                    <form action="{{ route('admin.role.store') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label>Nama Role</label>
                            <input type="text" name="nama_role" class="form-control @error('nama_role') is-invalid @enderror" required>
                            @error('nama_role')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <a href="{{ route('admin.role.index') }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection