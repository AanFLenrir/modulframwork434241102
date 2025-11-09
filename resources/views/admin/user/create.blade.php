@extends('layouts.admin')

@section('title', 'Tambah User')

@section('content')
<div class="container">
    <h1 class="mb-4">Tambah User</h1>

    <div class="card shadow-sm rounded">
        <div class="card-body">
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form action="{{ route('admin.user.store') }}" method="POST">
                @csrf

                {{-- Nama --}}
                <div class="mb-3">
                    <label for="nama" class="form-label fw-semibold">Nama <span class="text-danger">*</span></label>
                    <input type="text" id="nama" name="nama" 
                           class="form-control @error('nama') is-invalid @enderror"
                           value="{{ old('nama') }}" placeholder="Masukkan nama lengkap" required>
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Email --}}
                <div class="mb-3">
                    <label for="email" class="form-label fw-semibold">Email <span class="text-danger">*</span></label>
                    <input type="email" id="email" name="email" 
                           class="form-control @error('email') is-invalid @enderror"
                           value="{{ old('email') }}" placeholder="Masukkan alamat email" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="mb-3">
                    <label for="password" class="form-label fw-semibold">Password <span class="text-danger">*</span></label>
                    <input type="password" id="password" name="password" 
                           class="form-control @error('password') is-invalid @enderror"
                           placeholder="Masukkan password" required>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Tombol --}}
                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.user.index') }}" class="btn btn-secondary">
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
