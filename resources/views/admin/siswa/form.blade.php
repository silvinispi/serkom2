@extends('layouts.admin')
@section('title', isset($siswa) ? 'Edit Data Siswa' : 'Tambah Data Siswa')

@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="card">
                        <div class="card-header">
                            <h5>{{ isset($siswa) ? 'Edit Data Siswa' : 'Tambah Data Siswa' }}</h5>
                        </div>
                        <div class="card-block">

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('admin.siswa.save', isset($siswa) ? Crypt::encrypt($siswa->id_siswa) : null) }}" method="POST">
                                @csrf

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">NISN <span class="text-danger">*</span></label>
                                    <input type="text" name="nisn" class="form-control @error('nisn') is-invalid @enderror"
                                        value="{{ old('nisn', $siswa->nisn ?? '') }}" maxlength="10" required>
                                    @error('nisn') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Nama Lengkap <span class="text-danger">*</span></label>
                                    <input type="text" name="nama_siswa" class="form-control @error('nama_siswa') is-invalid @enderror"
                                        value="{{ old('nama_siswa', $siswa->nama_siswa ?? '') }}" required>
                                    @error('nama_siswa') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Jenis Kelamin <span class="text-danger">*</span></label>
                                    <div style="display: flex; gap: 30px; align-items: center;">
                                        <label style="cursor: pointer; font-weight: normal; margin-bottom: 0;">
                                            <input type="radio" name="jenis_kelamin" value="Laki-Laki"
                                                {{ old('jenis_kelamin', $siswa->jenis_kelamin ?? 'Laki-Laki') == 'Laki-Laki' ? 'checked' : '' }} required>
                                            Laki-Laki
                                        </label>
                                        <label style="cursor: pointer; font-weight: normal; margin-bottom: 0;">
                                            <input type="radio" name="jenis_kelamin" value="Perempuan"
                                                {{ old('jenis_kelamin', $siswa->jenis_kelamin ?? '') == 'Perempuan' ? 'checked' : '' }} required>
                                            Perempuan
                                        </label>
                                    </div>
                                    @error('jenis_kelamin') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Tahun Masuk <span class="text-danger">*</span></label>
                                    <input type="number" name="tahun_masuk" class="form-control @error('tahun_masuk') is-invalid @enderror"
                                        value="{{ old('tahun_masuk', $siswa->tahun_masuk ?? date('Y')) }}" min="2000" max="2100" required>
                                    @error('tahun_masuk') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="text-end">
                                    <a href="{{ route('admin.siswa.index') }}" class="btn btn-secondary">Kembali</a>
                                    <button type="submit" class="btn btn-primary">
                                        {{ isset($siswa) ? 'Simpan Perubahan' : 'Simpan Data' }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
