@extends('layouts.landing')
@section('title', 'Dashboard')
@section('content')

    <div class="banner position-relative" data-aos="fade-up" data-aos-delay="100" style="height: 685px; overflow: hidden;">
        <img src="{{ asset('assets/admin/images/'. $profil->banner) }}" alt="banner"
            class="position-absolute top-0 start-0 w-100 h-100" style="object-fit: cover; z-index: 1;">

        <div class="position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-center text-white"
            style="background: rgba(0, 0, 0, 0.45); z-index: 2; padding: 0 8%;">

            <div style="max-width: 650px;">
                <p class="fw-bold mb-2" style="letter-spacing: 3px; font-size: 14px; color: #f5c518;">
                    BELAJAR & BERKARYA
                </p>

                <h1 class="fw-bold mb-3" style="font-size: 52px; line-height: 1.15; ">
                    Selamat Datang di<br>
                    Website Resmi <br>
                    {{ $profil->nama_sekolah ?? 'MTS PSA Nurul Ihsan' }}
                </h1>

                <p class="mb-4" style="font-size: 17px; line-height: 1.7; max-width: 550px;">
                    {{ $profil->text ?? '-'}}
                </p>
            </div>

        </div>
    </div>

    <section id="profil" class="py-5 bg-white" data-aos="fade-up" data-aos-delay="100">
        <div class="container">
            <div class="row align-items-center g-5">

                <div class="col-md-4 text-center">
                    @if ($profil && $profil->logo && file_exists(public_path('assets/admin/images/' . $profil->logo)))
                        <img src="{{ asset('assets/admin/images/' . $profil->logo) }}" alt="Logo Sekolah" class="img-fluid"
                            style="max-height: 320px; object-fit: contain;">
                    @else
                        <img src="{{ asset('assets/admin/images/ni.png') }}" alt="Logo Sekolah" class="img-fluid"
                            style="max-height: 320px; object-fit: contain;">
                    @endif
                </div>

                <div class="col-md-8">
                    <p class="text-warning fw-bold mb-2" style="letter-spacing: 2px; font-size: 14px;">
                        TENTANG KAMI
                    </p>
                    <h2 class="fw-bold text-success mb-3" style="font-size: 34px;">
                        Profil {{ $profil->nama_sekolah ?? 'Sekolah' }}
                    </h2>
                    <div class="mb-4"
                        style="width: 200px; height: 3px; background: linear-gradient(to right, #f5c518, transparent);">
                    </div>
                    <p class="text-muted mb-4" style="text-align: justify; line-height: 1.8;">
                        {{ $profil->deskripsi ?? 'Belum ada deskripsi profil sekolah.' }}
                    </p>

                    <a href="{{ route('public.profil') }}"
                        class="btn btn-outline-success fw-bold rounded-pill px-4 py-2 d-inline-flex align-items-center gap-2">
                        Lihat Lebih Banyak Tentang Kami <i class="fa-solid fa-chevron-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </section>

    <section class="py-5 bg-light" data-aos="fade-up" data-aos-delay="100">
        <div class="container">
            <div class="row text-center text-white rounded-3 shadow overflow-hidden" style="background: #1a7f4e;">

                <div class="col py-4 border-end border-white border-opacity-25">
                    <h2 class="fw-bold mb-1">{{ $jumlahSiswa ?? 0 }}</h2>
                    <small>Siswa</small>
                </div>

                <div class="col py-4 border-end border-white border-opacity-25">
                    <h2 class="fw-bold mb-1">{{ $jumlahGuru ?? 0 }}</h2>
                    <small>Guru & Staf</small>
                </div>

                <div class="col py-4 border-end border-white border-opacity-25">
                    <h2 class="fw-bold mb-1">{{ $jumlahEkskul ?? 0 }}</h2>
                    <small>Ekstrakurikuler</small>
                </div>

                <div class="col py-4 border-end border-white border-opacity-25">
                    <h2 class="fw-bold mb-1">{{ $jumlahBerita ?? 0 }}</h2>
                    <small>Berita</small>
                </div>

                <div class="col py-4 border-end border-white border-opacity-25">
                    <h2 class="fw-bold mb-1">{{ $jumlahGaleri ?? 0 }}</h2>
                    <small>Galeri</small>
                </div>

            </div>
        </div>
    </section>

    <section id="berita" class="py-5 bg-light" data-aos="fade-up" data-aos-delay="100">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <p class="text-warning fw-bold mb-2" style="letter-spacing: 2px; font-size: 14px;">
                        INFORMASI & PEMBARUAN
                    </p>
                    <h2 class="fw-bold text-success" style="font-size: 36px;">Berita & Artikel Sekolah</h2>
                    <div class="mb-4"
                        style="width: 350px; height: 3px; background: linear-gradient(to right, #f5c518, transparent);">
                    </div>
                </div>
                <a href="{{ route('public.berita') }}"
                    class="btn btn-outline-success fw-bold rounded-pill px-4 py-2 d-inline-flex align-items-center gap-2">
                    Lihat Semua <i class="fa-solid fa-chevron-right"></i>
                </a>
            </div>

            <div class="row g-4">

                @foreach ($berita as $b)
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        <a href="{{ route('public.berita.show', $b->slug) }}" class="text-decoration-none">
                            <div class="card hover-up h-100 border-0 shadow-sm rounded-4 overflow-hidden">

                                <div class="position-relative overflow-hidden">
                                    @if ($b->gambar && file_exists(public_path('assets/admin/images/' . $b->gambar)))
                                        <img src="{{ asset('assets/admin/images/' . $b->gambar) }}" alt="{{ $b->judul }}"
                                            class="card-img-top card-img-zoom" style="height: 220px; object-fit: cover;">
                                    @else
                                        <div class="d-flex align-items-center justify-content-center bg-secondary bg-opacity-25"
                                            style="height: 220px;">
                                            <i class="fa-solid fa-image text-muted" style="font-size: 50px;"></i>
                                        </div>
                                    @endif

                                    <span
                                        class="position-absolute top-0 end-0 m-3 badge bg-success bg-opacity-75 rounded-pill px-3 py-2">
                                        {{ \Carbon\Carbon::parse($b->tanggal)->translatedFormat('d F Y') }}
                                    </span>
                                </div>

                                <div class="card-body d-flex flex-column">
                                    <small class="text-muted mb-2">
                                        {{ $b->user->name ?? 'Admin' }}
                                    </small>

                                    <h5 class="fw-bold mb-3 text-dark">
                                        {{ $b->judul }}
                                    </h5>

                                    <p class="text-muted small mb-0">
                                        {{ \Illuminate\Support\Str::limit(strip_tags($b->isi), 120) }}
                                    </p>
                                </div>

                            </div>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    <section id="guru" class="py-5 bg-white" data-aos="fade-up" data-aos-delay="100">
        <div class="container">

            <div class="d-flex justify-content-between align-items-start mb-4 flex-wrap">
                <div>
                    <p class="text-warning fw-bold mb-2" style="letter-spacing: 2px; font-size: 14px;">
                        DAFTAR PENGAJAR
                    </p>
                    <h2 class="fw-bold text-success mb-2" style="font-size: 32px;">
                        Pendidik yang Berdedikasi
                    </h2>
                    <div class="mb-4"
                        style="width: 350px; height: 3px; background: linear-gradient(to right, #f5c518, transparent);">
                    </div>
                </div>
                <a href="{{ route('public.guru') }}"
                    class="btn btn-outline-success fw-bold rounded-pill px-4 py-2 d-inline-flex align-items-center gap-2">
                    Lihat Semua <i class="fa-solid fa-chevron-right"></i>
                </a>
            </div>

            <div class="row g-4">
                @foreach ($guru as $g)
                    <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        <a href="{{ route('public.guru.show', $g->slug) }}" class="text-decoration-none">
                            <div class="card hover-up border-0 shadow-sm rounded-4 overflow-hidden h-100 text-center">
                                <div class="overflow-hidden">
                                    @if ($g->foto && file_exists(public_path('assets/admin/images/' . $g->foto)))
                                        <img src="{{ asset('assets/admin/images/' . $g->foto) }}" alt="{{ $g->nama_guru }}"
                                            class="card-img-top card-img-zoom" style="height: 280px; object-fit: cover;">
                                    @else
                                        <div class="d-flex align-items-center justify-content-center bg-secondary bg-opacity-25"
                                            style="height: 280px;">
                                            <i class="fa-solid fa-user text-muted" style="font-size: 80px;"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="card-body">
                                    <h6 class="fw-bold mb-1 text-dark">{{ $g->nama_guru }}</h6>
                                    <small class="text-muted">{{ $g->mapel }}</small>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    <section id="ekstrakurikuler" class="py-5 bg-light" data-aos="fade-up" data-aos-delay="100">
    <div class="container">

        <div class="d-flex justify-content-between align-items-start mb-4 flex-wrap">
            <div>
                <p class="text-warning fw-bold mb-2" style="letter-spacing: 2px; font-size: 14px;">
                    WADAH PENGEMBANGAN DIRI
                </p>
                <h2 class="fw-bold text-success mb-2" style="font-size: 32px;">
                    Ekskul Pilihan Siswa
                </h2>
                <div class="mb-4"
                    style="width: 150px; height: 3px; background: linear-gradient(to right, #f5c518, transparent);">
                </div>
            </div>
            <a href="{{ route('public.ekstrakurikuler') }}"
                class="btn btn-outline-success fw-bold rounded-pill px-4 py-2 d-inline-flex align-items-center gap-2">
                Lihat Semua <i class="fa-solid fa-chevron-right"></i>
            </a>
        </div>

        <div class="row g-4">

            @foreach ($ekstrakurikuler as $e)
                <div class="col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
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

    <section id="galeri" class="py-5 bg-white" data-aos="fade-up" data-aos-delay="100">
        <div class="container">

            <div class="d-flex justify-content-between align-items-start mb-4 flex-wrap">
                <div>
                    <p class="text-warning fw-bold mb-2" style="letter-spacing: 2px; font-size: 14px;">
                        DOKUMENTASI KEGIATAN
                    </p>
                    <h2 class="fw-bold text-success mb-2" style="font-size: 32px;">
                        Galeri Sekolah
                    </h2>
                    <div class="mb-4"
                        style="width: 150px; height: 3px; background: linear-gradient(to right, #f5c518, transparent);">
                    </div>
                </div>
                <a href="{{ route('public.galeri') }}"
                    class="btn btn-outline-success fw-bold rounded-pill px-4 py-2 d-inline-flex align-items-center gap-2">
                    Lihat Semua <i class="fa-solid fa-chevron-right"></i>
                </a>
            </div>

            <div class="row g-4">

                @foreach ($galeri as $g)
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        <a href="{{ route('public.galeri.show', $g->slug) }}" class="text-decoration-none">
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

                                    <span class="position-absolute top-0 end-0 m-3 badge bg-success rounded-pill px-3 py-2">
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
