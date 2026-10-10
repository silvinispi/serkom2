@extends('layouts.admin')
@section('title', 'Detail Data Guru')

@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5>Detail Data Guru</h5>
                            <a href="{{ route('admin.guru.index') }}" class="btn btn-secondary btn-sm">
                                <i class="icofont icofont-arrow-left"></i> Kembali
                            </a>
                        </div>
                        <div class="card-block">
                            <div class="text-center mb-4">
                                @if($guru->foto && file_exists(public_path('assets/admin/images/' . $guru->foto)))
                                    <img src="{{ asset('assets/admin/images/' . $guru->foto) }}" style="width: 120px; height: 120px; object-fit: cover; border-radius: 10px;">
                                @else
                                    <img src="{{ asset('assets/admin/images/avatar-1.jpg') }}" style="width: 120px; height: 120px; object-fit: cover; border-radius: 10px;">
                                @endif
                            </div>

                            <table class="table table-bordered">
                                <tr><th style="width:250px;">Nama Lengkap & Gelar</th><td>{{ $guru->nama_guru }}</td></tr>
                                <tr><th>NIP</th><td>{{ $guru->nip ?? '-' }}</td></tr>
                                <tr><th>Mata Pelajaran</th><td>{{ $guru->mapel }}</td></tr>
                                <tr><th>Dibuat</th><td>{{ $guru->created_at ? $guru->created_at->format('d-m-Y H:i') : '-' }}</td></tr>
                                <tr><th>Terakhir Diubah</th><td>{{ $guru->updated_at ? $guru->updated_at->format('d-m-Y H:i') : '-' }}</td></tr>
                            </table>

                            <div class="text-end mt-3">
                                <a href="{{ route('admin.guru.addEdit', Crypt::encrypt($guru->id_guru)) }}" class="btn btn-warning">
                                    <i class="icofont icofont-edit"></i> Edit
                                </a>
                                <form action="{{ route('admin.guru.delete', Crypt::encrypt($guru->id_guru)) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data ini?')">
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
