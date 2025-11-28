@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Kategori Klinis</div>
                <div class="card-body">
                    <form action="{{ route('admin.kategori-klinis.store') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label>Nama Kategori Klinis</label>
                            <input type="text" name="nama_kategori_klinis" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <a href="{{ route('admin.kategori-klinis.index') }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection