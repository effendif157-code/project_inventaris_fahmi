@extends('layouts.dashboard')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Transaksi /</span> Tambah Peminjaman
    </h4>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Form Peminjaman Baru</h5>
            <small class="text-muted float-end">Pastikan stok barang tersedia</small>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('peminjaman.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Kode Peminjaman</label>
                        <input type="text" class="form-control" name="kode_peminjaman" value="{{ $kodeOtomatis }}" readonly>
                    </div>

                    <div class="mb-3 col-md-6">
                        <label class="form-label">Nama Peminjam</label>
                        <input type="text" class="form-control @error('nama_peminjam') is-invalid @enderror" name="nama_peminjam" placeholder="Masukkan nama lengkap" value="{{ old('nama_peminjam') }}" required>
                        @error('nama_peminjam') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3 col-md-6">
                        <label class="form-label">Jenis Peminjam</label>
                        <select class="form-select" name="jenis_peminjam" required>
                            <option value="siswa">Siswa</option>
                            <option value="guru">Guru</option>
                            <option value="staf">Staf</option>
                            <option value="luar">Pihak Luar</option>
                        </select>
                    </div>

                    <div class="mb-3 col-md-6">
                        <label class="form-label">Barang yang Dipinjam</label>
                        <select class="form-select @error('barang_id') is-invalid @enderror" name="barang_id" required>
                            <option value="">-- Pilih Barang --</option>
                            @foreach($barangs as $b)
                                <option value="{{ $b->id }}">{{ $b->nama_barang }} (Tersedia: {{ $b->jumlah }})</option>
                            @endforeach
                        </select>
                        @error('barang_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3 col-md-3">
                        <label class="form-label">Jumlah Pinjam</label>
                        <input type="number" class="form-control" name="jumlah" min="1" value="1" required>
                    </div>
                    <div class="mb-3 col-md-3">
                        <label class="form-label">Kondisi Awal</label>
                        <input type="text" class="form-control" name="kondisi_sebelum" value="Baik" placeholder="Contoh: Baik/Lengkap">
                    </div>

                    <div class="mb-3 col-md-3">
                        <label class="form-label">Tanggal Pinjam</label>
                        <input type="date" class="form-control" name="tanggal_pinjam" value="{{ date('Y-m-d') }}" required>
                    </div>
                    <div class="mb-3 col-md-3">
                        <label class="form-label">Tanggal Estimasi Kembali</label>
                        <input type="date" class="form-control" name="tanggal_kembali" required>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary me-2">Simpan Peminjaman</button>
                    <a href="{{ route('peminjaman.index') }}" class="btn btn-outline-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection