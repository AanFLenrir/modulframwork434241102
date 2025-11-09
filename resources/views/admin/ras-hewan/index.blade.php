@extends('layouts.admin')

@section('title', 'Daftar Ras Hewan')

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar Ras Hewan</h1>

    <a href="{{ route('admin.ras-hewan.create') }}" class="btn btn-success mb-3">
        <i class="bi bi-plus-circle"></i> Tambah Ras Hewan
    </a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card shadow-sm rounded">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama Ras Hewan</th>
                            <th>Jenis Hewan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($rasHewan as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->nama_ras }}</td>
                                <td>{{ $item->jenisHewan->nama_jenis_hewan ?? '-' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center text-muted">Belum ada data ras hewan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection