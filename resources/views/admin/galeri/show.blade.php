@extends('layouts.admin')
@section('title', 'Detail Galeri')

@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5>Detail Galeri</h5>
                            <a href="{{ route('admin.galeri.index') }}" class="btn btn-secondary btn-sm">
                                <i class="icofont icofont-arrow-left"></i> Kembali
                            </a>
                        </div>
                        <div class="card-block">

                            <div class="text-center mb-4">
                                @if ($galeri->file && file_exists(public_path('assets/admin/images/' . $galeri->file)))
                                    @if ($galeri->kategori == 'Foto')
                                        <img src="{{ asset('assets/admin/images/' . $galeri->file) }}" style="max-width: 400px; max-height: 400px; object-fit: cover; border-radius: 10px;">
                                    @else
                                        <video controls style="max-width: 400px; border-radius: 10px;">
                                            <source src="{{ asset('assets/admin/images/' . $galeri->file) }}">
                                            Browser kamu tidak mendukung video.
                                        </video>
                                    @endif
                                @else
                                    <span class="text-muted">Tidak ada file</span>
                                @endif
                            </div>

                            <table class="table table-bordered">
                                <tr><th style="width:250px;">Judul</th><td>{{ $galeri->judul }}</td></tr>
                                <tr><th>Keterangan</th><td>{{ $galeri->keterangan }}</td></tr>
                                <tr><th>Kategori</th><td>{{ $galeri->kategori }}</td></tr>
                                <tr><th>Tanggal</th><td>{{ \Carbon\Carbon::parse($galeri->tanggal)->format('d-m-Y') }}</td></tr>
                                <tr><th>Nama File</th><td>{{ $galeri->file ?? '-' }}</td></tr>
                                <tr><th>Dibuat</th><td>{{ $galeri->created_at ? $galeri->created_at->format('d-m-Y H:i') : '-' }}</td></tr>
                            </table>

                            <div class="text-end mt-3">
                                <a href="{{ route('admin.galeri.addEdit', Crypt::encrypt($galeri->id_galeri)) }}" class="btn btn-warning">
                                    <i class="icofont icofont-edit"></i> Edit
                                </a>
                                <form action="{{ route('admin.galeri.delete', Crypt::encrypt($galeri->id_galeri)) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data ini?')">
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
