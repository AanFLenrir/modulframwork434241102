@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Dashboard Perawat</h1>
    <p>Selamat datang, {{ session('user_name') }} ({{ session('user_role_name') }})</p>

    <div class="card mt-4">
        <div class="card-header"><strong>Data Rekam Medis</strong></div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Hewan</th>
                        <th>Dokter Pemeriksa</th>
                        <th>Diagnosa</th>
                        <th>Temuan Klinis</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($rekammedis as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->temuDokter->pet->nama ?? '-' }}</td>
                            <td>{{ $item->dokter_pemeriksa }}</td>
                            <td>{{ $item->diagnosa }}</td>
                            <td>{{ $item->temuan_klinis }}</td>
                            <td>{{ $item->created_at }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Belum ada data rekam medis</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection