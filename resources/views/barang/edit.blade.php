@extends('layouts.dashboard')
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Sistem / Barang /</span> Edit Barang
    </h4>

    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Form Edit Barang</h5>
                    <small class="text-muted float-end">Ubah informasi inventaris barang</small>
                </div>
                <div class="card-body">
                    <form action="{{ route('barang.update', $barang->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label text-uppercase" style="font-size: 0.75rem; font-weight: 600;">Nama Barang</label>
                                <input type="text" name="nama_barang" class="form-control" value="{{ $barang->nama_barang }}" required />
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label text-uppercase" style="font-size: 0.75rem; font-weight: 600;">Kode Barang</label>
                                <input type="text" name="kode_barang" class="form-control" value="{{ $barang->kode_barang }}" required />
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label text-uppercase" style="font-size: 0.75rem; font-weight: 600;">Kategori</label>
                                <select name="kategori_id" class="form-select">
                                    @foreach($kategoris as $k)
                                        <option value="{{ $k->id }}" {{ $barang->kategori_id == $k->id ? 'selected' : '' }}>
                                            {{ $k->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label text-uppercase" style="font-size: 0.75rem; font-weight: 600;">Lokasi</label>
                                <select name="lokasi_id" class="form-select">
                                    @foreach($lokasis as $l)
                                        <option value="{{ $l->id }}" {{ $barang->lokasi_id == $l->id ? 'selected' : '' }}>
                                            {{ $l->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3 col-md-4">
                                <label class="form-label text-uppercase" style="font-size: 0.75rem; font-weight: 600;">Kondisi</label>
                                <select name="kondisi" class="form-select">
                                    <option value="baik" {{ $barang->kondisi == 'baik' ? 'selected' : '' }}>BAIK</option>
                                    <option value="rusak_ringan" {{ $barang->kondisi == 'rusak_ringan' ? 'selected' : '' }}>RUSAK RINGAN</option>
                                    <option value="rusak_berat" {{ $barang->kondisi == 'rusak_berat' ? 'selected' : '' }}>RUSAK BERAT</option>
                                </select>
                            </div>

                            <div class="mb-3 col-md-4">
                                <label class="form-label text-uppercase" style="font-size: 0.75rem; font-weight: 600;">Jumlah</label>
                                <input type="number" name="jumlah" class="form-control" value="{{ $barang->jumlah }}" />
                            </div>

                            <div class="mb-3 col-md-4">
                                <label class="form-label text-uppercase" style="font-size: 0.75rem; font-weight: 600;">Satuan</label>
                                <input type="text" name="satuan" class="form-control" value="{{ $barang->satuan }}" placeholder="Pcs / Unit" />
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary me-2">Simpan Perubahan</button>
                            <a href="{{ route('barang.index') }}" class="btn btn-outline-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection