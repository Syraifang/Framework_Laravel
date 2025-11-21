@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-info mb-3">
                <div class="card-header">Dashboard Resepsionis</div>

                <div class="card-body">
                    <h3>Halo, {{ session('user_name') }}!</h3>
                    <p>Anda login sebagai <strong>RESEPSIONIS</strong>.</p>
                    
                    <div class="mt-4">
                        <h5>Menu Resepsionis:</h5>
                        <button class="btn btn-info">Registrasi Pasien</button>
                        <button class="btn btn-info">Pendaftaran Temu Dokter</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection