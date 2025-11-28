@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Kategori</div>
                <div class="card-body">
                    <form action="{{ route('admin.kategori.update', $kategori->idkategori) }}" method="POST">
                        @csrf @method('PUT')
                        <div class="form-group mb-3">
                            <label>Nama Kategori</label>
                            <input type="text" name="nama_kategori" class="form-control" value="{{ $kategori->nama_kategori }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('admin.kategori.index') }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection