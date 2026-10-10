@extends('layouts.admin')
@section('title', 'Detail Berita')

@section('content')
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <div class="page-body">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5>Detail Berita</h5>
                                <a href="{{ route('admin.berita.index') }}" class="btn btn-secondary btn-sm">
                                    <i class="icofont icofont-arrow-left"></i> Kembali
                                </a>
                            </div>
                            <div class="card-block">

                                <div class="article-cover-wrapper mb-4">
                                    @if ($berita->gambar && file_exists(public_path('assets/admin/images/' . $berita->gambar)))
                                        <img src="{{ asset('assets/admin/images/' . $berita->gambar) }}"
                                            alt="Foto {{ $berita->judul }}">
                                    @else
                                        <div class="w-100 h-100 d-flex flex-column align-items-center justify-content-center text-white-50"
                                            style="min-height: 280px; background: #1e293b;">
                                            <i data-feather="image" width="60" class="mb-2 text-secondary"></i>
                                            <span class="small text-muted">Tidak ada gambar sampul</span>
                                        </div>
                                    @endif
                                </div>

                                <table class="table table-bordered">
                                    <tr>
                                        <th style="width:250px;">Judul</th>
                                        <td>{{ $berita->judul }}</td>
                                    </tr>
                                    <tr>
                                        <th>Penulis</th>
                                        <td>
                                            {{ $berita->user->name ?? '-' }}
                                            @if ($berita->user)
                                                <span style="color: #999;">- {{ ucfirst($berita->user->role) }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>
                                            @if ($berita->status === 'publish')
                                                <span class="badge bg-success">Publish</span>
                                            @else
                                                <span class="badge bg-warning">Draft</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal</th>
                                        <td>{{ \Carbon\Carbon::parse($berita->tanggal)->format('d-m-Y') }}</td>
                                    </tr>
                                    <tr>
                                        <th>Isi</th>
                                        <td>{!! nl2br(e($berita->isi)) !!}</td>
                                    </tr>
                                    <tr>
                                        <th>Dibuat</th>
                                        <td>{{ $berita->created_at ? $berita->created_at->format('d-m-Y H:i') : '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Terakhir Diubah</th>
                                        <td>{{ $berita->updated_at ? $berita->updated_at->format('d-m-Y H:i') : '-' }}</td>
                                    </tr>
                                </table>

                                <div class="text-end mt-3">
                                    <a href="{{ route('admin.berita.addEdit', Crypt::encrypt($berita->id_berita)) }}"
                                        class="btn btn-warning">
                                        <i class="icofont icofont-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.berita.delete', Crypt::encrypt($berita->id_berita)) }}"
                                        method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="icofont icofont-trash"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
