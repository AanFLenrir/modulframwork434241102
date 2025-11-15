@extends('layouts.admin')

@section('title', 'Daftar Pemilik')

@section('content')
<!--begin:App Content Header-->
<div class="app-content-header">
    <!--begin:Container-->
    <div class="container-fluid">
        <!--begin:Row-->
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Pemilik</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Master Data</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Pemilik</li>
                </ol>
            </div>
        </div>
        <!--end:Row-->
    </div>
    <!--end:Container-->
</div>
<!--end:App Content Header-->

<!--begin:App Content-->
<div class="app-content">
    <!--begin:Container-->
    <div class="container-fluid">
        <!--begin:Row-->
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h3 class="card-title">Tabel Data Pemilik</h3>
                        <a href="{{ route('admin.pemilik.create') }}" class="btn btn-success btn-sm float-end">
                            <i class="bi bi-plus-circle"></i> Tambah Pemilik
                        </a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @elseif (session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-bordered align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th style="width: 50px">No</th>
                                        <th>Nama Pemilik</th>
                                        <th>No. WhatsApp</th>
                                        <th>Alamat</th>
                                        <th>Email (User)</th>
                                        <th style="width: 150px">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($pemilik as $index => $item)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $item->user->nama ?? '-' }}</td>
                                            <td>{{ $item->no_wa ?? '-' }}</td>
                                            <td>{{ $item->alamat ?? '-' }}</td>
                                            <td>{{ $item->user->email ?? '-' }}</td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-primary">Edit</a>
                                                <form action="#" method="POST" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center text-muted">Belum ada data pemilik</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <ul class="pagination pagination-sm m-0 float-end">
                            <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--end:Row-->
    </div>
    <!--end:Container-->
</div>
<!--end:App Content-->
@endsection