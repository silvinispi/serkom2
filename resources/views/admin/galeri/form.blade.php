@extends('layouts.admin')
@section('title', isset($galeri) ? 'Edit Galeri' : 'Tambah Galeri')

@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="card">
                        <div class="card-header">
                            <h5>{{ isset($galeri) ? 'Edit Galeri' : 'Tambah Galeri' }}</h5>
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

                            <form action="{{ route('admin.galeri.save', isset($galeri) ? Crypt::encrypt($galeri->id_galeri) : null) }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Judul <span class="text-danger">*</span></label>
                                    <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror"
                                        value="{{ old('judul', $galeri->judul ?? '') }}" maxlength="50" required>
                                    @error('judul') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Keterangan <span class="text-danger">*</span></label>
                                    <textarea name="keterangan" class="form-control @error('keterangan') is-invalid @enderror"
                                        rows="4" required>{{ old('keterangan', $galeri->keterangan ?? '') }}</textarea>
                                    @error('keterangan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <!-- KATEGORI: DROPDOWN (SELECT) -->
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Kategori <span class="text-danger">*</span></label>
                                    <select name="kategori" class="form-control @error('kategori') is-invalid @enderror" required>
                                        <option value="">-- Pilih Kategori --</option>
                                        <option value="Foto"  {{ old('kategori', $galeri->kategori ?? '') == 'Foto'  ? 'selected' : '' }}>Foto</option>
                                        <option value="Video" {{ old('kategori', $galeri->kategori ?? '') == 'Video' ? 'selected' : '' }}>Video</option>
                                    </select>
                                    @error('kategori') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Tanggal <span class="text-danger">*</span></label>
                                    <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror"
                                        value="{{ old('tanggal', $galeri->tanggal ?? date('Y-m-d')) }}" required>
                                    @error('tanggal') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="mb-3 text-center">
                                    @if(isset($galeri) && $galeri->file)
                                        <div class="mb-2">
                                            @if($galeri->kategori == 'Foto')
                                                <img src="{{ asset('assets/admin/images/' . $galeri->file) }}" style="width: 100px; height: 100px; object-fit: cover; border-radius: 5px;">
                                            @else
                                                <span class="badge bg-primary">File Video: {{ $galeri->file }}</span>
                                            @endif
                                        </div>
                                    @endif
                                    <label class="form-label fw-semibold">
                                        File (Foto/Video)
                                        @if(!isset($galeri)) <span class="text-danger">*</span> @endif
                                    </label>
                                    <input type="file" name="file" class="form-control @error('file') is-invalid @enderror"
                                        accept="image/*,video/*" {{ !isset($galeri) ? 'required' : '' }}>
                                    <small class="text-secondary">
                                        @if(isset($galeri))
                                            Kosongkan jika tidak ingin mengganti file.
                                        @else
                                            Format: JPG, PNG, MP4. Maks 15MB.
                                        @endif
                                    </small>
                                    @error('file') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="text-end">
                                    <a href="{{ route('admin.galeri.index') }}" class="btn btn-secondary">Kembali</a>
                                    <button type="submit" class="btn btn-primary">
                                        {{ isset($galeri) ? 'Simpan Perubahan' : 'Simpan Data' }}
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
