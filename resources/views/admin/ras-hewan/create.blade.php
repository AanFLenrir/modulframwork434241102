@extends('layouts.admin')

@section('title', 'Tambah Ras Hewan')

@section('content')
<div class="container">
    <h1 class="mb-4">Tambah Ras Hewan</h1>

    <div class="card shadow-sm rounded">
        <div class="card-body">
            <form action="{{ route('admin.ras-hewan.store') }}" method="POST">
                @csrf

                {{-- Pilih Jenis Hewan --}}
                <div class="mb-3">
                    <label for="idjenis_hewan" class="form-label fw-semibold">
                        Jenis Hewan <span class="text-danger">*</span>
                    </label>
                    <select name="idjenis_hewan" id="idjenis_hewan" class="form-select @error('idjenis_hewan') is-invalid @enderror" required>
                        <option value="">-- Pilih Jenis Hewan --</option>
                        @foreach ($jenisHewan as $jenis)
                            <option value="{{ $jenis->idjenis_hewan }}" {{ old('idjenis_hewan') == $jenis->idjenis_hewan ? 'selected' : '' }}>
                                {{ $jenis->nama_jenis_hewan }}
                            </option>
                        @endforeach
                    </select>
                    @error('idjenis_hewan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Nama Ras Hewan --}}
                <div class="mb-3">
                    <label for="nama_ras_hewan" class="form-label fw-semibold">
                        Nama Ras Hewan <span class="text-danger">*</span>
                    </label>
                    <input type="text" id="nama_ras_hewan" name="nama_ras_hewan"
                           class="form-control @error('nama_ras_hewan') is-invalid @enderror"
                           value="{{ old('nama_ras_hewan') }}"
                           placeholder="Masukkan nama ras hewan" required>
                    @error('nama_ras_hewan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Tombol --}}
                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.ras-hewan.index') }}" class="btn btn-secondary">
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