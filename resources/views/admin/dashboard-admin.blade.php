@extends('layouts.admin')

@section('content')
<!--begin:App Content Header-->
<div class="app-content-header">
    <!--begin:Container-->
    <div class="container-fluid">
        <!--begin:Row-->
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Dashboard</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
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
        <div class="card p-4 shadow-sm">
            <h1 class="mb-4">Dashboard Administrator</h1>
            
            <div class="alert alert-info">
                <p class="mb-1">Selamat datang, <strong>{{ session('user_name') }}</strong>!</p>
                <p class="mb-0">Anda login sebagai <strong>{{ session('user_role_name') }}</strong>.</p>
            </div>

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

        <!--begin:Row-->
        <div class="row mt-4">
            <!--begin:Col--> 
            <div class="col-lg-3 col-6">
                <!--begin:Small Box Widget 1--> 
                <div class="small-box text-bg-primary">
                    <div class="inner">
                        <h3>150</h3>
                        <p>New Orders</p>
                    </div>
                    <svg 
                        class="small-box-icon"
                        fill="currentColor"
                        viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg"
                        aria-hidden="true">
                        <path d="M2.25 2.25a.75.75 0 000 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 00-2.006 3.63c0 .414.336.75.75.75h15.75a.75.75 0 000-1.5H5.378A2.25 2.25 0 017.5 15h11.218a.75.75 0 00.674-.421 60.358 60.358 0 002.96-7.228.75.75 0 00-.525-.965A60.864 60.864 0 005.68 4.509l-.232-.867A1.875 1.875 0 003.636 2.25H2.25zM3.75 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM16.5 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0z"></path>
                    </svg>
                    <a href="#" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-30-hover">
                        More info <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
                <!--end:Small Box Widget 1-->
            </div>
            <!--end:Col-->
            
            <div class="col-lg-3 col-6">
                <!--begin:Small Box Widget 2-->
                <div class="small-box text-bg-success">
                    <div class="inner">
                        <h3>53<sup class="fs-5">%</sup></h3>
                        <p>Bounce Rate</p>
                    </div>
                    <!-- Tambahkan icon dan konten lainnya untuk widget 2 -->
                </div>
                <!--end:Small Box Widget 2-->
            </div>
        </div>
        <!--end:Row-->
    </div>
    <!--end:Container-->
</div>
<!--end:App Content-->
@endsection