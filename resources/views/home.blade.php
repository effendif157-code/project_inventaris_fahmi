@extends('layouts.dashboard')

@section('content')
<style>
    /* Custom CSS untuk tampilan lebih Elegan */
    .content-wrapper { background-color: #f5f6fb; }
    
    /* Efek Floating Card */
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

    /* Gradient Welcome Card */
    .bg-welcome {
        background: linear-gradient(135deg, #696cff 0%, #a3a5ff 100%) !important;
        color: #fff !important;
    }

    /* Tipografi & Badge */
    .card-title { color: #32475c; font-weight: 700; }
    .text-primary-white { color: #fff !important; font-weight: 600; }
    .badge-soft-success { background: #e8fadf; color: #71dd37; border-radius: 8px; padding: 5px 10px; }
    
    /* Icon Styling */
    .avatar-initial {
        border-radius: 12px !important;
        padding: 8px;
    }

    /* Progress bar custom */
    .user-progress h6 { font-size: 0.95rem; font-weight: 700; }
</style>

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-8 mb-4">
            <div class="card bg-welcome border-0">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h4 class="card-title text-primary-white mb-3">Selamat Datang Kembali, Admin! ✨</h4>
                            <p class="mb-4" style="opacity: 0.9;">
                                Penjualan Anda meningkat <span class="fw-bold text-white">72%</span> hari ini. Periksa statistik terbaru untuk melihat performa terbaik toko Anda.
                            </p>
                            <a href="javascript:;" class="btn btn-sm btn-white bg-white text-primary fw-bold shadow-sm">Lihat Laporan Lengkap</a>
                        </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img src="../assets/img/illustrations/man-with-laptop-light.png" height="150" alt="Dashboard Illustration" />
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
                                    <i class="bx bx-chart fs-3"></i>
                                </div>
                                <div class="dropdown">
                                    <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                        <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                    </div>
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1 text-muted">Profit</span>
                            <h3 class="card-title mb-2">$12,628</h3>
                            <small class="text-success fw-bold"><i class="bx bx-up-arrow-alt"></i> +72.80%</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <div class="avatar bg-label-info rounded">
                                    <i class="bx bx-wallet fs-3"></i>
                                </div>
                                <div class="dropdown">
                                    <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                        <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                    </div>
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1 text-muted">Sales</span>
                            <h3 class="card-title mb-2">$4,679</h3>
                            <small class="text-success fw-bold"><i class="bx bx-up-arrow-alt"></i> +28.42%</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-8 mb-4">
            <div class="card">
                <div class="row row-bordered g-0">
                    <div class="col-md-8">
                        <h5 class="card-header m-0 me-2 pb-3 fw-bold">Statistik Pendapatan</h5>
                        <div id="totalRevenueChart" class="px-2" style="min-height: 315px;"></div>
                    </div>
                    <div class="col-md-4">
                        <div class="card-body text-center">
                            <div class="dropdown mb-4">
                                <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">Tahun 2026</button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">2025</a>
                                    <a class="dropdown-item" href="#">2024</a>
                                </div>
                            </div>
                            <div id="growthChart"></div>
                            <div class="text-center fw-bold pt-3 mb-4">62% Pertumbuhan Perusahaan</div>
                            
                            <div class="d-grid gap-3">
                                <div class="d-flex align-items-center justify-content-center">
                                    <div class="badge bg-label-primary p-2 me-2"><i class="bx bx-dollar"></i></div>
                                    <div class="text-start">
                                        <small class="text-muted d-block">2026</small>
                                        <h6 class="mb-0">$32.5k</h6>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-center">
                                    <div class="badge bg-label-info p-2 me-2"><i class="bx bx-wallet"></i></div>
                                    <div class="text-start">
                                        <small class="text-muted d-block">2025</small>
                                        <h6 class="mb-0">$41.2k</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-8 col-lg-4 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between pb-3">
                    <h5 class="card-title m-0">Transaksi Terakhir</h5>
                    <div class="dropdown">
                        <button class="btn p-0" type="button" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded text-muted"></i></button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="#">Lihat Semua</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="p-0 m-0">
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-primary"><i class="bx bxl-paypal"></i></span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Paypal</h6>
                                    <small class="text-muted d-block">Pembayaran Masuk</small>
                                </div>
                                <div class="user-progress text-success fw-bold">+$82.60</div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-info"><i class="bx bx-wallet"></i></span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Starbucks</h6>
                                    <small class="text-muted d-block">Hiburan & Makanan</small>
                                </div>
                                <div class="user-progress text-danger fw-bold">-$24.50</div>
                            </div>
                        </li>
                        <li class="d-flex">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-warning"><i class="bx bx-credit-card"></i></span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Mastercard</h6>
                                    <small class="text-muted d-block">Belanja Bulanan</small>
                                </div>
                                <div class="user-progress text-danger fw-bold">-$92.45</div>
                            </div>
                        </li>
                    </ul>
                    <button class="btn btn-outline-primary w-100 mt-4">Lihat Seluruh Aktivitas</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection