@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card border-primary mb-3">
        <div class="card-header bg-primary text-white">Dashboard Dokter</div>
        <div class="card-body">
            <h3>Halo, Dokter {{ session('user_name') }}!</h3>
            <p>Selamat bertugas.</p>
            </div>
    </div>
</div>
@endsection