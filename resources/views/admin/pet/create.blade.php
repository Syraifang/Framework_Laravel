@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Data Pet</div>
                <div class="card-body">
                    <form action="{{ route('admin.pet.store') }}" method="POST">
                        @csrf

                        <div class="form-group mb-3">
                            <label>Nama Pet</label>
                            <input type="text" name="nama" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label>Pemilik</label>
                            <select name="idpemilik" class="form-control" required>
                                <option value="">-- Pilih Pemilik --</option>
                                @foreach($pemilik as $p)
                                    <option value="{{ $p->idpemilik }}">
                                        {{ $p->user->nama }} (ID: {{ $p->idpemilik }})
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label>Ras Hewan</label>
                            <select name="idras_hewan" class="form-control" required>
                                <option value="">-- Pilih Ras --</option>
                                @foreach($rasHewan as $ras)
                                    <option value="{{ $ras->idras_hewan }}">{{ $ras->nama_ras }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-md-6 form-group mb-3">
                                <label>Warna / Tanda</label>
                                <input type="text" name="warna_tanda" class="form-control" required>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label>Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-control" required>
                                    <option value="L">Jantan</option>
                                    <option value="P">Betina</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-success">Simpan</button>
                        <a href="{{ route('admin.pet.index') }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection