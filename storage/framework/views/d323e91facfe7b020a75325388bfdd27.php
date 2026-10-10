<?php $__env->startSection('title', 'Galeri'); ?>
<?php $__env->startSection('content'); ?>
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">

                <div class="card border-0 shadow-sm rounded-4 overflow-hidden">

                    <div class="text-center bg-dark">
                        <?php if($galeri->file && file_exists(public_path('assets/admin/images/' . $galeri->file))): ?>
                            <?php if($galeri->kategori == 'Foto'): ?>
                                <img src="<?php echo e(asset('assets/admin/images/' . $galeri->file)); ?>"
                                    alt="<?php echo e($galeri->judul); ?>"
                                    class="img-fluid"
                                    style="max-height: 550px; object-fit: contain;">
                            <?php else: ?>
                                <video controls class="w-100" style="max-height: 550px;">
                                    <source src="<?php echo e(asset('assets/admin/images/' . $galeri->file)); ?>">
                                    Browser kamu tidak mendukung video.
                                </video>
                            <?php endif; ?>
                        <?php else: ?>
                            <div class="d-flex align-items-center justify-content-center text-white-50"
                                style="min-height: 300px;">
                                <i class="fa-solid fa-image" style="font-size: 80px;"></i>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="card-body p-4 p-md-5">
                        <span class="badge bg-success mb-3"><?php echo e($galeri->kategori); ?></span>
                        <h2 class="fw-bold text-success mb-3"><?php echo e($galeri->judul); ?></h2>

                        <p class="text-muted small mb-4">
                            <i class="fa-solid fa-calendar text-success me-1"></i>
                            <?php echo e(\Carbon\Carbon::parse($galeri->tanggal)->translatedFormat('d F Y')); ?>

                        </p>
                        <p style="line-height: 1.9; text-align: justify;">
                            <?php echo e($galeri->keterangan); ?>

                        </p>
                    </div>
                </div>
                <a href="<?php echo e(route('public.galeri')); ?>" class="btn btn-success mt-4">
                    <i class="fa-solid fa-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.landing', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\serkom2\resources\views/public/galeri/show.blade.php ENDPATH**/ ?>