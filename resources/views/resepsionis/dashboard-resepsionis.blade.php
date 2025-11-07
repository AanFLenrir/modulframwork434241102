@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Dashboard Resepsionis</h1>
    <div class="card p-4">
        <p>Selamat datang, <strong>{{ session('user_name') }}</strong>!</p>
        <p>Anda login sebagai <strong>{{ session('user_role_name') }}</strong>.</p>

        <a href="{{ route('resepsionis.transaksi.index') }}" class="btn btn-info mt-3">
            Lihat Transaksi
        </a>
    </div>
</div>
@endsection