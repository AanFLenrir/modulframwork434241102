@extends('layouts.admin')

@section('title', 'Daftar Pemilik')

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar Pemilik</h1>

    <a href="{{ route('admin.pemilik.create') }}" class="btn btn-success mb-3">
        <i class="bi bi-plus-circle"></i> Tambah Pemilik
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
                            <th>Nama Pemilik</th>
                            <th>No. WhatsApp</th>
                            <th>Alamat</th>
                            <th>Email (User)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pemilik as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->user->nama ?? '-' }}</td>
                                <td>{{ $item->no_wa ?? '-' }}</td>
                                <td>{{ $item->alamat ?? '-' }}</td>
                                <td>{{ $item->user->email ?? '-' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">Belum ada data pemilik</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection