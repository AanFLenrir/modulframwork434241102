@extends('layouts.admin')

@section('title', 'Tambah Kode Tindakan Terapi')

@section('content')
<div class="container">
    <h1 class="mb-4">Tambah Kode Tindakan Terapi</h1>

    <div class="card shadow-sm rounded">
        <div class="card-body">
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form action="{{ route('admin.kode-tindakan-terapi.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="kode" class="form-label fw-semibold">
                        Kode <span class="text-danger">*</span>
                    </label>
                    <input type="text"
                           id="kode"
                           name="kode"
                           class="form-control @error('kode') is-invalid @enderror"
                           value="{{ old('kode') }}"
                           placeholder="Masukkan kode"
                           required>
                    @error('kode')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="deskripsi_tindakan_terapi" class="form-label fw-semibold">
                        Deskripsi Tindakan Terapi <span class="text-danger">*</span>
                    </label>
                    <textarea id="deskripsi_tindakan_terapi"
                              name="deskripsi_tindakan_terapi"
                              class="form-control @error('deskripsi_tindakan_terapi') is-invalid @enderror"
                              placeholder="Masukkan deskripsi tindakan terapi"
                              required>{{ old('deskripsi_tindakan_terapi') }}</textarea>
                    @error('deskripsi_tindakan_terapi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="idkategori" class="form-label fw-semibold">
                        Kategori <span class="text-danger">*</span>
                    </label>
                    <select id="idkategori"
                            name="idkategori"
                            class="form-control @error('idkategori') is-invalid @enderror"
                            required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach ($kategori as $item)
                            <option value="{{ $item->idkategori }}" {{ old('idkategori') == $item->idkategori ? 'selected' : '' }}>
                                {{ $item->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                    @error('idkategori')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="idkategori_klinis" class="form-label fw-semibold">
                        Kategori Klinis <span class="text-danger">*</span>
                    </label>
                    <select id="idkategori_klinis"
                            name="idkategori_klinis"
                            class="form-control @error('idkategori_klinis') is-invalid @enderror"
                            required>
                        <option value="">-- Pilih Kategori Klinis --</option>
                        @foreach ($kategoriKlinis as $item)
                            <option value="{{ $item->idkategori_klinis }}" {{ old('idkategori_klinis') == $item->idkategori_klinis ? 'selected' : '' }}>
                                {{ $item->nama_kategori_klinis }}
                            </option>
                        @endforeach
                    </select>
                    @error('idkategori_klinis')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.kode-tindakan-terapi.index') }}" class="btn btn-secondary">
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