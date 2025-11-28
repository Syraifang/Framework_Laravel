@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Lengkapi Data Pemilik</div>
                <div class="card-body">
                    <form action="{{ route('admin.pemilik.store') }}" method="POST">
                        @csrf

                        <div class="form-group mb-3">
                            <label>Pilih User (Role Pemilik)</label>
                            <select name="iduser" class="form-control" required>
                                <option value="">-- Pilih User --</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->iduser }}">{{ $user->nama }} ({{ $user->email }})</option>
                                @endforeach
                            </select>
                            <small class="text-muted">Hanya menampilkan user 'Pemilik' yang belum punya data alamat.</small>
                        </div>

                        <div class="form-group mb-3">
                            <label>Alamat</label>
                            <textarea name="alamat" class="form-control" required></textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label>No WA</label>
                            <input type="text" name="no_wa" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-success">Simpan</button>
                        <a href="{{ route('admin.pemilik.index') }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection