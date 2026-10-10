<?php $__env->startSection('title', 'Guru'); ?>
<?php $__env->startSection('content'); ?>

    <section class="py-5">
    <div class="container">

        <div class="text-center mb-5">
            <p class="text-warning fw-bold mb-2" style="letter-spacing: 2px; font-size: 14px;">
                PROFIL TENAGA PENDIDIK
            </p>
            <h2 class="fw-bold text-success mb-3" style="font-size: 36px;">
                Guru & Staf Kami
            </h2>
            <div class="mx-auto" style="width: 200px; height: 3px; background: linear-gradient(to right, transparent, #f5c518, transparent);"></div>
            <p class="text-muted mt-4 mx-auto" style="max-width: 700px;">
                Setiap pendidik di MTS PSA Nurul Ihsan berkomitmen memberikan pengajaran terbaik dengan pendekatan yang islami, profesional, dan menyenangkan.
            </p>
        </div>

        <div class="row g-4">

            <?php $__empty_1 = true; $__currentLoopData = $guru; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="col-md-6 col-lg-3">
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100 text-center">

                        <?php if($g->foto && file_exists(public_path('assets/admin/images/' . $g->foto))): ?>
                            <img src="<?php echo e(asset('assets/admin/images/' . $g->foto)); ?>"
                                alt="<?php echo e($g->nama_guru); ?>"
                                class="card-img-top"
                                style="height: 280px; object-fit: cover;">
                        <?php else: ?>
                            <div class="d-flex align-items-center justify-content-center bg-secondary bg-opacity-25"
                                style="height: 280px;">
                                <i class="fa-solid fa-user text-muted" style="font-size: 80px;"></i>
                            </div>
                        <?php endif; ?>

                        <div class="card-body">
                            <h6 class="fw-bold mb-1"><?php echo e($g->nama_guru); ?></h6>
                            <small class="text-muted"><?php echo e($g->mapel); ?></small>
                        </div>

                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="col-12 text-center text-muted py-5">
                    Belum ada data guru.
                </div>
            <?php endif; ?>

        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.landing', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\serkom2\resources\views/public/guru.blade.php ENDPATH**/ ?>