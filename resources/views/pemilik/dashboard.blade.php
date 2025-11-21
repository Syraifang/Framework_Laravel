@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card border-warning mb-3">
        <div class="card-header bg-warning text-dark">Dashboard Pemilik Hewan</div>
        <div class="card-body">
            <h3>Halo, {{ session('user_name') }}!</h3>

            <div class="mt-4">
                <h5>Daftar Hewan Peliharaan Anda:</h5>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Nama Hewan</th>
                            <th>Ras</th>
                            <th>Warna</th>
                            <th>Gender</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pets as $pet)
                        <tr>
                            <td>{{ $pet->nama }}</td>
                            <td>{{ $pet->rasHewan->nama_ras ?? '-' }}</td>
                            <td>{{ $pet->warna_tanda }}</td>
                            <td>{{ $pet->jenis_kelamin == 'L' ? 'Jantan' : 'Betina' }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">
                                <i>Anda belum mendaftarkan hewan peliharaan.</i>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection