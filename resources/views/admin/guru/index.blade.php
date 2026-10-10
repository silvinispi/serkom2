@extends('layouts.admin')
@section('title', 'Data Guru')

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
                                <div class="page-header-title">
                                    <div class="me-3 d-flex align-items-center justify-content-center rounded "
                                        style="width: 45px; height: 45px; background: #55bc15; color: #fff; font-size: 24px; flex-shrink: 0;">
                                        <i class="fa-solid fa-user"></i>
                                    </div>
                                    <div class="px-3">
                                        <h4>Data Guru</h4>
                                        <span>Kelola Daftar Guru Dibawah Ini</span>
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
                                        <li class="breadcrumb-item"><a href="#!">Guru</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Page Body --}}
                    <div class="page-body">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5>Data Guru</h5>
                                <a href="{{ route('admin.guru.addEdit') }}" class="btn btn-primary btn-sm">
                                    <i class="ti-plus"></i> Tambah Guru
                                </a>
                            </div>
                            <div class="card-block">


                                <div class="table-responsive">
                                    <table class="table table-striped table-hover" id="tabelGuru">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Foto</th>
                                                <th>Nama</th>
                                                <th>NIP</th>
                                                <th>Mapel</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($guru as $index => $g)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>
                                                        @if ($g->foto && file_exists(public_path('assets/admin/images/' . $g->foto)))
                                                            <img src="{{ asset('assets/admin/images/' . $g->foto) }}"
                                                                alt="Foto" class="rounded-circle"
                                                                style="width: 45px; height: 45px; object-fit: cover;">
                                                        @else
                                                            <div class="rounded-circle bg-light d-inline-flex align-items-center justify-content-center"
                                                                style="width: 45px; height: 45px; color: #999;">
                                                                <i class="icofont icofont-user"></i>
                                                            </div>
                                                        @endif
                                                    </td>
                                                    <td>{{ $g->nama_guru }}</td>
                                                    <td>{{ $g->nip }}</td>
                                                    <td>{{ $g->mapel }}</td>
                                                    <td class="text-center">
                                                        <a href="{{ route('admin.guru.show', Crypt::encrypt($g->id_guru)) }}"
                                                            class="btn btn-info btn-sm">
                                                            <i class="icofont icofont-eye"></i> Lihat
                                                        </a>
                                                        <a href="{{ route('admin.guru.addEdit', Crypt::encrypt($g->id_guru)) }}"
                                                            class="btn btn-warning btn-sm">
                                                            <i class="icofont icofont-edit"></i> Edit
                                                        </a>
                                                        <form
                                                            action="{{ route('admin.guru.delete', Crypt::encrypt($g->id_guru)) }}"
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
                                                    <td colspan="6" class="text-center">Belum ada data guru.</td>
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
