@extends('layouts.admin')
@section('title', isset($berita) ? 'Edit Berita' : 'Tambah Berita')

@section('content')
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <div class="page-body">
                        <div class="card">
                            <div class="card-header">
                                <h5>{{ isset($berita) ? 'Edit Berita' : 'Tambah Berita' }}</h5>
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

                                <form
                                    action="{{ route('admin.berita.save', isset($berita) ? Crypt::encrypt($berita->id_berita) : null) }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Judul <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="judul"
                                            class="form-control @error('judul') is-invalid @enderror"
                                            value="{{ old('judul', $berita->judul ?? '') }}" maxlength="50" required>
                                        @error('judul')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Isi Berita <span
                                                class="text-danger">*</span></label>
                                        <textarea name="isi" class="form-control @error('isi') is-invalid @enderror" rows="6" required>{{ old('isi', $berita->isi ?? '') }}</textarea>
                                        @error('isi')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Tanggal <span
                                                class="text-danger">*</span></label>
                                        <input type="date" name="tanggal"
                                            class="form-control @error('tanggal') is-invalid @enderror"
                                            value="{{ old('tanggal', $berita->tanggal ?? date('Y-m-d')) }}" required>
                                        @error('tanggal')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Gambar</label>
                                        <input type="file" name="gambar" id="input-gambar"
                                            class="form-control @error('gambar') is-invalid @enderror" accept="image/*">
                                        <small class="text-muted">
                                            Format: JPG, PNG. Maks 2MB.
                                            @if (isset($berita))
                                                Kosongkan jika tidak ingin ganti.
                                            @endif
                                        </small>
                                        @error('gambar')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div id="preview-wrapper"
                                        class="{{ isset($berita) && $berita->gambar ? '' : 'd-none' }} mb-3 text-center">
                                        <span class="small fw-bold text-muted d-block mb-2">Pratinjau Gambar:</span>
                                        <img id="img-preview"
                                            src="{{ isset($berita) && $berita->gambar ? asset('assets/admin/images/' . $berita->gambar) : '' }}"
                                            alt="Preview Image" class="img-fluid rounded-3 shadow-sm"
                                            style="max-height: 300px; object-fit: cover;">
                                    </div>

                                    @if (strcasecmp(Auth::user()->role, 'admin') === 0)
                                        <div class="mb-3">
                                            <label class="form-label fw-semibold">Penulis <span
                                                    class="text-danger">*</span></label>
                                            <select name="id_user"
                                                class="form-control @error('id_user') is-invalid @enderror" required>
                                                <option value="">-- Pilih Penulis --</option>
                                                @foreach ($users as $u)
                                                    <option value="{{ $u->id_user }}"
                                                        {{ old('id_user', $berita->id_user ?? '') == $u->id_user ? 'selected' : '' }}>
                                                        {{ $u->name }} ({{ $u->username }})
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('id_user')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    @else
                                        <input type="hidden" name="id_user" value="{{ Auth::user()->id_user }}">
                                    @endif

                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Status <span
                                                class="text-danger">*</span></label>
                                        <select name="status" class="form-control @error('status') is-invalid @enderror"
                                            required>
                                            <option value="">-- Pilih Status --</option>
                                            <option value="draft"
                                                {{ old('status', $berita->status ?? 'draft') == 'draft' ? 'selected' : '' }}>
                                                Draft</option>
                                            <option value="publish"
                                                {{ old('status', $berita->status ?? '') == 'publish' ? 'selected' : '' }}>
                                                Publish</option>
                                        </select>
                                        @error('status')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="text-end">
                                        <a href="{{ route('admin.berita.index') }}" class="btn btn-secondary">Kembali</a>
                                        <button type="submit" class="btn btn-primary">
                                            {{ isset($berita) ? 'Simpan Perubahan' : 'Simpan Data' }}
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

    <script>
        document.getElementById('input-gambar').addEventListener('change', function(event) {
            var file = event.target.files[0];
            var wrapper = document.getElementById('preview-wrapper');
            var preview = document.getElementById('img-preview');

            if (file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    wrapper.classList.remove('d-none');
                };
                reader.readAsDataURL(file);
            } else {
                wrapper.classList.add('d-none');
                preview.src = '';
            }
        });
    </script>
@endsection
