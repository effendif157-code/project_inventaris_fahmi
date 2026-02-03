@extends('layouts.dashboard')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Sistem / Lokasi /</span> Tambah Lokasi Baru
    </h4>

    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Form Tambah Lokasi</h5>
                    <small class="text-muted float-end">Ubah informasi lokasi barang</small>
                </div>
                
                <div class="card-body">
                    <form action="{{ route('lokasi.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label class="form-label text-uppercase" style="font-size: 0.75rem; font-weight: 600;">Nama Lokasi</label>
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" 
                                   placeholder="Masukkan nama lokasi (contoh: Gudang Utama)" value="{{ old('nama') }}" required />
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-uppercase" style="font-size: 0.75rem; font-weight: 600;">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" 
                                      rows="4" placeholder="Masukkan detail atau keterangan lokasi">{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary me-2">Simpan Lokasi</button>
                            <a href="{{ route('lokasi.index') }}" class="btn btn-outline-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection