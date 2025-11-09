@extends('layouts.admin')

@section('title', 'Tambah Kategori')

@section('content')
<div class="container">
    <h1 class="mb-4">Tambah Kategori</h1>

    <div class="card shadow-sm rounded">
        <div class="card-body">
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form action="{{ route('admin.kategori.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="nama_kategori" class="form-label fw-semibold">
                        Nama Kategori <span class="text-danger">*</span>
                    </label>
                    <input type="text"
                           id="nama_kategori"
                           name="nama_kategori"
                           class="form-control @error('nama_kategori') is-invalid @enderror"
                           value="{{ old('nama_kategori') }}"
                           placeholder="Masukkan nama kategori"
                           required>
                    @error('nama_kategori')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.kategori.index') }}" class="btn btn-secondary">
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