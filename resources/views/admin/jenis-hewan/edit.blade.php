@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Jenis Hewan</div>
                <div class="card-body">
                    <form action="{{ route('admin.jenis-hewan.update', $jenisHewan->idjenis_hewan) }}" method="POST">
                        @csrf
                        @method('PUT') <div class="mb-3">
                            <label>Nama Jenis Hewan</label>
                            <input type="text" name="nama_jenis_hewan" class="form-control" value="{{ $jenisHewan->nama_jenis_hewan }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('admin.jenis-hewan.index') }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection