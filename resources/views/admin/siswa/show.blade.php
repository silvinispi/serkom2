@extends('layouts.admin')
@section('title', 'Detail Data Siswa')

@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5>Detail Data Siswa</h5>
                            <a href="{{ route('admin.siswa.index') }}" class="btn btn-secondary btn-sm">
                                <i class="icofont icofont-arrow-left"></i> Kembali
                            </a>
                        </div>
                        <div class="card-block">
                            <table class="table table-bordered">
                                <tr><th style="width:250px;">NISN</th><td>{{ $siswa->nisn }}</td></tr>
                                <tr><th>Nama Lengkap</th><td>{{ $siswa->nama_siswa }}</td></tr>
                                <tr><th>Jenis Kelamin</th><td>{{ $siswa->jenis_kelamin }}</td></tr>
                                <tr><th>Kelas</th><td>{{ $siswa->nama_kelas }}</td></tr>     {{-- ✅ accessor --}}
                                <tr><th>Tahun Masuk</th><td>{{ $siswa->tahun_masuk }}</td></tr>
                                <tr><th>Dibuat</th><td>{{ $siswa->created_at ? $siswa->created_at->format('d-m-Y H:i') : '-' }}</td></tr>
                                <tr><th>Terakhir Diubah</th><td>{{ $siswa->updated_at ? $siswa->updated_at->format('d-m-Y H:i') : '-' }}</td></tr>
                            </table>

                            <div class="text-end mt-3">
                                <a href="{{ route('admin.siswa.addEdit', Crypt::encrypt($siswa->id_siswa)) }}" class="btn btn-warning">
                                    <i class="icofont icofont-edit"></i> Edit
                                </a>
                                <form action="{{ route('admin.siswa.delete', Crypt::encrypt($siswa->id_siswa)) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data ini?')">
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