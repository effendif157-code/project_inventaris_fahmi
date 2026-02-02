@extends('layouts.dashboard')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Sistem /</span> Daftar Kategori
    </h4>

    @if(session('success'))
    <div class="alert alert-primary alert-dismissible" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Daftar Kategori Aktif</h5>
            <a href="{{ route('kategori.create') }}" class="btn btn-primary">
                <i class="bx bx-plus me-1"></i> Tambah Kategori Baru
            </a>
        </div>
        
        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th style="width: 30%">Kategori</th>
                        <th style="width: 40%">Deskripsi</th>
                        <th style="width: 20%">Status</th>
                        <th style="width: 10%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse($kategoris as $item)
                    <tr>
                        <td>
                            <div class="d-flex justify-content-start align-items-center">
                                <div class="avatar-wrapper">
                                    <div class="avatar me-2">
                                        <span class="avatar-initial rounded bg-label-primary">
                                            {{ strtoupper(substr($item->nama, 0, 1)) }}
                                        </span>
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <span class="fw-medium text-heading text-truncate">{{ $item->nama }}</span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="text-muted">{{ Str::limit($item->deskripsi, 50) ?? 'Tidak ada deskripsi' }}</span>
                        </td>
                        
                        <td>
                            @if($item->status == 1)
                                <span class="badge bg-label-success">AKTIF</span>
                            @else
                                <span class="badge bg-label-secondary">TIDAK AKTIF</span>
                            @endif
                        </td>

                        <td class="text-center">
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('kategori.edit', $item->id) }}">
                                        <i class="bx bx-edit-alt me-1"></i> Edit
                                    </a>
                                    <form action="{{ route('kategori.destroy', $item->id) }}" method="POST" 
                                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus?')">
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
                    @empty
                    <tr>
                        <td colspan="4" class="text-center py-5 text-muted">Belum ada data kategori.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer border-top p-3">
            <small class="text-muted">Showing {{ $kategoris->count() }} entries</small>
        </div>
    </div>
</div>
@endsection