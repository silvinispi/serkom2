<?php $__env->startSection('title', 'Galeri'); ?>
<?php $__env->startSection('content'); ?>

    <section class="py-5">
        <div class="container">

            <div class="text-center mb-5">
                <p class="text-warning fw-bold mb-2" style="letter-spacing: 2px; font-size: 14px;">
                    DOKUMENTASI KEGIATAN
                </p>
                <h2 class="fw-bold text-success mb-3" style="font-size: 36px;">
                    Galeri Sekolah
                </h2>
                        <div class="mx-auto" style="width: 200px; height: 3px; background: linear-gradient(to right, transparent, #f5c518, transparent);"></div>
                <p class="text-muted mt-4 mx-auto" style="max-width: 700px;">
                    Jelajahi momen-momen berharga yang terdokumentasi dari berbagai kegiatan siswa, mulai dari acara resmi,
                    perlombaan, hingga aktivitas harian di madrasah.
                </p>
            </div>

            <div class="row g-4">

                <?php $__empty_1 = true; $__currentLoopData = $galeri; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100">

                            <div class="position-relative">
                                <?php if($g->file && file_exists(public_path('assets/admin/images/' . $g->file))): ?>
                                    <?php if($g->kategori == 'Foto'): ?>
                                        <img src="<?php echo e(asset('assets/admin/images/' . $g->file)); ?>" alt="<?php echo e($g->judul); ?>"
                                            class="card-img-top" style="height: 220px; object-fit: cover;">
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

                                <span
                                    class="position-absolute top-0 end-0 m-3 badge bg-success bg-opacity-75 rounded-pill px-3 py-2">
                                    <?php echo e(\Carbon\Carbon::parse($g->tanggal)->translatedFormat('d F Y')); ?>

                                </span>
                            </div>

                            <div class="card-body d-flex flex-column">
                                <small class="text-success fw-semibold mb-1"><?php echo e($g->kategori); ?></small>
                                <h6 class="fw-bold mb-2"><?php echo e($g->judul); ?></h6>
                                <p class="text-muted small mb-0">
                                    <?php echo e(\Illuminate\Support\Str::limit($g->keterangan, 100)); ?>

                                </p>
                            </div>

                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="col-12 text-center text-muted py-5">
                        Belum ada data galeri.
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.landing', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\serkom2\resources\views/public/galeri.blade.php ENDPATH**/ ?>