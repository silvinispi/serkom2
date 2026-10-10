@extends('layouts.admin')
@section('title', isset($ekstrakurikuler) ? 'Edit Data Ekstrakurikuler' : 'Tambah Data Ekstrakurikuler')

@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="card">
                        <div class="card-header">
                            <h5>{{ isset($ekstrakurikuler) ? 'Edit Data Ekstrakurikuler' : 'Tambah Data Ekstrakurikuler' }}</h5>
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

                            <form action="{{ route('admin.ekstrakurikuler.save', isset($ekstrakurikuler) ? Crypt::encrypt($ekstrakurikuler->id_ekskul) : null) }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Nama Ekstrakurikuler <span class="text-danger">*</span></label>
                                    <input type="text" name="nama_ekskul" class="form-control @error('nama_ekskul') is-invalid @enderror"
                                        value="{{ old('nama_ekskul', $ekstrakurikuler->nama_ekskul ?? '') }}" required>
                                    @error('nama_ekskul') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Pembina (Guru) <span class="text-danger">*</span></label>
                                    <select name="id_guru" class="form-control @error('id_guru') is-invalid @enderror" required>
                                        <option value="">-- Pilih Guru Pembina --</option>
                                        @foreach ($guru as $g)
                                            <option value="{{ $g->id_guru }}"
                                                {{ old('id_guru', $ekstrakurikuler->id_guru ?? '') == $g->id_guru ? 'selected' : '' }}>
                                                {{ $g->nama_guru }} — {{ $g->mapel }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('id_guru') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Jadwal Latihan <span class="text-danger">*</span></label>
                                    <input type="text" name="jadwal_latihan" class="form-control @error('jadwal_latihan') is-invalid @enderror"
                                        value="{{ old('jadwal_latihan', $ekstrakurikuler->jadwal_latihan ?? '') }}"
                                        placeholder="Contoh: Kamis, 15:00 - 17:00" required>
                                    @error('jadwal_latihan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Deskripsi <span class="text-danger">*</span></label>
                                    <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror"
                                        rows="4" required>{{ old('deskripsi', $ekstrakurikuler->deskripsi ?? '') }}</textarea>
                                    @error('deskripsi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="mb-3 text-center">
                                    @if(isset($ekstrakurikuler) && $ekstrakurikuler->gambar)
                                        <div class="mb-2">
                                            <img src="{{ asset('assets/admin/images/' . $ekstrakurikuler->gambar) }}" style="width: 100px; height: 100px; object-fit: cover; border-radius: 5px;">
                                        </div>
                                    @endif
                                    <label class="form-label fw-semibold">Gambar (Opsional)</label>
                                    <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror">
                                    @error('gambar') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="text-end">
                                    <a href="{{ route('admin.ekstrakurikuler.index') }}" class="btn btn-secondary">Kembali</a>
                                    <button type="submit" class="btn btn-primary">
                                        {{ isset($ekstrakurikuler) ? 'Simpan Perubahan' : 'Simpan Data' }}
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
