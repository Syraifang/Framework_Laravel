@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Ras Hewan</div>
                <div class="card-body">
                    <form action="{{ route('admin.ras-hewan.store') }}" method="POST">
                        @csrf

                        <div class="form-group mb-3">
                            <label>Jenis Hewan</label>
                            <select name="idjenis_hewan" class="form-control" required>
                                <option value="">-- Pilih Jenis --</option>
                                @foreach($jenisHewan as $jenis)
                                    <option value="{{ $jenis->idjenis_hewan }}">{{ $jenis->nama_jenis_hewan }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label>Nama Ras</label>
                            <input type="text" name="nama_ras" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-success">Simpan</button>
                        <a href="{{ route('admin.ras-hewan.index') }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection