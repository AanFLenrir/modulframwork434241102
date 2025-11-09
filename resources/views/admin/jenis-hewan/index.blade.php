@extends('layouts.admin')

@section('title', 'Daftar Jenis Hewan')

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar Jenis Hewan</h1>

    <a href="{{ route('admin.jenis-hewan.create') }}" class="btn btn-success mb-3">
        <i class="bi bi-plus-circle"></i> Tambah Jenis Hewan
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
                            <th>Nama Jenis Hewan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($jenisHewan as $index => $hewan)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $hewan->nama_jenis_hewan }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="text-center text-muted">Belum ada data jenis hewan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection