@extends('layouts.admin')

@section('title', $title)

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
                                        style="width: 45px; height: 45px; background: #f37581; color: #fff; font-size: 24px; flex-shrink: 0;">
                                        <i class="fa-solid fa-address-card"></i>
                                    </div>
                                    <div class="px-3">
                                        <h4>Profil Sekolah</h4>
                                        <span>Informasi Lengkap Profil Sekolah</span>
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
                                        <li class="breadcrumb-item"><a href="#!">Profil Sekolah</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Page Body --}}
                    <div class="page-body">
                        <div class="row">

                            {{-- CARD 1: LOGO + NAMA --}}
                            <div class="col-md-12 mb-3">
                                <div class="card">
                                    <div class="card-block text-center py-4">
                                        @if (isset($profil->logo) && $profil->logo && file_exists(public_path('assets/admin/images/' . $profil->logo)))
                                            <img src="{{ asset('assets/admin/images/' . $profil->logo) }}"
                                                alt="Logo Sekolah" class="rounded-circle img-thumbnail mb-3"
                                                style="width: 120px; height: 120px; object-fit: cover;">
                                        @else
                                            <div class="rounded-circle bg-light d-inline-flex align-items-center justify-content-center mb-3"
                                                style="width: 120px; height: 120px; font-size: 3rem; color: #999;">
                                                <i class="icofont icofont-school-bag"></i>
                                            </div>
                                        @endif

                                        <h3 class="mb-1">{{ $profil->nama_sekolah ?? 'MTS PSA Nurul Ihsan' }}</h3>
                                        <p class="text-muted mb-3">
                                            <i class="icofont icofont-ui-home"></i> NPSN: {{ $profil->npsn ?? '-' }}
                                        </p>

                                        @if ($profil && $profil->id_profil)
                                            <a href="{{ route('admin.profil.edit', Crypt::encrypt($profil->id_profil)) }}"
                                                class="btn btn-primary btn-sm">
                                                <i class="icofont icofont-edit"></i> Edit Profil
                                            </a>
                                        
                                    @endif
                                    </div>
                                </div>
                            </div>

                            {{-- CARD 2: KEPALA SEKOLAH --}}
                            <div class="col-md-12 mb-3">
                                <div class="card">
                                    <div class="card-header">
                                        <h5><i class="fa-solid fa-user"></i> Kepala Sekolah</h5>
                                    </div>
                                    <div class="card-block">
                                        <div class="row align-items-center">
                                            <div class="col-md-4 text-center mb-3 mb-md-0">
                                                @if (isset($profil->foto) && $profil->foto && file_exists(public_path('assets/admin/images/' . $profil->foto)))
                                                    <img src="{{ asset('assets/admin/images/' . $profil->foto) }}"
                                                        alt="Foto Kepala Sekolah" class="img-thumbnail rounded-circle"
                                                        style="width: 130px; height: 130px; object-fit: cover;">
                                                @else
                                                    <div class="rounded-circle bg-light d-inline-flex align-items-center justify-content-center"
                                                        style="width: 130px; height: 130px; font-size: 3rem; color: #999;">
                                                        <i class="icofont icofont-user"></i>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-md-8">
                                                <table class="table table-bordered mb-0">
                                                    <tr>
                                                        <th style="width: 200px;">Nama Kepala Sekolah</th>
                                                        <td>{{ $profil->kepala_sekolah ?? '-' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>NIP</th>
                                                        <td>{{ $profil->nip ?? '-' }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 mb-3">
                                <div class="card">
                                    <div class="card-header">
                                        <h5><i class="fa-solid fa-house"></i> Halaman Depan </h5>
                                    </div>
                                    <div class="card-block">
                                        <div class="row align-items-center">
                                            <div class="col-md-4 text-center mb-3 mb-md-0">
                                                @if (isset($profil->banner) && $profil->banner && file_exists(public_path('assets/admin/images/' . $profil->banner)))
                                                    <img src="{{ asset('assets/admin/images/' . $profil->banner) }}"
                                                        alt="Foto Banner" class="img-thumbnail rounded-circle"
                                                        style="width: 130px; height: 130px; object-fit: cover;">
                                                @else
                                                    <div class="rounded-circle bg-light d-inline-flex align-items-center justify-content-center"
                                                        style="width: 130px; height: 130px; font-size: 3rem; color: #999;">
                                                        <i class="icofont icofont-user"></i>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-md-8">
                                                <table class="table table-bordered mb-0">
                                                    <tr>
                                                        <th style="width: 200px;">Text Banner</th>
                                                        <td style="white-space: normal; word-wrap: break-word;">{{ $profil->text ?? '-' }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="card h-100">
                                    <div class="card-header">
                                        <h5><i class="icofont icofont-info-circle"></i> Informasi Sekolah</h5>
                                    </div>
                                    <div class="card-block">
                                        <table class="table table-bordered mb-0">
                                            <tr>
                                                <th style="width: 40%;">Tahun Berdiri</th>
                                                <td>{{ $profil->tahun_berdiri ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <th>Kontak</th>
                                                <td>{{ $profil->kontak ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <th style="width: 40%;">Alamat</th>
                                                <td style="white-space: normal; word-wrap: break-word;">{{ $profil->alamat ?? '-' }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="card h-100">
                                    <div class="card-header">
                                        <h5><i class="icofont icofont-info-circle"></i> Tautan Media Sosial</h5>
                                    </div>
                                    <div class="card-block">
                                        <table class="table table-bordered mb-0">
                                            <tr>
                                                <th style="width: 40%;">Youtube</th>
                                                <td>{{ $profil->youtube ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <th>Instagram</th>
                                                <td>{{ $profil->instagram ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <th style="width: 40%;">Facebook</th>
                                                <td>{{ $profil->facebook ?? '-' }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            {{-- CARD 4: VISI MISI --}}
                            <div class="col-md-12 mb-3">
                                <div class="card h-100">
                                    <div class="card-header">
                                        <h5><i class="icofont icofont-eye-alt"></i> Visi & Misi</h5>
                                    </div>
                                    <div class="card-block">
                                        <p style="white-space: pre-line;">{{ $profil->visi_misi ?? '-' }}</p>
                                    </div>
                                </div>
                            </div>

                            {{-- CARD 5: DESKRIPSI --}}
                            <div class="col-md-12 mb-3">
                                <div class="card">
                                    <div class="card-header">
                                        <h5><i class="fa-solid fa-file-lines"></i> Deskripsi Sekolah</h5>
                                    </div>
                                    <div class="card-block">
                                        <p style="white-space: pre-line;">{{ $profil->deskripsi ?? '-' }}</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
