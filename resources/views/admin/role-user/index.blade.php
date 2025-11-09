@extends('layouts.admin')

@section('title', 'Manajemen Role User')

@section('content')
<div class="container">
    <h1 class="mb-4">Manajemen Role</h1>

    <a href="{{ route('admin.role-user.create') }}" class="btn btn-success mb-3">
        <i class="bi bi-plus-circle"></i> Tambah Role User
    </a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card shadow-sm rounded">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama User</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($roleUsers as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->user->nama ?? '-' }}</td>
                                <td>{{ $item->user->email ?? '-' }}</td>
                                <td>{{ $item->role->nama_role ?? '-' }}</td>
                                <td>
                                    @if ($item->status == 1)
                                        <span class="badge bg-success">Aktif</span>
                                    @else
                                        <span class="badge bg-secondary">Nonaktif</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <form action="{{ route('admin.role-user.destroy', $item->idrole_user) }}" 
                                          method="POST" 
                                          onsubmit="return confirm('Yakin ingin menghapus role user ini?')"
                                          style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">
                                            <i class="bi bi-trash3"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">Tidak ada data</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection