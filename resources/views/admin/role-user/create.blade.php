@extends('layouts.admin')

@section('title', 'Tambah Role User')

@section('content')
<div class="container">
    <h1 class="mb-4">Tambah Role User</h1>

    <div class="card shadow-sm rounded">
        <div class="card-body">
            <form action="{{ route('admin.role-user.store') }}" method="POST">
                @csrf

                {{-- Pilih User --}}
                <div class="mb-3">
                    <label for="iduser" class="form-label fw-semibold">User <span class="text-danger">*</span></label>
                    <select name="iduser" id="iduser" class="form-select @error('iduser') is-invalid @enderror" required>
                        <option value="">-- Pilih User --</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->iduser }}">{{ $user->nama }} ({{ $user->email }})</option>
                        @endforeach
                    </select>
                    @error('iduser')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Pilih Role --}}
                <div class="mb-3">
                    <label for="idrole" class="form-label fw-semibold">Role <span class="text-danger">*</span></label>
                    <select name="idrole" id="idrole" class="form-select @error('idrole') is-invalid @enderror" required>
                        <option value="">-- Pilih Role --</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->idrole }}">{{ $role->nama_role }}</option>
                        @endforeach
                    </select>
                    @error('idrole')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Status --}}
                <div class="mb-3">
                    <label for="status" class="form-label fw-semibold">Status <span class="text-danger">*</span></label>
                    <select name="status" id="status" class="form-select @error('status') is-invalid @enderror" required>
                        <option value="">-- Pilih Status --</option>
                        <option value="1">Aktif</option>
                        <option value="0">Nonaktif</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Tombol --}}
                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.role-user.index') }}" class="btn btn-secondary">
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