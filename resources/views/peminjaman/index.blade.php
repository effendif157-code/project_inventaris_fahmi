@extends('layouts.dashboard')
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Sistem /</span> Daftar Peminjaman
    </h4>
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Data Transaksi Peminjaman</h5>
        <a href="{{ route('peminjaman.create') }}" class="btn btn-primary">
            <i class="bx bx-plus me-1"></i> Tambah Peminjaman
        </a>
    </div>
    <div class="table-responsive text-nowrap">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama Peminjam</th>
                    <th>Barang & Jumlah</th>
                    <th>Tgl Pinjam / Kembali</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach($peminjamans as $p)
                <tr>
                    <td><span class="fw-bold text-primary">{{ $p->kode_peminjaman }}</span></td>
                    <td>
                        <div class="d-flex flex-column">
                            <span class="fw-semibold">{{ $p->nama_peminjam }}</span>
                            <small class="text-muted">{{ ucfirst($p->jenis_peminjam) }}</small>
                        </div>
                    </td>
                    <td>
                        @foreach($p->details as $detail)
                            <div class="d-flex align-items-center">
                                <span class="badge badge-dot bg-info me-2"></span>
                                {{ $detail->barang->nama_barang }} 
                                <span class="text-muted ms-1">({{ $detail->jumlah }} unit)</span>
                            </div>
                        @endforeach
                    </td>
                    <td>
                        <div class="small">
                            <i class="bx bx-calendar-event text-success"></i> {{ $p->tanggal_pinjam }} <br>
                            <i class="bx bx-calendar-check text-danger"></i> {{ $p->tanggal_kembali }}
                        </div>
                    </td>
                    <td>
                        @php
                            $statusColor = [
                                'dipinjam' => 'bg-label-warning',
                                'dikembalikan' => 'bg-label-success',
                                'terlambat' => 'bg-label-danger'
                            ];
                        @endphp
                        <span class="badge {{ $statusColor[$p->status] ?? 'bg-label-secondary' }}">
                            {{ strtoupper($p->status) }}
                        </span>
                    </td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('peminjaman.show', $p->id) }}">
                                    <i class="bx bx-show-alt me-1"></i> Detail
                                </a>
                                <a class="dropdown-item" href="{{ route('peminjaman.edit', $p->id) }}">
                                    <i class="bx bx-edit-alt me-1"></i> Edit
                                </a>
                                <form action="{{ route('peminjaman.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Hapus transaksi ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="dropdown-item text-danger">
                                        <i class="bx bx-trash me-1"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
@endsection