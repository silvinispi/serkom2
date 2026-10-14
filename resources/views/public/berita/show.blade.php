@extends('layouts.landing')
@section('title', 'Detail Berita')
@section('content')

    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">

                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden" data-aos="fade-up" data-aos-delay="100">

                        <div class="text-center bg-dark d-flex align-items-center justify-content-center">
                            @if ($berita->gambar && file_exists(public_path('assets/admin/images/' . $berita->gambar)))
                                <img src="{{ asset('assets/admin/images/' . $berita->gambar) }}" alt="{{ $berita->judul }}"
                                    class="img-fluid" style="max-height: 550px; width: 100%; object-fit: contain;">
                            @else
                                <div class="d-flex align-items-center justify-content-center text-white-50 py-5">
                                    <i class="fa-solid fa-image" style="font-size: 80px;"></i>
                                </div>
                            @endif
                        </div>

                        <div class="card-body p-4 p-md-5">

                            <h2 class="fw-bold text-success mb-3">{{ $berita->judul }}</h2>

                            <div class="py-2 d-flex flex-wrap gap-4 mb-4 text-muted small">
                                <span>
                                    <i class="fa-solid fa-calendar-days text-success me-1"></i>
                                    {{ \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('d F Y') }}
                                </span>
                                <span>
                                    <i class="fa-solid fa-user text-success me-1"></i>
                                    {{ $berita->user->name ?? 'Admin' }}
                                </span>
                            </div>

                            <div style="line-height: 1.9; text-align: justify;">
                                {!! nl2br(e($berita->isi ?? '-')) !!}
                            </div>

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
