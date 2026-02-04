@extends('layouts.dashboard')
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Sistem /</span> Daftar Barang
    </h4>

    @if(session('success'))
    <div class="alert alert-primary alert-dismissible" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Daftar Inventaris Aktif</h5>
            <a href="{{ route('barang.create') }}" class="btn btn-primary">
                <span class="tf-icons bx bx-plus"></span>&nbsp; Tambah Barang Baru
            </a>
        </div>
        
        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nama Barang</th>
                        <th>Lokasi</th>
                        <th>Kategori</th>
                        <th>Kondisi</th>
                        <th>Jumlah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($barangs as $b)
                    <tr>
                        <td>
                            <div class="d-flex justify-content-start align-items-center">
                                <div class="avatar avatar-sm me-3">
                                    @if($b->foto_barang)
                                        {{-- Jika ada foto, tampilkan gambar --}}
                                        <img src="{{ asset('storage/' . $b->foto_barang) }}" alt="Foto {{ $b->nama_barang }}" class="rounded-circle" style="object-fit: cover;">
                                    @else
                                        {{-- Jika tidak ada foto, tampilkan inisial seperti sebelumnya --}}
                                        <span class="avatar-initial rounded bg-label-primary">
                                            {{ strtoupper(substr($b->nama_barang, 0, 1)) }}
                                        </span>
                                    @endif
                                </div>
                                <div class="d-flex flex-column">
                                    <span class="fw-semibold">{{ $b->nama_barang }}</span>
                                </div>
                            </div>
                        </td>
                        <td>{{ $b->lokasi->nama }}</td>
                        
                        <td>{{ $b->kategori->nama }}</td>
                        <td>
                            @php
                                $badgeColor = $b->kondisi == 'baik' ? 'bg-label-success' : ($b->kondisi == 'rusak_ringan' ? 'bg-label-warning' : 'bg-label-danger');
                            @endphp
                            <span class="badge {{ $badgeColor }} me-1">
                                {{ str_replace('_', ' ', strtoupper($b->kondisi)) }}
                            </span>
                        </td>
                        <td>{{ $b->jumlah }} {{ $b->satuan }}</td>
                        <td>
                           <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('barang.edit', $b->id) }}">
                                        <i class="bx bx-edit-alt me-1"></i> Edit
                                    </a>
                                    
                                    <form action="{{ route('barang.destroy', $b->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin?')">
                                        @csrf 
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item text-danger">
                                            <i class="bx bx-trash me-1"></i> Delete
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