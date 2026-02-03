@extends('layouts.dashboard')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Barang /</span> Tambah Barang Baru</h4>

    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Form Inventaris Baru</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Kode Barang</label>
                                <input type="text" name="kode_barang" class="form-control" placeholder="BRG-001" required />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Nama Barang</label>
                                <input type="text" name="nama_barang" class="form-control" placeholder="Masukkan nama barang" required />
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Kategori</label>
                                <select name="kategori_id" class="form-select" required>
                                    @foreach($kategori as $k)
                                        <option value="{{ $k->id }}">{{ $k->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Lokasi Penyimpanan</label>
                                <select name="lokasi_id" class="form-select" required>
                                    @foreach($lokasi as $l)
                                        <option value="{{ $l->id }}">{{ $l->nama }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Kondisi</label>
                                <select name="kondisi" class="form-select">
                                    <option value="baik">Baik</option>
                                    <option value="rusak_ringan">Rusak Ringan</option>
                                    <option value="rusak_berat">Rusak Berat</option>
                                    <option value="hilang">Hilang</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-3">
                                <label class="form-label">Jumlah</label>
                                <input type="number" name="jumlah" class="form-control" value="1" />
                            </div>
                            <div class="mb-3 col-md-3">
                                <label class="form-label">Satuan</label>
                                <input type="text" name="satuan" class="form-control" placeholder="Pcs/Unit" />
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Harga Perolehan</label>
                                <input type="number" name="harga" class="form-control" placeholder="0" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Tanggal Beli</label>
                                <input type="date" name="tanggal_beli" class="form-control" />
                            </div>

                            <div class="mb-3 col-md-12">
                                <label class="form-label">Foto Barang</label>
                                <input type="file" name="foto" class="form-control" accept="image/*" />
                            </div>
                            <div class="mb-3 col-md-12">
                                <label class="form-label">Deskripsi</label>
                                <textarea name="deskripsi" class="form-control" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary me-2">Simpan Barang</button>
                            <a href="{{ route('barang.index') }}" class="btn btn-outline-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection