<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('content'); ?>

    <div class="banner position-relative" data-aos="fade-up" data-aos-delay="100" style="height: 685px; overflow: hidden;">
        <img src="<?php echo e(asset('assets/admin/images/'. $profil->banner)); ?>" alt="banner"
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
                    <?php echo e($profil->nama_sekolah ?? 'MTS PSA Nurul Ihsan'); ?>

                </h1>

                <p class="mb-4" style="font-size: 17px; line-height: 1.7; max-width: 550px;">
                    <?php echo e($profil->text ?? '-'); ?>

                </p>
            </div>

        </div>
    </div>

    <section id="profil" class="py-5 bg-white" data-aos="fade-up" data-aos-delay="100">
        <div class="container">
            <div class="row align-items-center g-5">

                <div class="col-md-4 text-center">
                    <?php if($profil && $profil->logo && file_exists(public_path('assets/admin/images/' . $profil->logo))): ?>
                        <img src="<?php echo e(asset('assets/admin/images/' . $profil->logo)); ?>" alt="Logo Sekolah" class="img-fluid"
                            style="max-height: 320px; object-fit: contain;">
                    <?php else: ?>
                        <img src="<?php echo e(asset('assets/admin/images/ni.png')); ?>" alt="Logo Sekolah" class="img-fluid"
                            style="max-height: 320px; object-fit: contain;">
                    <?php endif; ?>
                </div>

                <div class="col-md-8">
                    <p class="text-warning fw-bold mb-2" style="letter-spacing: 2px; font-size: 14px;">
                        TENTANG KAMI
                    </p>
                    <h2 class="fw-bold text-success mb-3" style="font-size: 34px;">
                        Profil <?php echo e($profil->nama_sekolah ?? 'Sekolah'); ?>

                    </h2>
                    <div class="mb-4"
                        style="width: 200px; height: 3px; background: linear-gradient(to right, #f5c518, transparent);">
                    </div>
                    <p class="text-muted mb-4" style="text-align: justify; line-height: 1.8;">
                        <?php echo e($profil->deskripsi ?? 'Belum ada deskripsi profil sekolah.'); ?>

                    </p>

                    <a href="<?php echo e(route('public.profil')); ?>"
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
                    <h2 class="fw-bold mb-1"><?php echo e($jumlahSiswa ?? 0); ?></h2>
                    <small>Siswa</small>
                </div>

                <div class="col py-4 border-end border-white border-opacity-25">
                    <h2 class="fw-bold mb-1"><?php echo e($jumlahGuru ?? 0); ?></h2>
                    <small>Guru & Staf</small>
                </div>

                <div class="col py-4 border-end border-white border-opacity-25">
                    <h2 class="fw-bold mb-1"><?php echo e($jumlahEkskul ?? 0); ?></h2>
                    <small>Ekstrakurikuler</small>
                </div>

                <div class="col py-4 border-end border-white border-opacity-25">
                    <h2 class="fw-bold mb-1"><?php echo e($jumlahBerita ?? 0); ?></h2>
                    <small>Berita</small>
                </div>

                <div class="col py-4 border-end border-white border-opacity-25">
                    <h2 class="fw-bold mb-1"><?php echo e($jumlahGaleri ?? 0); ?></h2>
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
                <a href="<?php echo e(route('public.berita')); ?>"
                    class="btn btn-outline-success fw-bold rounded-pill px-4 py-2 d-inline-flex align-items-center gap-2">
                    Lihat Semua <i class="fa-solid fa-chevron-right"></i>
                </a>
            </div>

            <div class="row g-4">

                <?php $__currentLoopData = $berita; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="<?php echo e($loop->index * 100); ?>">
                        <a href="<?php echo e(route('public.berita.show', $b->slug)); ?>" class="text-decoration-none">
                            <div class="card hover-up h-100 border-0 shadow-sm rounded-4 overflow-hidden">

                                <div class="position-relative overflow-hidden">
                                    <?php if($b->gambar && file_exists(public_path('assets/admin/images/' . $b->gambar))): ?>
                                        <img src="<?php echo e(asset('assets/admin/images/' . $b->gambar)); ?>" alt="<?php echo e($b->judul); ?>"
                                            class="card-img-top card-img-zoom" style="height: 220px; object-fit: cover;">
                                    <?php else: ?>
                                        <div class="d-flex align-items-center justify-content-center bg-secondary bg-opacity-25"
                                            style="height: 220px;">
                                            <i class="fa-solid fa-image text-muted" style="font-size: 50px;"></i>
                                        </div>
                                    <?php endif; ?>

                                    <span
                                        class="position-absolute top-0 end-0 m-3 badge bg-success bg-opacity-75 rounded-pill px-3 py-2">
                                        <?php echo e(\Carbon\Carbon::parse($b->tanggal)->translatedFormat('d F Y')); ?>

                                    </span>
                                </div>

                                <div class="card-body d-flex flex-column">
                                    <small class="text-muted mb-2">
                                        <?php echo e($b->user->name ?? 'Admin'); ?>

                                    </small>

                                    <h5 class="fw-bold mb-3 text-dark">
                                        <?php echo e($b->judul); ?>

                                    </h5>

                                    <p class="text-muted small mb-0">
                                        <?php echo e(\Illuminate\Support\Str::limit(strip_tags($b->isi), 120)); ?>

                                    </p>
                                </div>

                            </div>
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
                <a href="<?php echo e(route('public.guru')); ?>"
                    class="btn btn-outline-success fw-bold rounded-pill px-4 py-2 d-inline-flex align-items-center gap-2">
                    Lihat Semua <i class="fa-solid fa-chevron-right"></i>
                </a>
            </div>

            <div class="row g-4">
                <?php $__currentLoopData = $guru; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="<?php echo e($loop->index * 100); ?>">
                        <a href="<?php echo e(route('public.guru.show', $g->slug)); ?>" class="text-decoration-none">
                            <div class="card hover-up border-0 shadow-sm rounded-4 overflow-hidden h-100 text-center">
                                <div class="overflow-hidden">
                                    <?php if($g->foto && file_exists(public_path('assets/admin/images/' . $g->foto))): ?>
                                        <img src="<?php echo e(asset('assets/admin/images/' . $g->foto)); ?>" alt="<?php echo e($g->nama_guru); ?>"
                                            class="card-img-top card-img-zoom" style="height: 280px; object-fit: cover;">
                                    <?php else: ?>
                                        <div class="d-flex align-items-center justify-content-center bg-secondary bg-opacity-25"
                                            style="height: 280px;">
                                            <i class="fa-solid fa-user text-muted" style="font-size: 80px;"></i>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="card-body">
                                    <h6 class="fw-bold mb-1 text-dark"><?php echo e($g->nama_guru); ?></h6>
                                    <small class="text-muted"><?php echo e($g->mapel); ?></small>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
            <a href="<?php echo e(route('public.ekstrakurikuler')); ?>"
                class="btn btn-outline-success fw-bold rounded-pill px-4 py-2 d-inline-flex align-items-center gap-2">
                Lihat Semua <i class="fa-solid fa-chevron-right"></i>
            </a>
        </div>

        <div class="row g-4">

            <?php $__currentLoopData = $ekstrakurikuler; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-6" data-aos="fade-up" data-aos-delay="<?php echo e($loop->index * 100); ?>">
                    <div class="card hover-up border-0 shadow-sm rounded-4 overflow-hidden h-100">
                        <div class="row g-0 h-100">
                            <div class="col-md-5 d-flex align-items-center justify-content-center p-3">
                                <?php if($e->gambar && file_exists(public_path('assets/admin/images/' . $e->gambar))): ?>
                                    <img src="<?php echo e(asset('assets/admin/images/' . $e->gambar)); ?>"
                                        alt="<?php echo e($e->nama_ekskul); ?>"
                                        class="img-fluid rounded-3"
                                        style="max-width: 100%; max-height: 180px; object-fit: contain;">
                                <?php else: ?>
                                    <div class="d-flex align-items-center justify-content-center bg-secondary bg-opacity-25 rounded-3 w-100"
                                        style="min-height: 180px;">
                                        <i class="fa-solid fa-image text-muted" style="font-size: 50px;"></i>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-7">
                                <div class="card-body">
                                    <h5 class="fw-bold mb-3"><?php echo e($e->nama_ekskul); ?></h5>
                                    <p class="text-muted small mb-3">
                                        <i class="fa-solid fa-user-tie"></i> Pembina:
                                        <?php echo e($e->guru->nama_guru ?? ($e->pembina ?? '-')); ?>

                                    </p>
                                    <p class="text-muted small mb-3">
                                        <i class="fa-solid fa-calendar-days"></i> Jadwal Latihan:
                                        <?php echo e($e->jadwal_latihan); ?>

                                    </p>
                                    <p class="text-muted small mb-3">
                                        <i class="fa-solid fa-file-lines"></i> Deskripsi :
                                        <?php echo e($e->deskripsi); ?>

                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
                <a href="<?php echo e(route('public.galeri')); ?>"
                    class="btn btn-outline-success fw-bold rounded-pill px-4 py-2 d-inline-flex align-items-center gap-2">
                    Lihat Semua <i class="fa-solid fa-chevron-right"></i>
                </a>
            </div>

            <div class="row g-4">

                <?php $__currentLoopData = $galeri; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="<?php echo e($loop->index * 100); ?>">
                        <a href="<?php echo e(route('public.galeri.show', $g->slug)); ?>" class="text-decoration-none">
                            <div class="card hover-up border-0 shadow-sm rounded-4 overflow-hidden h-100">

                                <div class="position-relative overflow-hidden">
                                    <?php if($g->file && file_exists(public_path('assets/admin/images/' . $g->file))): ?>
                                        <?php if($g->kategori == 'Foto'): ?>
                                            <img src="<?php echo e(asset('assets/admin/images/' . $g->file)); ?>"
                                                alt="<?php echo e($g->judul); ?>" class="card-img-top card-img-zoom"
                                                style="height: 220px; object-fit: cover;">
                                        <?php else: ?>
                                            <video controls class="w-100" style="height: 220px; object-fit: cover;">
                                                <source src="<?php echo e(asset('assets/admin/images/' . $g->file)); ?>">
                                            </video>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <div class="d-flex align-items-center justify-content-center bg-secondary bg-opacity-25"
                                            style="height: 220px;">
                                            <i class="fa-solid fa-image text-muted" style="font-size: 50px;"></i>
                                        </div>
                                    <?php endif; ?>

                                    <span class="position-absolute top-0 end-0 m-3 badge bg-success rounded-pill px-3 py-2">
                                        <?php echo e(\Carbon\Carbon::parse($g->tanggal)->translatedFormat('d F Y')); ?>

                                    </span>
                                </div>

                                <div class="card-body d-flex flex-column">
                                    <small class="text-success fw-semibold mb-1"><?php echo e($g->kategori); ?></small>
                                    <h6 class="fw-bold mb-2 text-dark"><?php echo e($g->judul); ?></h6>
                                    <p class="text-muted small mb-0">
                                        <?php echo e(\Illuminate\Support\Str::limit($g->keterangan, 100)); ?>

                                    </p>
                                </div>

                            </div>
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.landing', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\serkom2\resources\views/public/dashboard.blade.php ENDPATH**/ ?>