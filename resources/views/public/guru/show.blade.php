@extends('layouts.landing')
@section('title', 'Guru')
@section('content')

<section class="py-5">
    <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                        <div class="row g-0">
                            <div class="col-md-4">
                                @if ($guru->foto && file_exists(public_path('assets/admin/images/' . $guru->foto)))
                                    <img src="{{ asset('assets/admin/images/' . $guru->foto) }}" alt="{{ $guru->nama_guru }}"
                                        class="img-fluid h-100 w-100" style="object-fit: cover; min-height: 400px;">
                                @else
                                    <div class="d-flex align-items-center justify-content-center bg-secondary bg-opacity-25 h-100"
                                        style="min-height: 400px;">
                                        <i class="fa-solid fa-user text-muted" style="font-size: 120px;"></i>
                                    </div>
                                @endif
                            </div>

                            <div class="col-md-8">
                                <div class="card-body p-4 p-md-5">

                                    <p class="text-warning fw-bold mb-2" style="letter-spacing: 2px; font-size: 13px;">
                                        PROFIL GURU
                                    </p>
                                    <h2 class="fw-bold text-success mb-3">{{ $guru->nama_guru }}</h2>
                                    <div class="mb-4"
                                        style="width: 200px; height: 3px; background: linear-gradient(to right, #f5c518, transparent);">
                                    </div>
                                        <table class="table table-borderless mb-0">
                                        <tr>
                                            <th style="width: 200px;">
                                                <i class="fa-solid fa-book text-success me-2"></i> Mata Pelajaran
                                            </th>
                                            <td>: {{ $guru->mapel ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <i class="fa-solid fa-id-card text-success me-2"></i> NIP
                                            </th>
                                            <td>: {{ $guru->nip ?? '-' }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('public.guru') }}" class="btn btn-success mt-4">
                        <i class="fa-solid fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>
    </div>
    </section>
@endsection
