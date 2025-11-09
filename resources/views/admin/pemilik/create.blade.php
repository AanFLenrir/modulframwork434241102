@extends('layouts.admin')

@section('title', 'Tambah Pemilik')

@section('content')
<div class="container">
    <h1 class="mb-4">Tambah Pemilik</h1>

    <div class="card shadow-sm rounded">
        <div class="card-body">
            <form action="{{ route('admin.pemilik.store') }}" method="POST">
                @csrf

                {{-- Pilih User --}}
                <div class="mb-3">
                    <label for="iduser" class="form-label fw-semibold">
                        Pilih User <span class="text-danger">*</span>
                    </label>
                    <select name="iduser" id="iduser" class="form-select @error('iduser') is-invalid @enderror" required>
                        <option value="">-- Pilih User --</option>
                        @foreach ($user as $u)
                            <option value="{{ $u->iduser }}" {{ old('iduser') == $u->iduser ? 'selected' : '' }}>
                                {{ $u->nama }} ({{ $u->email }})
                            </option>
                        @endforeach
                    </select>
                    @error('iduser')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- No. WhatsApp --}}
                <div class="mb-3">
                    <label for="no_wa" class="form-label fw-semibold">
                        No. WhatsApp <span class="text-danger">*</span>
                    </label>
                    <input type="text" id="no_wa" name="no_wa"
                           class="form-control @error('no_wa') is-invalid @enderror"
                           value="{{ old('no_wa') }}" placeholder="Masukkan nomor WhatsApp" required>
                    @error('no_wa')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Alamat --}}
                <div class="mb-3">
                    <label for="alamat" class="form-label fw-semibold">
                        Alamat <span class="text-danger">*</span>
                    </label>
                    <textarea id="alamat" name="alamat" rows="3"
                              class="form-control @error('alamat') is-invalid @enderror"
                              placeholder="Masukkan alamat lengkap" required>{{ old('alamat') }}</textarea>
                    @error('alamat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Tombol --}}
                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.pemilik.index') }}" class="btn btn-secondary">
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