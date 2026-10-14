@extends('layouts.landing')
@section('title', 'Detail Galeri')
@section('content')
<section class="py-5 " data-aos="fade-up" data-aos-delay="100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">

                <div class="card border-0 shadow-sm rounded-4 overflow-hidden">

                    <div style="background: #ffffff; height: 450px; display: flex; align-items: center; justify-content: center; overflow: hidden;">
                        @if ($galeri->file && file_exists(public_path('assets/admin/images/' . $galeri->file)))
                            @if ($galeri->kategori == 'Foto')
                                <img src="{{ asset('assets/admin/images/' . $galeri->file) }}"
                                    alt="{{ $galeri->judul }}"
                                    style="max-height: 100%; max-width: 100%; object-fit: contain; width: auto; height: auto;">
                            @else
                                <video controls style="max-height: 100%; max-width: 100%;">
                                    <source src="{{ asset('assets/admin/images/' . $galeri->file) }}">
                                    Browser kamu tidak mendukung video.
                                </video>
                            @endif
                        @else
                            <i class="fa-solid fa-image text-muted" style="font-size: 80px;"></i>
                        @endif
                    </div>

                    <div class="card-body p-4 p-md-5">
                        <span class="badge bg-success mb-3">{{ $galeri->kategori }}</span>
                        <h2 class="fw-bold text-success mb-3">{{ $galeri->judul }}</h2>

                        <p class="text-muted small mb-4">
                            <i class="fa-solid fa-calendar-days text-success me-1"></i>
                            {{ \Carbon\Carbon::parse($galeri->tanggal)->translatedFormat('d F Y') }}
                        </p>
                        <p style="line-height: 1.9; text-align: justify;">
                            {{ $galeri->keterangan }}
                        </p>
                    </div>
                </div>
                <a href="javascript:history.back()" class="btn btn-success mt-4">
                    <i class="fa-solid fa-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
