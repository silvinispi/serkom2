<?php $__env->startSection('title', 'Galeri'); ?>
<?php $__env->startSection('content'); ?>

<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">

                <div class="card border-0 shadow-sm rounded-4 overflow-hidden">

                    <div class="text-center bg-dark">
                        <?php if($berita->gambar && file_exists(public_path('assets/admin/images/' . $berita->gambar))): ?>
                            <img src="<?php echo e(asset('assets/admin/images/' . $berita->gambar)); ?>"
                                alt="<?php echo e($berita->judul); ?>"
                                class="img-fluid"
                                style="max-height: 550px; width: 100%; object-fit: cover;">
                        <?php else: ?>
                            <div class="d-flex align-items-center justify-content-center text-white-50"
                                style="min-height: 300px;">
                                <i class="fa-solid fa-image" style="font-size: 80px;"></i>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="card-body p-4 p-md-5">

                        <h2 class="fw-bold text-success mb-3"><?php echo e($berita->judul); ?></h2>

                        <div class="py-2 d-flex flex-wrap gap-4 mb-4 text-muted small">
                            <span>
                                <i class="fa-solid fa-calendar text-success me-1"></i>
                                <?php echo e(\Carbon\Carbon::parse($berita->tanggal)->translatedFormat('d F Y')); ?>

                            </span>
                            <span>
                                <i class="fa-solid fa-user text-success me-1"></i>
                                <?php echo e($berita->user->name ?? 'Admin'); ?>

                            </span>
                        </div>

                        <div style="line-height: 1.9; text-align: justify;">
                            <?php echo e(($berita->isi ?? '-' )); ?>

                        </div>

                    </div>
                </div>

                <a href="<?php echo e(route('public.berita')); ?>" class="btn btn-success mt-4">
                    <i class="fa-solid fa-arrow-left"></i> Kembali
                </a>

            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.landing', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\serkom2\resources\views/public/berita/show.blade.php ENDPATH**/ ?>