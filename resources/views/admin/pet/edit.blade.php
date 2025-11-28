@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Data Pet</div>
                <div class="card-body">
                    <form action="{{ route('admin.pet.update', $pet->idpet) }}" method="POST">
                        @csrf @method('PUT')

                        <div class="form-group mb-3">
                            <label>Nama Pet</label>
                            <input type="text" name="nama" class="form-control" value="{{ $pet->nama }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label>Pemilik</label>
                            <select name="idpemilik" class="form-control" required>
                                <option value="">-- Pilih Pemilik --</option>
                                @foreach($pemilik as $p)
                                    <option value="{{ $p->idpemilik }}" {{ $pet->idpemilik == $p->idpemilik ? 'selected' : '' }}>
                                        {{ $p->user->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label>Ras Hewan</label>
                            <select name="idras_hewan" class="form-control" required>
                                <option value="">-- Pilih Ras --</option>
                                @foreach($rasHewan as $ras)
                                    <option value="{{ $ras->idras_hewan }}" {{ $pet->idras_hewan == $ras->idras_hewan ? 'selected' : '' }}>
                                        {{ $ras->nama_ras }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-md-6 form-group mb-3">
                                <label>Warna / Tanda</label>
                                <input type="text" name="warna_tanda" class="form-control" value="{{ $pet->warna_tanda }}" required>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label>Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-control" required>
                                    <option value="L" {{ $pet->jenis_kelamin == 'L' ? 'selected' : '' }}>Jantan</option>
                                    <option value="P" {{ $pet->jenis_kelamin == 'P' ? 'selected' : '' }}>Betina</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control" value="{{ $pet->tanggal_lahir }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('admin.pet.index') }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection