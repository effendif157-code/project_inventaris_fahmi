@extends('layouts.dashboard')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Transaksi /</span> Detail Peminjaman
    </h4>

    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center border-bottom">
                    <h5 class="mb-0">Informasi Kode: <strong class="text-primary">{{ $peminjaman->kode_peminjaman }}</strong></h5>
                    @php
                        $statusColor = [
                            'dipinjam' => 'bg-label-warning',
                            'dikembalikan' => 'bg-label-success',
                            'terlambat' => 'bg-label-danger'
                        ];
                    @endphp
                    <span class="badge {{ $statusColor[$peminjaman->status] ?? 'bg-label-secondary' }}">
                        {{ strtoupper($peminjaman->status) }}
                    </span>
                </div>
                <div class="card-body mt-3">
                    <div class="row mb-3">
                        <div class="col-sm-4 fw-bold">Nama Peminjam</div>
                        <div class="col-sm-8">: {{ $peminjaman->nama_peminjam }} ({{ ucfirst($peminjaman->jenis_peminjam) }})</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-4 fw-bold">Tanggal Pinjam</div>
                        <div class="col-sm-8">: {{ \Carbon\Carbon::parse($peminjaman->tanggal_pinjam)->format('d F Y') }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-4 fw-bold">Estimasi Kembali</div>
                        <div class="col-sm-8">: {{ \Carbon\Carbon::parse($peminjaman->tanggal_kembali)->format('d F Y') }}</div>
                    </div>
                    
                    <hr class="my-4">
                    
                    <h6 class="fw-bold mb-3"><i class="bx bx-package me-2"></i>Daftar Barang yang Dipinjam</h6>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="table-light">
                                <tr>
                                    <th>Barang</th>
                                    <th class="text-center">Jumlah</th>
                                    <th>Kondisi Awal</th>
                                    <th>Kondisi Kembali</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($peminjaman->details as $item)
                                <tr>
                                    <td>{{ $item->barang->nama_barang }}</td>
                                    <td class="text-center">{{ $item->jumlah }}</td>
                                    <td><span class="badge bg-label-info">{{ $item->kondisi_sebelum }}</span></td>
                                    <td>
                                        @if($item->kondisi_sesudah)
                                            <span class="badge bg-label-primary">{{ $item->kondisi_sesudah }}</span>
                                        @else
                                            <span class="text-muted small italic">Belum Diinput</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="mt-4">
                        <a href="{{ route('peminjaman.index') }}" class="btn btn-outline-secondary">
                            <i class="bx bx-arrow-back me-1"></i> Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div> <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header border-bottom">
                    <h5 class="mb-0">Informasi Petugas</h5>
                </div>
                <div class="card-body mt-3">
                    <div class="d-flex align-items-center mb-3">
                        <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded bg-label-primary"><i class="bx bx-user"></i></span>
                        </div>
                        <div>
                            <small class="text-muted d-block">Admin/Petugas</small>
                            <span class="fw-bold">{{ $peminjaman->user->name ?? 'Sistem' }}</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded bg-label-secondary"><i class="bx bx-calendar"></i></span>
                        </div>
                        <div>
                            <small class="text-muted d-block">Waktu Input</small>
                            <span>{{ $peminjaman->created_at->format('d/m/Y H:i') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div> </div> </div> @endsection