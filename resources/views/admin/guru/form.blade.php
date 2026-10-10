@extends('layouts.admin')
@section('title', isset($guru) ? 'Edit Data Guru' : 'Tambah Data Guru')

@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="card">
                        <div class="card-header">
                            <h5>{{ isset($guru) ? 'Edit Data Guru' : 'Tambah Data Guru' }}</h5>
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

                            <form action="{{ route('admin.guru.save', isset($guru) ? Crypt::encrypt($guru->id_guru) : null) }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Nama Lengkap & Gelar <span class="text-danger">*</span></label>
                                    <input type="text" name="nama_guru" class="form-control @error('nama_guru') is-invalid @enderror"
                                        value="{{ old('nama_guru', $guru->nama_guru ?? '') }}" required>
                                    @error('nama_guru') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">NIP</label>
                                    <input type="text" name="nip" class="form-control @error('nip') is-invalid @enderror"
                                        value="{{ old('nip', $guru->nip ?? '') }}">
                                    @error('nip') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Mata Pelajaran <span class="text-danger">*</span></label>
                                    <input type="text" name="mapel" class="form-control @error('mapel') is-invalid @enderror"
                                        value="{{ old('mapel', $guru->mapel ?? '') }}" required>
                                    @error('mapel') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="mb-3 text-center">
                                    @if(isset($guru) && $guru->foto)
                                        <div class="mb-2">
                                            <img src="{{ asset('assets/admin/images/' . $guru->foto) }}" style="width: 80px; height: 80px; object-fit: cover; border-radius: 5px;">
                                        </div>
                                    @endif
                                    <label class="form-label fw-semibold">Foto (Opsional)</label>
                                    <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror">
                                    @error('foto') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="text-end">
                                    <a href="{{ route('admin.guru.index') }}" class="btn btn-secondary">Kembali</a>
                                    <button type="submit" class="btn btn-primary">
                                        {{ isset($guru) ? 'Simpan Perubahan' : 'Simpan Data' }}
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
