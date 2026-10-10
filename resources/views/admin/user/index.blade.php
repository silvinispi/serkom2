@extends('layouts.admin')
@section('title', 'Data User')

@section('content')
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            {{-- ALERT --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="ti-check-box"></i> {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="ti-alert"></i> {{ session('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <script>
                setTimeout(function() {
                    document.querySelectorAll('.alert').forEach(function(el) {
                        el.style.transition = 'opacity .5s';
                        el.style.opacity = '0';
                        setTimeout(() => el.remove(), 500);
                    });
                }, 5000);
            </script>
            <div class="main-body">
                <div class="page-wrapper">

                    {{-- Page Header --}}
                    <div class="page-header card">
                        <div class="row align-items-end">
                            <div class="col-lg-8">
                                <div class="page-header-title d-flex align-items-center">
                                    <div class="me-3 d-flex align-items-center justify-content-center rounded "
                                        style="width: 45px; height: 45px; background: #f17f8a; color: #fff; font-size: 24px; flex-shrink: 0;">
                                        <i class="fa-solid fa-key"></i>
                                    </div>
                                    <div class="px-3">
                                        <h4>Data Pengguna</h4>
                                        <span >Kelola Data Pengguna Dibawah Ini</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="page-header-breadcrumb">
                                    <ul class="breadcrumb-title">
                                        <li class="breadcrumb-item">
                                            <a href="{{ route('admin.dashboard') }}"><i
                                                    class="icofont icofont-home"></i></a>
                                        </li>
                                        {{-- <li class="breadcrumb-item"><a href="#!">Admin</a></li> --}}
                                        <li class="breadcrumb-item"><a href="#!">Data Pengelola</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Page Body --}}
                    <div class="page-body">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5>Data Pengelola</h5>
                                <a href="{{ route('admin.user.addEdit') }}" class="btn btn-primary btn-sm">
                                    <i class="ti-plus"></i> Tambah User
                                </a>
                            </div>
                            <div class="card-block">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover" id="tabelUser">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Foto</th>
                                                <th>Nama</th>
                                                <th>Username</th>
                                                <th>Role</th>
                                                <th>Status</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($user as $index => $u)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>
                                                        @if ($u->foto && file_exists(public_path('assets/admin/images/' . $u->foto)))
                                                            <img src="{{ asset('assets/admin/images/' . $u->foto) }}"
                                                                alt="Foto" class="rounded-circle"
                                                                style="width: 45px; height: 45px; object-fit: cover;">
                                                        @else
                                                            <div class="rounded-circle bg-light d-inline-flex align-items-center justify-content-center"
                                                                style="width: 45px; height: 45px; color: #999;">
                                                                <i class="icofont icofont-user"></i>
                                                            </div>
                                                        @endif
                                                    </td>
                                                    <td>{{ $u->name }}</td>
                                                    <td>{{ $u->username }}</td>
                                                    <td>
                                                        @if ($u->role === 'admin')
                                                            <span class="badge bg-primary">Admin</span>
                                                        @else
                                                            <span class="badge bg-warning">Operator</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($u->status === 'aktif')
                                                            <span class="badge bg-success">Aktif</span>
                                                        @else
                                                            <span class="badge bg-danger">Tidak Aktif</span>
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="{{ route('admin.user.show', Crypt::encrypt($u->id_user)) }}"
                                                            class="btn btn-info btn-sm">
                                                            <i class="icofont icofont-eye"></i> Lihat
                                                        </a>
                                                        <a href="{{ route('admin.user.addEdit', Crypt::encrypt($u->id_user)) }}"
                                                            class="btn btn-warning btn-sm">
                                                            <i class="icofont icofont-edit"></i> Edit
                                                        </a>
                                                        <form
                                                            action="{{ route('admin.user.delete', Crypt::encrypt($u->id_user)) }}"
                                                            method="POST" class="d-inline"
                                                            onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm">
                                                                <i class="icofont icofont-trash"></i> Hapus
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="7" class="text-center">Belum ada data user.</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
