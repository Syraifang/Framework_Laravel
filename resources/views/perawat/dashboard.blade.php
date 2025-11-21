@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card border-success mb-3">
        <div class="card-header bg-success text-white">Dashboard Perawat</div>
        <div class="card-body">
            <h3>Halo, Perawat {{ session('user_name') }}!</h3>
            <p>Selamat bekerja.</p>
            </div>
    </div>
</div>
@endsection