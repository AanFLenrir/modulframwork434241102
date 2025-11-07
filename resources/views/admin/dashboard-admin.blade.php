@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Dashboard Administrator</h1>
    <div class="card p-4">
        <p>Selamat datang, <strong>{{ session('user_name') }}</strong>!</p>
        <p>Anda login sebagai <strong>{{ session('user_role_name') }}</strong>.</p>

        <div class="row mt-4">
            <div class="col-md-6 mb-3">
                <h5>Manajemen Data Master</h5>
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.jenis-hewan.index') }}" class="btn btn-primary">
                        Kelola Jenis Hewan
                    </a>
                    <a href="{{ route('admin.pemilik.index') }}" class="btn btn-success">
                        Kelola Pemilik
                    </a>
                    <a href="/admin/ras-hewan" class="btn btn-info text-white">
                        Kelola Ras Hewan
                    </a>
                    <a href="/admin/kategori" class="btn btn-warning text-white">
                        Kelola Kategori
                    </a>
                    <a href="/admin/kategori-klinis" class="btn btn-secondary">
                        Kelola Kategori Klinis
                    </a>
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <h5>Manajemen Sistem</h5>
                <div class="d-grid gap-2">
                    <a href="/admin/kode-tindakan-terapi" class="btn btn-dark">
                        Kode Tindakan & Terapi
                    </a>
                    <a href="/admin/pet" class="btn btn-outline-primary">
                        Kelola Pet
                    </a>
                    <a href="/admin/role" class="btn btn-outline-success">
                        Kelola Role
                    </a>
                    <a href="/admin/user" class="btn btn-outline-info">
                        Kelola User
                    </a>
                    <a href="/admin/role-user" class="btn btn-outline-warning">
                        Kelola Role User
                    </a>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12">
                <h5>Quick Actions</h5>
                <div class="d-flex flex-wrap gap-2">
                    <a href="/admin/dashboard" class="btn btn-light border">
                        <i class="fas fa-tachometer-alt"></i> Dashboard
                    </a>
                    <a href="/home" class="btn btn-light border">
                        <i class="fas fa-home"></i> Home
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection