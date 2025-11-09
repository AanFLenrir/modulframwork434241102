@extends('layouts.admin')

@section('title', 'Data Pet')

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar Pet</h1>

    <a href="{{ route('admin.pet.create') }}" class="btn btn-success mb-3">
        <i class="bi bi-plus-circle"></i> Tambah Pet
    </a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive shadow-sm rounded">
        <table class="table table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Nama Pet</th>
                    <th>Jenis Kelamin</th>
                    <th>Pemilik</th>
                    <th>Ras Hewan</th>
                    <th>Tanggal Lahir</th>
                    <th>Warna / Tanda</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pet as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->jenis_kelamin }}</td>
                        <td>{{ $item->pemilik->user->nama ?? '-' }}</td>
                        <td>{{ $item->rasHewan->nama_ras ?? '-' }}</td>
                        <td>{{ $item->tanggal_lahir ?? '-' }}</td>
                        <td>{{ $item->warna_tanda ?? '-' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">Tidak ada data</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection