@extends('layouts.admin')

@section('title', 'Data Kode Tindakan Terapi')

@section('content')
<div class="container">
    <h1 class="mb-4">Data Kode Tindakan Terapi</h1>

    <a href="{{ route('admin.kode-tindakan-terapi.create') }}" class="btn btn-success mb-3">
        <i class="bi bi-plus-circle"></i> Tambah Kode Tindakan Terapi
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
                            <th>Kode</th>
                            <th>Deskripsi</th>
                            <th>Kategori</th>
                            <th>Kategori Klinis</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($tindakanTerapi as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->kode }}</td>
                                <td>{{ $item->deskripsi_tindakan_terapi }}</td>
                                <td>{{ $item->kategori->nama_kategori ?? '-' }}</td>
                                <td>{{ $item->kategoriKlinis->nama_kategori_klinis ?? '-' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">Belum ada data kode tindakan terapi</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection