@extends('layouts.landing')
@section('title', 'Galeri')
@section('content')

    <style>
        .hover-up {
            transition: transform 0.4s ease, box-shadow 0.4s ease;
        }
        .hover-up:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(25, 135, 84, 0.2) !important;
        }
        .card-img-zoom {
            transition: transform 0.5s ease;
        }
        .hover-up:hover .card-img-zoom {
            transform: scale(1.08);
        }
    </style>
    
    <section class="py-5" data-aos="fade-up" data-aos-delay="100">
        <div class="container">

            <div class="text-center mb-5">
                <p class="text-warning fw-bold mb-2" style="letter-spacing: 2px; font-size: 14px;">
                    DOKUMENTASI KEGIATAN
                </p>
                <h2 class="fw-bold text-success mb-3" style="font-size: 36px;">
                    Galeri Sekolah
                </h2>
                <div class="mx-auto"
                    style="width: 200px; height: 3px; background: linear-gradient(to right, transparent, #f5c518, transparent);">
                </div>
            </div>

            <div class="row g-4">

                @foreach ($galeri as $g)
                    <div class="col-md-6 col-lg-4">
                        <a class="nav-link" href="{{ route('public.galeri.show', $g->slug) }}">
                        <div class="card hover-up border-0 shadow-sm rounded-4 overflow-hidden h-100">
                            <div class="position-relative overflow-hidden">
                                @if ($g->file && file_exists(public_path('assets/admin/images/' . $g->file)))
                                    @if ($g->kategori == 'Foto')
                                        <img src="{{ asset('assets/admin/images/' . $g->file) }}"
                                            alt="{{ $g->judul }}" class="card-img-top card-img-zoom"
                                            style="height: 220px; object-fit: cover;">
                                    @else
                                        <video controls class="w-100" style="height: 220px; object-fit: cover;">
                                            <source src="{{ asset('assets/admin/images/' . $g->file) }}">
                                        </video>
                                    @endif
                                @else
                                    <div class="d-flex align-items-center justify-content-center bg-secondary bg-opacity-25"
                                        style="height: 220px;">
                                        <i class="fa-solid fa-image text-muted" style="font-size: 50px;"></i>
                                    </div>
                                @endif
                                <span
                                    class="position-absolute top-0 end-0 m-3 badge bg-success bg-opacity-75 rounded-pill px-3 py-2">
                                    {{ \Carbon\Carbon::parse($g->tanggal)->translatedFormat('d F Y') }}
                                </span>
                            </div>
                            <div class="card-body d-flex flex-column">
                                <small class="text-success fw-semibold mb-1">{{ $g->kategori }}</small>
                                <h6 class="fw-bold mb-2 text-dark">{{ $g->judul }}</h6>
                                <p class="text-muted small mb-0">
                                    {{ \Illuminate\Support\Str::limit($g->keterangan, 100) }}
                                </p>

                            </div>
                        </div>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

@endsection
