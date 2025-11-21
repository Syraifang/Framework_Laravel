@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }} - {{ session('user_name') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('HALLO!') }} Anda login sebagai {{ session('user_role_name') }}

                    <div class="mt-4">
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <a href="{{ route('admin.jenis-hewan.index') }}" class="btn btn-primary btn-block">
                                    Manajemen Jenis Hewan
                                </a>
                            </div>
                            <div class="col-md-12 mb-2">
                                <a href="{{ route('admin.ras-hewan.index') }}" class="btn btn-success btn-block">
                                    Manajemen Ras Hewan
                                </a>
                            </div>
                             <div class="col-md-12 mb-2">
                                <a href="{{ route('admin.pet.index') }}" class="btn btn-warning btn-block">
                                    Manajemen Pet
                                </a>
                            </div>
                            <div class="col-md-12 mb-2">
                                <a href="{{ route('admin.kategori.index') }}" class="btn btn-secondary btn-block">
                                    Manajemen Kategori
                                </a>
                            </div>
                            <div class="col-md-12 mb-2">
                                <a href="{{ route('admin.kategori-klinis.index') }}" class="btn btn-info btn-block">
                                    Manajemen Kategori Klinis
                                </a>
                            </div>
                             <div class="col-md-12 mb-2">
                                <a href="{{ route('admin.kode-tindakan-terapi.index') }}" class="btn btn-light btn-block">
                                    Kode Tindakan Terapi
                                </a>
                            </div>
                            <div class="col-md-12 mb-2">
                                <a href="{{ route('admin.user.index') }}" class="btn btn-danger btn-block">
                                    Manajemen User
                                </a>
                            </div>
                            <div class="col-md-12 mb-2">
                                <a href="{{ route('admin.role.index') }}" class="btn btn-dark btn-block">
                                    Manajemen Role
                                </a>
                            </div>
                            </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection