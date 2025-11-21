@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-white bg-secondary mb-3">
                <div class="card-header">Dashboard Administrator</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3>Selamat Datang, {{ session('user_name') }}!</h3>
                    <p>Anda login sebagai <strong>ADMINISTRATOR</strong>.</p>

                   <div class="mt-4">
                        <h5>Menu Admin:</h5>
                        <a href="{{ route('admin.jenis-hewan.index') }}" class="btn btn-primary mb-2 btn-block">Manajemen Jenis Hewan</a>
                        <a href="{{ route('admin.ras-hewan.index') }}" class="btn btn-primary mb-2 btn-block">Manajemen Ras Hewan</a>
                        <a href="{{ route('admin.pet.index') }}" class="btn btn-primary mb-2 btn-block">Manajemen Pet</a>
                        <a href="{{ route('admin.kategori.index') }}" class="btn btn-primary mb-2 btn-block">Manajemen Kategori</a>
                        <a href="{{ route('admin.kategori-klinis.index') }}" class="btn btn-primary mb-2 btn-block">Manajemen Kategori Klinis</a>
                        <a href="{{ route('admin.kode-tindakan-terapi.index') }}" class="btn btn-primary mb-2 btn-block">Kode Tindakan Terapi</a>
                        <a href="{{ route('admin.user.index') }}" class="btn btn-primary mb-2 btn-block">Manajemen User</a>
                        <a href="{{ route('admin.role.index') }}" class="btn btn-primary mb-2 btn-block">Manajemen Role</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection