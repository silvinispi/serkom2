@extends('layouts.admin')
@section('title', 'Detail Ekstrakurikuler')

@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5>Detail Ekstrakurikuler</h5>
                            <a href="{{ route('admin.ekstrakurikuler.index') }}" class="btn btn-secondary btn-sm">
                                <i class="icofont icofont-arrow-left"></i> Kembali
                            </a>
                        </div>
                        <div class="card-block">

                            @if ($ekstrakurikuler->gambar && file_exists(public_path('assets/admin/images/' . $ekstrakurikuler->gambar)))
                                <div class="text-center mb-4">
                                    <img src="{{ asset('assets/admin/images/' . $ekstrakurikuler->gambar) }}" style="width: 200px; height: 200px; object-fit: cover; border-radius: 10px;">
                                </div>
                            @endif

                            <table class="table table-bordered">
                                <tr><th style="width:250px;">Nama Ekstrakurikuler</th><td>{{ $ekstrakurikuler->nama_ekskul }}</td></tr>
                                <tr><th>Pembina</th><td>{{ $ekstrakurikuler->guru->nama_guru ?? $ekstrakurikuler->pembina ?? '-' }}</td></tr>
                                <tr><th>Jadwal Latihan</th><td>{{ $ekstrakurikuler->jadwal_latihan }}</td></tr>
                                <tr><th>Deskripsi</th><td>{{ $ekstrakurikuler->deskripsi }}</td></tr>
                                <tr><th>Dibuat</th><td>{{ $ekstrakurikuler->created_at ? $ekstrakurikuler->created_at->format('d-m-Y H:i') : '-' }}</td></tr>
                                <tr><th>Terakhir Diubah</th><td>{{ $ekstrakurikuler->updated_at ? $ekstrakurikuler->updated_at->format('d-m-Y H:i') : '-' }}</td></tr>
                            </table>

                            <div class="text-end mt-3">
                                <a href="{{ route('admin.ekstrakurikuler.addEdit', Crypt::encrypt($ekstrakurikuler->id_ekskul)) }}" class="btn btn-warning">
                                    <i class="icofont icofont-edit"></i> Edit
                                </a>
                                <form action="{{ route('admin.ekstrakurikuler.delete', Crypt::encrypt($ekstrakurikuler->id_ekskul)) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data ini?')">
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
