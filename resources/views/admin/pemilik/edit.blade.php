@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Data Pemilik</div>
                <div class="card-body">
                    <form action="{{ route('admin.pemilik.update', $pemilik->idpemilik) }}" method="POST">
                        @csrf @method('PUT')

                        <div class="form-group mb-3">
                            <label>Nama User (Read Only)</label>
                            <input type="text" class="form-control" value="{{ $pemilik->user->nama ?? '-' }}" disabled>
                        </div>

                        <div class="form-group mb-3">
                            <label>Alamat</label>
                            <textarea name="alamat" class="form-control" required>{{ $pemilik->alamat }}</textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label>No WA</label>
                            <input type="text" name="no_wa" class="form-control" value="{{ $pemilik->no_wa }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('admin.pemilik.index') }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection