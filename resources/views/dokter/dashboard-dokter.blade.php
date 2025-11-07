@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Dashboard Dokter</h1>
    <p>Selamat datang, {{ session('user_name') }} ({{ session('user_role_name') }})</p>

    <div class="card mt-4">
        <div class="card-header"><strong>Data Temu Dokter & Rekam Medis</strong></div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No Urut</th>
                        <th>Nama Hewan</th>
                        <th>Diagnosa</th>
                        <th>Dokter Pemeriksa</th>
                        <th>Status</th>
                        <th>Waktu Daftar</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($temuDokter as $item)
                        <tr>
                            <td>{{ $item->no_urut }}</td>
                            <td>{{ $item->pet->nama ?? '-' }}</td>
                            <td>{{ $item->rekamMedis->diagnosa ?? '-' }}</td>
                            <td>{{ $item->rekamMedis->dokter_pemeriksa ?? '-' }}</td>
                            <td>{{ $item->status }}</td>
                            <td>{{ $item->waktu_daftar }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Belum ada data temu dokter</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection