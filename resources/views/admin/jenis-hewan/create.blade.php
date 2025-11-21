@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Jenis Hewan</div>
                <div class="card-body">
                    <form action="{{ route('admin.jenis-hewan.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label>Nama Jenis Hewan</label>
                            <input type="text" name="nama_jenis_hewan" class="form-control" required placeholder="Contoh: Kucing, Anjing">
                        </div>

                        <button type="submit" class="btn btn-success">Simpan</button>
                        <a href="{{ route('admin.jenis-hewan.index') }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection