@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Dashboard Pemilik</h1>
    <p>Selamat datang, {{ session('user_name') }} ({{ session('user_role_name') }})</p>

    <div class="card mt-4">
        <div class="card-header"><strong>Daftar Hewan Peliharaan Anda</strong></div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Hewan</th>
                        <th>Jenis Hewan</th>
                        <th>Ras Hewan</th>
                        <th>Umur</th>
                        <th>Jenis Kelamin</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pets as $pet)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pet->nama }}</td>
                            <td>{{ $pet->jenisHewan->nama_jenis_hewan ?? '-' }}</td>
                            <td>{{ $pet->rasHewan->nama_ras ?? '-' }}</td>
                            <td>{{ $pet->umur ?? '-' }}</td>
                            <td>{{ $pet->jenis_kelamin ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Belum ada hewan terdaftar</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection