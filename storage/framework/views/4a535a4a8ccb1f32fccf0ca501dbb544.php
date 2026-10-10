<?php $__env->startSection('title', 'Ekstrakurikuler'); ?>
<?php $__env->startSection('content'); ?>

    <section class="py-5">
        <div class="container">

            <div class="text-center mb-5">
                <p class="text-warning fw-bold mb-2" style="letter-spacing: 2px; font-size: 14px;">
                    PENGEMBANGAN MINAT & BAKAT
                </p>
                <h2 class="fw-bold text-success mb-3" style="font-size: 36px;">
                    Ekstrakurikuler Sekolah
                </h2>
                    <div class="mx-auto" style="width: 200px; height: 3px; background: linear-gradient(to right, transparent, #f5c518, transparent);"></div>
                <p class="text-muted mt-4 mx-auto" style="max-width: 700px;">
                    Kami menyediakan beragam kegiatan ekstrakurikuler sebagai wadah pengembangan minat, bakat, dan karakter
                    siswa. Melalui kegiatan di bidang seni, olahraga, kepemimpinan, dan sosial, siswa didorong untuk
                    berkembang secara aktif, kreatif, dan berprestasi baik di dalam maupun di luar sekolah.
                </p>
            </div>

            <div class="row g-4">

                <?php $__empty_1 = true; $__currentLoopData = $ekstrakurikuler; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100">
                            <div class="row g-0 h-100">
                                <div class="col-md-5">
                                    <?php if($e->gambar && file_exists(public_path('assets/admin/images/' . $e->gambar))): ?>
                                        <img src="<?php echo e(asset('assets/admin/images/' . $e->gambar)); ?>"
                                            alt="<?php echo e($e->nama_ekskul); ?>" class="img-fluid h-100 w-100"
                                            style="object-fit: cover; min-height: 200px;">
                                    <?php else: ?>
                                        <div class="d-flex align-items-center justify-content-center bg-secondary bg-opacity-25 h-100"
                                            style="min-height: 200px;">
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
                                        <a href="#" class="text-success fw-semibold text-decoration-none">
                                            Selengkapnya &raquo;
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="col-12 text-center text-muted py-5">
                        Belum ada data ekstrakurikuler.
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.landing', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\serkom2\resources\views/public/ekstrakurikuler.blade.php ENDPATH**/ ?>