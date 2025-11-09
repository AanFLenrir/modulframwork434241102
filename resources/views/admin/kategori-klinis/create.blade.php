@extends('layouts.admin')

@section('title', 'Tambah Kategori Klinis')

@section('content')
<div class="container">
    <h1 class="mb-4">Tambah Kategori Klinis</h1>

    <div class="card shadow-sm rounded">
        <div class="card-body">
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form action="{{ route('admin.kategori-klinis.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="nama_kategori_klinis" class="form-label fw-semibold">
                        Nama Kategori Klinis <span class="text-danger">*</span>
                    </label>
                    <input type="text"
                           id="nama_kategori_klinis"
                           name="nama_kategori_klinis"
                           class="form-control @error('nama_kategori_klinis') is-invalid @enderror"
                           value="{{ old('nama_kategori_klinis') }}"
                           placeholder="Masukkan nama kategori klinis"
                           required>
                    @error('nama_kategori_klinis')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.kategori-klinis.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left-circle"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-save"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection