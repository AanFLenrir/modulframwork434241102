@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <!-- Header Dashboard -->
                <div class="card-header bg-primary text-white fw-bold d-flex justify-content-between align-items-center">
                    <span>{{ __('Dashboard') }} - {{ session('user_name') }}</span>
                    <div class="btn-group">
                        <!-- Tombol Login (jika belum login) -->
                        @guest
                            <a href="{{ route('login') }}" class="btn btn-light btn-sm">
                                <i class="fas fa-sign-in-alt"></i> Masuk
                            </a>
                        @endguest

                        <!-- Tombol Logout (jika sudah login) -->
                        @auth
                            <a href="{{ route('logout') }}" 
                               class="btn btn-danger btn-sm"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i> Keluar
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        @endauth
                    </div>
                </div>

                <!-- Isi Dashboard -->
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success text-center" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- Pesan Selamat Datang -->
                    @auth
                        <div class="alert alert-info text-center">
                            <h5 class="mb-2">Selamat Datang!</h5>
                            <p class="mb-1">Anda berhasil masuk sebagai:</p>
                            <strong class="text-primary">{{ session('user_role_name') }}</strong>
                        </div>
                    @else
                        <div class="alert alert-warning text-center">
                            <h5 class="mb-3">Silakan Masuk</h5>
                            <p class="mb-3">Anda perlu masuk untuk mengakses dashboard.</p>
                            <a href="{{ route('login') }}" class="btn btn-primary">
                                <i class="fas fa-sign-in-alt"></i> Masuk Sekarang
                            </a>
                        </div>
                    @endauth

                    <p class="text-center mb-4">
                        @auth
                            {{ __('You are logged in as: ') }}
                            <strong>{{ session('user_role_name') }}</strong>
                        @else
                            {{ __('You are not logged in.') }}
                        @endauth
                    </p>

                    <!-- Menu khusus untuk Administrator -->
                    @if (session('user_role_name') == 'Administrator')
                        <hr>
                        <h6 class="text-center mb-3">Menu Administrator</h6>
                        <div class="d-grid gap-3">
                            <a href="{{ route('admin.jenis-hewan.index') }}" class="btn btn-outline-primary">
                                <i class="fas fa-paw"></i> Kelola Jenis Hewan
                            </a>
                            <a href="{{ route('admin.pemilik.index') }}" class="btn btn-outline-success">
                                <i class="fas fa-users"></i> Kelola Pemilik
                            </a>
                        </div>
                    @endif

                    <!-- Menu untuk role lainnya bisa ditambahkan di sini -->
                    @if (session('user_role_name') == 'Dokter')
                        <hr>
                        <h6 class="text-center mb-3">Menu Dokter</h6>
                        <div class="d-grid gap-3">
                            <a href="{{ route('dokter.dashboard') }}" class="btn btn-outline-info">
                                <i class="fas fa-stethoscope"></i> Dashboard Dokter
                            </a>
                        </div>
                    @endif

                    @if (session('user_role_name') == 'Resepsionis')
                        <hr>
                        <h6 class="text-center mb-3">Menu Resepsionis</h6>
                        <div class="d-grid gap-3">
                            <a href="{{ route('resepsionis.dashboard') }}" class="btn btn-outline-warning">
                                <i class="fas fa-desktop"></i> Dashboard Resepsionis
                            </a>
                        </div>
                    @endif
                </div>

                <!-- Footer dengan informasi login -->
                <div class="card-footer text-muted text-center">
                    @auth
                        <small>
                            <i class="fas fa-user-circle"></i> 
                            {{ session('user_name') }} | 
                            <i class="fas fa-clock"></i> 
                            {{ date('H:i:s') }}
                        </small>
                    @else
                        <small>Silakan login untuk mengakses sistem</small>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection