@extends('layouts.admin')

@section('title', 'Daftar Jenis Hewan')

@section('content')
<!--begin:App Content Header-->
<div class="app-content-header">
    <!--begin:Container-->
    <div class="container-fluid">
        <!--begin:Row-->
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Jenis Hewan</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Master Data</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Jenis Hewan</li>
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
                        <h3 class="card-title">Tabel Data Jenis Hewan</h3>
                        <a href="{{ route('admin.jenis-hewan.create') }}" class="btn btn-success btn-sm float-end">
                            <i class="bi bi-plus-circle"></i> Tambah Jenis Hewan
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
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 50px">No</th>
                                        <th>Nama Jenis Hewan</th>
                                        <th style="width: 150px">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($jenisHewan as $index => $hewan)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $hewan->nama_jenis_hewan }}</td>
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
                                            <td colspan="3" class="text-center text-muted">Belum ada data jenis hewan</td>
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