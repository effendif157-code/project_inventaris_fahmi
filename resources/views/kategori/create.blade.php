@extends('layouts.dashboard')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Master Data / Kategori /</span> Tambah Baru
    </h4>

    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Form Tambah Kategori</h5>
                    <small class="text-muted float-end">Input kategori barang baru</small>
                </div>
                <div class="card-body">
                    <form action="{{ route('kategori.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label class="form-label" for="nama">Nama Kategori</label>
                            <div class="input-group input-group-merge">
                                <span id="nama-icon" class="input-group-text"><i class="bx bx-category"></i></span>
                                <input type="text" name="nama" id="nama" 
                                    class="form-control @error('nama') is-invalid @enderror" 
                                    placeholder="Masukkan nama kategori" 
                                    value="{{ old('nama') }}" required />
                            </div>
                            @error('nama')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="deskripsi">Deskripsi</label>
                            <div class="input-group input-group-merge">
                                <span id="deskripsi-icon" class="input-group-text"><i class="bx bx-comment-detail"></i></span>
                                <textarea name="deskripsi" id="deskripsi" rows="3"
                                    class="form-control @error('deskripsi') is-invalid @enderror" 
                                    placeholder="Keterangan singkat mengenai kategori ini">{{ old('deskripsi') }}</textarea>
                            </div>
                            @error('deskripsi')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="pt-2">
                            <button type="submit" class="btn btn-primary me-sm-3 me-1">
                                <i class="bx bx-save me-1"></i> Simpan
                            </button>
                            <a href="{{ route('kategori.index') }}" class="btn btn-label-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection