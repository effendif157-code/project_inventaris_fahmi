@extends('layouts.dashboard')

@section('content')
<style>
    /* 1. Layout & Card Enhancements */
    .content-wrapper { background-color: #f5f5f9; }
    .card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.04);
        overflow: hidden;
    }
    .card-header {
        background-color: #fff;
        padding: 1.5rem;
        border-bottom: 1px solid #f0f2f4;
    }

    /* 2. Typography & Header */
    .page-title { color: #566a7f; font-weight: 700; }
    .table-title { font-size: 1.25rem; font-weight: 600; color: #32475c; }

    /* 3. Table Styling */
    .table thead th {
        background-color: #f8f9fa;
        text-transform: uppercase;
        font-size: 0.75rem;
        letter-spacing: 0.5px;
        font-weight: 700;
        color: #8e94a9;
        padding: 12px 24px;
        border: none !important;
    }
    .table tbody td {
        padding: 16px 24px;
        vertical-align: middle;
        color: #697a8d;
        border-color: #f0f2f4;
    }
    .table-hover tbody tr:hover {
        background-color: #f9faff !important;
        transition: all 0.2s ease;
    }

    /* 4. Avatar & Identity */
    .avatar-wrapper { display: flex; align-items: center; }
    .avatar-initial {
        width: 38px;
        height: 38px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        background: linear-gradient(135deg, #696cff 0%, #8e91ff 100%);
        color: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(105, 108, 255, 0.25);
    }
    .user-name { font-weight: 600; color: #566a7f; margin-bottom: 0; }
    .user-id { font-size: 0.75rem; color: #a1acb8; }

    /* 5. Custom Badges (Role) */
    .badge-role {
        padding: 6px 12px;
        border-radius: 6px;
        font-weight: 600;
        font-size: 0.7rem;
        letter-spacing: 0.3px;
    }
    .bg-light-danger { background-color: #ffe0db; color: #ff3e1d; }
    .bg-light-info { background-color: #d7f5fc; color: #03c3ec; }

    /* 6. DataTables UI Customization */
    div.dataTables_wrapper .dataTables_filter input {
        border: 1px solid #d9dee3;
        border-radius: 8px;
        padding: 7px 14px;
        margin-left: 10px;
    }
    div.dataTables_wrapper .dataTables_filter input:focus {
        border-color: #696cff;
        box-shadow: 0 0 0 0.2rem rgba(105, 108, 255, 0.1);
        outline: none;
    }
    .page-item.active .page-link {
        background-color: #696cff;
        border-color: #696cff;
        box-shadow: 0 2px 4px rgba(105, 108, 255, 0.4);
    }
</style>

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="page-title mb-0">Manajemen User</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mb-0">
                    <li class="breadcrumb-item text-muted">Sistem</li>
                    <li class="breadcrumb-item active">Daftar Pengguna</li>
                </ol>
            </nav>
        </div>
        <a href="{{ route('dashboard.users.create') }}" class="btn btn-primary shadow-sm px-4">
            <i class="bx bx-plus-circle me-2"></i> Tambah User Baru
        </a>
    </div>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="table-title mb-0">Daftar Pengguna Aktif</h5>
        </div>
        
        <div class="card-body pt-0">
            <div class="table-responsive text-nowrap">
                <table class="table table-hover w-100" id="users-table">
                    <thead>
                        <tr>
                            <th>Pengguna</th>
                            <th>Email</th>
                            <th>Role / Akses</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>
                                <div class="avatar-wrapper">
                                    <div class="avatar me-3">
                                        <span class="avatar-initial">
                                            {{ strtoupper(substr($user->name, 0, 1)) }}
                                        </span>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <p class="user-name">{{ $user->name }}</p>
                                        <span class="user-id">UID: #{{ $user->id }}</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="text-lowercase">{{ $user->email }}</span>
                            </td>
                            <td>
                                @if($user->role === 'admin')
                                    <span class="badge badge-role bg-light-danger">ADMINISTRATOR</span>
                                @else
                                    <span class="badge badge-role bg-light-info">USER REGULER</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="d-inline-block">
                                    <button type="button" class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded fs-5 text-muted"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end border-0 shadow-sm">
                                        <a class="dropdown-item" href="{{ route('dashboard.users.edit', $user->id) }}">
                                            <i class="bx bx-edit-alt me-2 text-warning"></i> Ubah Data
                                        </a>
                                        @if(!($loop->first && $user->role === 'admin'))
                                        <div class="dropdown-divider"></div>
                                        <button type="submit" class="dropdown-item text-danger">
                                            <i class="bx bx-trash me-2"></i> Hapus User
                                        </button>
                                        @endif
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
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
@endpush

@push('scripts')
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function () {
        $('#users-table').DataTable({
            "pageLength": 10,
            "ordering": true,
            "language": {
                "search": "",
                "searchPlaceholder": "Cari nama atau email...",
                "lengthMenu": "_MENU_",
            },
            "dom": '<"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
        });
    });
</script>
@endpush