@extends('layouts.admin')

@section('title', 'Tambah Pet')

@section('content')
<div class="container">
    <h1 class="mb-4">Tambah Pet</h1>

    <div class="card shadow-sm rounded">
        <div class="card-body">
            <form action="{{ route('admin.pet.store') }}" method="POST">
                @csrf

                {{-- Nama --}}
                <div class="mb-3">
                    <label for="nama" class="form-label fw-semibold">Nama Pet</label>
                    <input type="text" id="nama" name="nama" class="form-control" 
                           placeholder="Masukkan nama hewan" value="{{ old('nama') }}">
                    @error('nama')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Jenis Kelamin --}}
                <div class="mb-3">
                    <label for="jenis_kelamin" class="form-label fw-semibold">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-select">
                        <option value="">-- Pilih Jenis Kelamin --</option>
                        <option value="Jantan" {{ old('jenis_kelamin') == 'Jantan' ? 'selected' : '' }}>Jantan</option>
                        <option value="Betina" {{ old('jenis_kelamin') == 'Betina' ? 'selected' : '' }}>Betina</option>
                    </select>
                    @error('jenis_kelamin')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Pemilik --}}
                <div class="mb-3">
                    <label for="idpemilik" class="form-label fw-semibold">Pemilik</label>
                    <select name="idpemilik" id="idpemilik" class="form-select">
                        <option value="">-- Pilih Pemilik --</option>
                        @foreach($pemilik as $p)
                            <option value="{{ $p->idpemilik }}" {{ old('idpemilik') == $p->idpemilik ? 'selected' : '' }}>
                                {{ $p->user->nama ?? '-' }}
                            </option>
                        @endforeach
                    </select>
                    @error('idpemilik')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Ras Hewan --}}
                <div class="mb-3">
                    <label for="idras_hewan" class="form-label fw-semibold">Ras Hewan</label>
                    <select name="idras_hewan" id="idras_hewan" class="form-select">
                        <option value="">-- Pilih Ras Hewan --</option>
                        @foreach($rasHewan as $r)
                            <option value="{{ $r->idras_hewan }}" {{ old('idras_hewan') == $r->idras_hewan ? 'selected' : '' }}>
                                {{ $r->nama_ras }}
                            </option>
                        @endforeach
                    </select>
                    @error('idras_hewan')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Tanggal Lahir --}}
                <div class="mb-3">
                    <label for="tanggal_lahir" class="form-label fw-semibold">Tanggal Lahir</label>
                    <input type="date" id="tanggal_lahir" name="tanggal_lahir" 
                           class="form-control" value="{{ old('tanggal_lahir') }}">
                </div>

                {{-- Warna / Tanda --}}
                <div class="mb-3">
                    <label for="warna_tanda" class="form-label fw-semibold">Warna / Tanda</label>
                    <input type="text" id="warna_tanda" name="warna_tanda" 
                           class="form-control" placeholder="Contoh: Coklat belang putih"
                           value="{{ old('warna_tanda') }}">
                </div>

                {{-- Tombol Aksi --}}
                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.pet.index') }}" class="btn btn-secondary">
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