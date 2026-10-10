@extends('layouts.landing')
@section('title', 'Ekstrakurikuler')
@section('content')

    <section class="py-5" data-aos="fade-up" data-aos-delay="100">
        <div class="container">

            <div class="text-center mb-5">
                <p class="text-warning fw-bold mb-2" style="letter-spacing: 2px; font-size: 14px;">
                    PENGEMBANGAN MINAT & BAKAT
                </p>
                <h2 class="fw-bold text-success mb-3" style="font-size: 36px;">
                    Ekstrakurikuler Sekolah
                </h2>
                    <div class="mx-auto" style="width: 200px; height: 3px; background: linear-gradient(to right, transparent, #f5c518, transparent);"></div>
            </div>

            <div class="row g-4">

                @foreach ($ekstrakurikuler as $e)
                    <div class="col-md-6">
                        <div class="card hover-up border-0 shadow-sm rounded-4 overflow-hidden h-100">
                            <div class="row g-0 h-100">
                                <div class="col-md-5 d-flex align-items-center justify-content-center p-3">
                                    @if ($e->gambar && file_exists(public_path('assets/admin/images/' . $e->gambar)))
                                        <img src="{{ asset('assets/admin/images/' . $e->gambar) }}"
                                            alt="{{ $e->nama_ekskul }}"
                                            class="img-fluid rounded-3"
                                            style="max-width: 100%; max-height: 180px; object-fit: contain;">
                                    @else
                                        <div class="d-flex align-items-center justify-content-center bg-secondary bg-opacity-25 rounded-3 w-100"
                                            style="min-height: 180px;">
                                            <i class="fa-solid fa-image text-muted" style="font-size: 50px;"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-7">
                                    <div class="card-body">
                                        <h5 class="fw-bold mb-3">{{ $e->nama_ekskul }}</h5>
                                        <p class="text-muted small mb-3">
                                            <i class="fa-solid fa-user-tie"></i> Pembina:
                                            {{ $e->guru->nama_guru ?? ($e->pembina ?? '-') }}
                                        </p>
                                        <p class="text-muted small mb-3">
                                            <i class="fa-solid fa-calendar-days"></i> Jadwal Latihan:
                                            {{ $e->jadwal_latihan }}
                                        </p>
                                        <p class="text-muted small mb-3">
                                            <i class="fa-solid fa-file-lines"></i> Deskripsi :
                                            {{ $e->deskripsi }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    <style>
        .hover-up {
            transition: transform 0.4s ease, box-shadow 0.4s ease;
        }
        .hover-up:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(25, 135, 84, 0.2) !important;
        }
    </style>
@endsection
