@extends('layouts.admin')
@section('title', isset($user) ? 'Edit User' : 'Tambah User')

@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="card">
                        <div class="card-header">
                            <h5>{{ isset($user) ? 'Edit User' : 'Tambah User' }}</h5>
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

                            <form action="{{ route('admin.user.save', isset($user) ? Crypt::encrypt($user->id_user) : null) }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                {{-- FOTO USER --}}
                                <div class="mb-3 text-center">
                                    <label class="form-label fw-semibold d-block">Foto User</label>
                                    @if(isset($user) && $user->foto)
                                        <div class="mb-2">
                                            <img src="{{ asset('assets/admin/images/' . $user->foto) }}" alt="Foto User" class="rounded-circle img-thumbnail" style="width: 100px; height: 100px; object-fit: cover;">
                                        </div>
                                    @endif
                                    <input type="file" name="foto" class="form-control" accept="image/*">
                                    <small class="text-secondary">Kosongkan jika tidak ingin ganti.</small>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Nama Lengkap <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name', $user->name ?? '') }}" required>
                                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Username <span class="text-danger">*</span></label>
                                    <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"
                                        value="{{ old('username', $user->username ?? '') }}" required>
                                    @error('username') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">
                                        Password
                                        @if(!isset($user))
                                            <span class="text-danger">*</span>
                                        @else
                                            <small class="text-muted">(kosongkan jika tidak ingin ganti)</small>
                                        @endif
                                    </label>
                                    <div class="input-group">
                                        <input type="password" name="password" id="input-password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            placeholder="{{ isset($user) ? '••••••• (biarkan kosong)' : 'Min. 6 karakter' }}">
                                        <button type="button" class="btn btn-outline-secondary" id="toggle-password" tabindex="-1">
                                            <i class="icofont icofont-eye" id="eye-icon"></i>
                                        </button>
                                        @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Role <span class="text-danger">*</span></label>
                                    <select name="role" class="form-control @error('role') is-invalid @enderror" required>
                                        <option value="">-- Pilih Role --</option>
                                        <option value="admin"    {{ old('role', $user->role ?? '') == 'admin'    ? 'selected' : '' }}>Admin</option>
                                        <option value="operator" {{ old('role', $user->role ?? '') == 'operator' ? 'selected' : '' }}>Operator</option>
                                    </select>
                                    @error('role') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Status <span class="text-danger">*</span></label>
                                    <select name="status" class="form-control @error('status') is-invalid @enderror" required>
                                        <option value="">-- Pilih Status --</option>
                                        <option value="aktif"       {{ old('status', $user->status ?? 'aktif') == 'aktif'         ? 'selected' : '' }}>Aktif</option>
                                        <option value="tidak_aktif" {{ old('status', $user->status ?? '') == 'tidak_aktif'   ? 'selected' : '' }}>Tidak Aktif</option>
                                    </select>
                                    @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="text-end">
                                    <a href="{{ route('admin.user.index') }}" class="btn btn-secondary">Kembali</a>
                                    <button type="submit" class="btn btn-primary">
                                        {{ isset($user) ? 'Simpan Perubahan' : 'Simpan Data' }}
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
    document.addEventListener('DOMContentLoaded', function() {
        var input = document.getElementById('input-password');
        var btn   = document.getElementById('toggle-password');
        var icon  = document.getElementById('eye-icon');

        if (btn && input && icon) {
            btn.addEventListener('click', function() {
                if (input.type === 'password') {
                    input.type = 'text';
                    icon.classList.remove('icofont-eye');
                    icon.classList.add('icofont-eye-blocked');
                } else {
                    input.type = 'password';
                    icon.classList.remove('icofont-eye-blocked');
                    icon.classList.add('icofont-eye');
                }
            });
        }
    });
</script>
@endsection
