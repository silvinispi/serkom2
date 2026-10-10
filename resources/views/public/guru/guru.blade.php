@extends('layouts.landing')
@section('title', 'Guru')
@section('content')

<section class="py-5" data-aos="fade-up" data-aos-delay="100">
    <div class="container">

        <div class="text-center mb-5">
            <p class="text-warning fw-bold mb-2" style="letter-spacing: 2px; font-size: 14px;">
                PROFIL TENAGA PENDIDIK
            </p>
            <h2 class="fw-bold text-success mb-3" style="font-size: 36px;">
                Guru & Staf Kami
            </h2>
            <div class="mx-auto" style="width: 200px; height: 3px; background: linear-gradient(to right, transparent, #f5c518, transparent);"></div>

        </div>

        <div class="row g-4">

            @foreach ($guru as $g)
                <div class="col-md-6 col-lg-3">
                    <a class="nav-link" href="{{ route('public.guru.show', $g->slug) }}">
                    <div class="card hover-up border-0 shadow-sm rounded-4 overflow-hidden h-100 text-center">

                        <div class="overflow-hidden">
                            @if ($g->foto && file_exists(public_path('assets/admin/images/' . $g->foto)))
                                <img src="{{ asset('assets/admin/images/' . $g->foto) }}"
                                    alt="{{ $g->nama_guru }}"
                                    class="card-img-top card-img-zoom"
                                    style="height: 280px; object-fit: cover;">
                            @else
                                <div class="d-flex align-items-center justify-content-center bg-secondary bg-opacity-25"
                                    style="height: 280px;">
                                    <i class="fa-solid fa-user text-muted" style="font-size: 80px;"></i>
                                </div>
                            @endif
                        </div>

                        <div class="card-body">
                            <h6 class="fw-bold mb-1">{{ $g->nama_guru }}</h6>
                            <small class="text-muted d-block mb-3">{{ $g->mapel }}</small>


                                {{-- class="text-success fw-semibold text-decoration-none">
                                Lihat Detail... --}}

                        </div>
                        </a>
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
    .card-img-zoom {
        transition: transform 0.5s ease;
    }
    .hover-up:hover .card-img-zoom {
        transform: scale(1.08);
    }
</style>
@endsection
