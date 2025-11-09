@extends('layouts.admin')

@section('title', 'Data User')

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar User</h1>

    <a href="{{ route('admin.user.create') }}" class="btn btn-success mb-3">
        <i class="bi bi-plus-circle"></i> Tambah User
    </a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive shadow-sm rounded">
        <table class="table table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $index => $user)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $user->nama }}</td>
                        <td>{{ $user->email }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">Tidak ada data</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection