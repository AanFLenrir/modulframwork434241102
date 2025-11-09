@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mb-4">Dashboard Administrator</h1>

    <div class="card p-4 shadow-sm">
        <p>Selamat datang, <strong>{{ session('user_name') }}</strong>!</p>
        <p>Anda login sebagai <strong>{{ session('user_role_name') }}</strong>.</p>

        <hr>

        <h4 class="mt-3 mb-3">📁 Menu Data Master</h4>
        <div class="d-flex flex-wrap gap-2">
            <a href="{{ route('admin.user.index') }}" class="btn btn-outline-primary">
                Data User
            </a>
            <a href="{{ route('admin.role-user.index') }}" class="btn btn-outline-secondary">
                Manajemen Role
            </a>
            <a href="{{ route('admin.jenis-hewan.index') }}" class="btn btn-outline-success">
                Jenis Hewan
            </a>
            <a href="{{ route('admin.ras-hewan.index') }}" class="btn btn-outline-info">
                Ras Hewan
            </a>
            <a href="{{ route('admin.pemilik.index') }}" class="btn btn-outline-warning">
                Data Pemilik
            </a>
            <a href="{{ route('admin.pet.index') }}" class="btn btn-outline-danger">
                Data Pet
            </a>
            <a href="{{ route('admin.kategori.index') }}" class="btn btn-outline-dark">
                Data Kategori
            </a>
            <a href="{{ route('admin.kategori-klinis.index') }}" class="btn btn-outline-primary">
                Data Kategori Klinis
            </a>
            <a href="{{ route('admin.kode-tindakan-terapi.index') }}" class="btn btn-outline-success">
                Data Kode Tindakan Terapi
            </a>
        </div>
    </div>
</div>
@endsection