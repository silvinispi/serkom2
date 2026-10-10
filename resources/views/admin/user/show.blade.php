@extends('layouts.admin')
@section('title', 'Detail User')

@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5>Detail User</h5>
                            <a href="{{ route('admin.user.index') }}" class="btn btn-secondary btn-sm">
                                <i class="icofont icofont-arrow-left"></i> Kembali
                            </a>
                        </div>
                        <div class="card-block">

                            {{-- FOTO USER --}}
                            <div class="text-center mb-4">
                                @if($user->foto && file_exists(public_path('assets/admin/images/' . $user->foto)))
                                    <img src="{{ asset('assets/admin/images/' . $user->foto) }}"
                                        alt="Foto User"
                                        class="rounded-circle img-thumbnail"
                                        style="width: 130px; height: 130px; object-fit: cover;">
                                @else
                                    <div class="rounded-circle bg-light d-inline-flex align-items-center justify-content-center"
                                        style="width: 130px; height: 130px; font-size: 3rem; color: #999;">
                                        <i class="icofont icofont-user"></i>
                                    </div>
                                @endif
                            </div>

                            <table class="table table-bordered">
                                <tr>
                                    <th style="width:250px;">Nama Lengkap</th>
                                    <td>{{ $user->name ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Username</th>
                                    <td>{{ $user->username }}</td>
                                </tr>
                                <tr>
                                    <th>Role</th>
                                    <td>
                                        @if($user->role === 'admin')
                                            <span class="badge bg-primary">Admin</span>
                                        @else
                                            <span class="badge bg-warning">Operator</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>
                                        @if($user->status === 'aktif')
                                            <span class="badge bg-success">Aktif</span>
                                        @else
                                            <span class="badge bg-danger">Tidak Aktif</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Dibuat</th>
                                    <td>{{ $user->created_at ? $user->created_at->format('d-m-Y H:i') : '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Terakhir Diubah</th>
                                    <td>{{ $user->updated_at ? $user->updated_at->format('d-m-Y H:i') : '-' }}</td>
                                </tr>
                            </table>

                            <div class="text-end mt-3">
                                <a href="{{ route('admin.user.addEdit', Crypt::encrypt($user->id_user)) }}" class="btn btn-warning">
                                    <i class="icofont icofont-edit"></i> Edit
                                </a>
                                <form action="{{ route('admin.user.delete', Crypt::encrypt($user->id_user)) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data ini?')">
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
