@extends('layouts.admin')

@section('title', 'Daftar Kategori')

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar Kategori</h1>

    <a href="{{ route('admin.kategori.create') }}" class="btn btn-success mb-3">
        <i class="bi bi-plus-circle"></i> Tambah Kategori
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
                            <th>Nama Kategori</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($kategori as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->nama_kategori }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="text-center text-muted">Belum ada data kategori</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection