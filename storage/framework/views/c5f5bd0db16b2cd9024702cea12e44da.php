<?php $__env->startSection('title', 'Berita'); ?>
<?php $__env->startSection('content'); ?>

<section class="py-5 bg-light">
    <div class="container">

        <div class="text-center mb-5" data-aos="fade-up">
            <p class="text-warning fw-bold mb-2" style="letter-spacing: 2px; font-size: 14px;">
                INFORMASI & PEMBARUAN
            </p>
            <h2 class="fw-bold text-success" style="font-size: 36px;">Berita</h2>
            <div class="mx-auto" style="width: 200px; height: 3px; background: linear-gradient(to right, transparent, #f5c518, transparent);"></div>
        </div>

        <div class="row g-4">

            <?php $__currentLoopData = $berita; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="<?php echo e($loop->index * 100); ?>">
                    <a href="<?php echo e(route('public.berita.show', $b->slug)); ?>" class="text-decoration-none">
                        <div class="card hover-up h-100 border-0 shadow-sm rounded-4 overflow-hidden">

                            <div class="position-relative overflow-hidden">
                                <?php if($b->gambar && file_exists(public_path('assets/admin/images/' . $b->gambar))): ?>
                                    <img src="<?php echo e(asset('assets/admin/images/' . $b->gambar)); ?>"
                                        alt="<?php echo e($b->judul); ?>"
                                        class="card-img-top card-img-zoom"
                                        style="height: 220px; object-fit: cover;">
                                <?php else: ?>
                                    <div class="d-flex align-items-center justify-content-center bg-secondary bg-opacity-25"
                                        style="height: 220px;">
                                        <i class="fa-solid fa-image text-muted" style="font-size: 50px;"></i>
                                    </div>
                                <?php endif; ?>

                                <span class="position-absolute top-0 end-0 m-3 badge bg-success bg-opacity-75 rounded-pill px-3 py-2">
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

<?php echo $__env->make('layouts.landing', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\serkom2\resources\views/public/berita/berita.blade.php ENDPATH**/ ?>