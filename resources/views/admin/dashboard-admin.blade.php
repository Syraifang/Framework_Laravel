@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard Administrator</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>Selamat Datang, <strong>{{ session('user_name') }}</strong>! Anda login sebagai <strong>ADMINISTRATOR</strong>.</p>

                    <hr>

                    <h5>Data Master Hewan</h5>
                    <div class="mb-3">
                        <a href="{{ route('admin.jenis-hewan.index') }}" class="btn btn-primary">Manajemen Jenis Hewan</a>
                        <a href="{{ route('admin.ras-hewan.index') }}" class="btn btn-primary">Manajemen Ras Hewan</a>
                        <a href="{{ route('admin.pet.index') }}" class="btn btn-primary">Manajemen Pet</a>
                    </div>

                    <h5>Data Master Medis</h5>
                    <div class="mb-3">
                        <a href="{{ route('admin.kategori.index') }}" class="btn btn-success">Manajemen Kategori</a>
                        <a href="{{ route('admin.kategori-klinis.index') }}" class="btn btn-success">Kategori Klinis</a>
                        <a href="{{ route('admin.kode-tindakan-terapi.index') }}" class="btn btn-success">Kode Tindakan Terapi</a>
                    </div>

                    <h5>Manajemen Pengguna</h5>
                    <div class="mb-3">
                        <a href="{{ route('admin.user.index') }}" class="btn btn-dark">Manajemen User</a>
                        <a href="{{ route('admin.role.index') }}" class="btn btn-dark">Manajemen Role</a>
                        <a href="{{ route('admin.pemilik.index') }}" class="btn btn-dark">Data Profil Pemilik</a>
                    </div>

                    <hr>

                    <h5>Transaksi Rumah Sakit</h5>
                    <div class="mb-3">
                        <a href="#" class="btn btn-warning">Pendaftaran (Temu Dokter)</a>
                        <a href="#" class="btn btn-warning">Rekam Medis</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection