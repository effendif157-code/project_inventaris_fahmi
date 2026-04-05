@extends('layouts.dashboard')

@section('content')
<style>
    /* CSS tetap dipertahankan agar tampilan tetap Elegan sesuai keinginan Anda */
    .content-wrapper { background-color: #f5f6fb; }
    .card {
        border: none !important;
        border-radius: 16px !important;
        box-shadow: 0 4px 20px 0 rgba(0,0,0,0.05) !important;
        transition: all 0.3s ease;
    }
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px 0 rgba(0,0,0,0.1) !important;
    }
    .bg-welcome {
        background: linear-gradient(135deg, #696cff 0%, #a3a5ff 100%) !important;
        color: #fff !important;
    }
    .card-title { color: #32475c; font-weight: 700; }
    .text-primary-white { color: #fff !important; font-weight: 600; }
    .avatar-initial { border-radius: 12px !important; padding: 8px; }
</style>

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-8 mb-4">
            <div class="card bg-welcome border-0">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h4 class="card-title text-primary-white mb-3">Manajemen Inventaris ✨</h4>
                            <p class="mb-4" style="opacity: 0.9;">
                                Ada <span class="fw-bold text-white">{{ $stokMenipisCount ?? 0 }} barang</span> yang mencapai batas minimum stok. Segera lakukan pengadaan.
                            </p>
                            <a href="{{ route('barang.index') }}" class="btn btn-sm btn-white bg-white text-primary fw-bold shadow-sm">Cek Daftar Barang</a>
                        </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img src="{{ asset('assets/img/illustrations/man-with-laptop-light.png') }}" height="150" alt="Dashboard Illustration" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-4">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <div class="avatar bg-label-success rounded">
                                    <i class="bx bx-package fs-3"></i>
                                </div>
                                <div class="dropdown">
                                    <button class="btn p-0" type="button" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="{{ route('barang.index') }}">Lihat Semua</a>
                                    </div>
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1 text-muted">Total Barang</span>
                            <h3 class="card-title mb-2">{{ $totalBarang ?? 0 }}</h3>
                            <small class="text-success fw-bold">Item Terdata</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <div class="avatar bg-label-danger rounded">
                                    <i class="bx bx-error fs-3"></i>
                                </div>
                                <div class="dropdown">
                                    <button class="btn p-0" type="button" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Cek Detail</a>
                                    </div>
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1 text-muted">Stok Habis</span>
                            <h3 class="card-title mb-2">{{ $stokKosong ?? 0 }}</h3>
                            <small class="text-danger fw-bold"><i class="bx bx-down-arrow-alt"></i> Butuh Restock</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
@endsection