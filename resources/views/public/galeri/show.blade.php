@extends('layouts.landing')
@section('title', 'Galeri')
@section('content')
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">

                <div class="card border-0 shadow-sm rounded-4 overflow-hidden">

                    <div class="text-center bg-dark">
                        @if ($galeri->file && file_exists(public_path('assets/admin/images/' . $galeri->file)))
                            @if ($galeri->kategori == 'Foto')
                                <img src="{{ asset('assets/admin/images/' . $galeri->file) }}"
                                    alt="{{ $galeri->judul }}"
                                    class="img-fluid"
                                    style="max-height: 550px; object-fit: contain;">
                            @else
                                <video controls class="w-100" style="max-height: 550px;">
                                    <source src="{{ asset('assets/admin/images/' . $galeri->file) }}">
                                    Browser kamu tidak mendukung video.
                                </video>
                            @endif
                        @else
                            <div class="d-flex align-items-center justify-content-center text-white-50"
                                style="min-height: 300px;">
                                <i class="fa-solid fa-image" style="font-size: 80px;"></i>
                            </div>
                        @endif
                    </div>

                    <div class="card-body p-4 p-md-5">
                        <span class="badge bg-success mb-3">{{ $galeri->kategori }}</span>
                        <h2 class="fw-bold text-success mb-3">{{ $galeri->judul }}</h2>

                        <p class="text-muted small mb-4">
                            <i class="fa-solid fa-calendar text-success me-1"></i>
                            {{ \Carbon\Carbon::parse($galeri->tanggal)->translatedFormat('d F Y') }}
                        </p>
                        <p style="line-height: 1.9; text-align: justify;">
                            {{ $galeri->keterangan }}
                        </p>
                    </div>
                </div>
                <a href="{{ route('public.galeri') }}" class="btn btn-success mt-4">
                    <i class="fa-solid fa-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
