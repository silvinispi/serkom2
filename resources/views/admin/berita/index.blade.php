@extends('layouts.admin')
@section('title', 'Data Berita')

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
                                        style="width: 45px; height: 45px; background: #19988d; color: #fff; font-size: 24px; flex-shrink: 0;">
                                        <i class="fa-solid fa-newspaper"></i>
                                    </div>
                                    <div class="px-3">
                                        <h4>Data Berita</h4>
                                        <span>Kelola Berita Dibawah Ini</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="page-header-breadcrumb">
                                    <ul class="breadcrumb-title">
                                        <li class="breadcrumb-item">
                                            <a href="{{ route('admin.dashboard') }}">
                                                <i class="fa-solid fa-house"></i></a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="#!">Berita</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Page Body --}}
                    <div class="page-body">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5>Berita</h5>
                                <a href="{{ route('admin.berita.addEdit') }}" class="btn btn-primary btn-sm">
                                    <i class="ti-plus"></i> Tambah Berita
                                </a>
                            </div>
                            <div class="card-block">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover" id="tabelBerita">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Judul</th>
                                                <th>Isi</th>
                                                <th>Tanggal</th>
                                                <th>Gambar</th>
                                                <th>Penulis</th>
                                                <th>Status</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($berita as $index => $b)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $b->judul }}</td>
                                                    <td>{{ \Illuminate\Support\Str::limit($b->isi, 50) }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($b->tanggal)->format('d-m-Y') }}</td>
                                                    <td class="py-3">
                                                        @if ($b->gambar && file_exists(public_path('assets/admin/images/' . $b->gambar)))
                                                            <img src="{{ asset('assets/admin/images/' . $b->gambar) }}"
                                                                alt="{{ $b->judul }}"
                                                                class="rounded-2"
                                                                style="width: 50px; height: 50px; object-fit: cover;">
                                                        @else
                                                            <div class="rounded-2 bg-light text-muted d-flex align-items-center justify-content-center"
                                                                style="width: 50px; height: 50px;">
                                                                <i class="fa-solid fa-image"></i>
                                                            </div>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{ $b->user->name ?? '-' }}
                                                        @if ($b->user)
                                                            <span style="color: #999;">-
                                                                {{ ucfirst($b->user->role) }}</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($b->status === 'publish')
                                                            <span class="badge bg-success">Publish</span>
                                                        @else
                                                            <span class="badge bg-warning">Draft</span>
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="{{ route('admin.berita.show', Crypt::encrypt($b->id_berita)) }}"
                                                            class="btn btn-info btn-sm">
                                                            <i class="icofont icofont-eye"></i> Lihat
                                                        </a>
                                                        <a href="{{ route('admin.berita.addEdit', Crypt::encrypt($b->id_berita)) }}"
                                                            class="btn btn-warning btn-sm">
                                                            <i class="icofont icofont-edit"></i> Edit
                                                        </a>
                                                        <form
                                                            action="{{ route('admin.berita.delete', Crypt::encrypt($b->id_berita)) }}"
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
                                                    <td colspan="8" class="text-center">Belum ada data berita.</td>
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
