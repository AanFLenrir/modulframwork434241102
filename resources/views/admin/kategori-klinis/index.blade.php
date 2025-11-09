@extends('layouts.admin')

@section('title', 'Daftar Kategori Klinis')

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar Kategori Klinis</h1>

    <a href="{{ route('admin.kategori-klinis.create') }}" class="btn btn-success mb-3">
        <i class="bi bi-plus-circle"></i> Tambah Kategori Klinis
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
                            <th>Nama Kategori Klinis</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($kategoriKlinis as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->nama_kategori_klinis }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="text-center text-muted">Belum ada data kategori klinis</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection