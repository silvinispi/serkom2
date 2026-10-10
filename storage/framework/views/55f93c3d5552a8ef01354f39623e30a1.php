<?php $__env->startSection('title', 'Guru'); ?>
<?php $__env->startSection('content'); ?>

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

            <?php $__currentLoopData = $guru; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-6 col-lg-3">
                    <a class="nav-link" href="<?php echo e(route('public.guru.show', $g->slug)); ?>">
                    <div class="card hover-up border-0 shadow-sm rounded-4 overflow-hidden h-100 text-center">

                        <div class="overflow-hidden">
                            <?php if($g->foto && file_exists(public_path('assets/admin/images/' . $g->foto))): ?>
                                <img src="<?php echo e(asset('assets/admin/images/' . $g->foto)); ?>"
                                    alt="<?php echo e($g->nama_guru); ?>"
                                    class="card-img-top card-img-zoom"
                                    style="height: 280px; object-fit: cover;">
                            <?php else: ?>
                                <div class="d-flex align-items-center justify-content-center bg-secondary bg-opacity-25"
                                    style="height: 280px;">
                                    <i class="fa-solid fa-user text-muted" style="font-size: 80px;"></i>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="card-body">
                            <h6 class="fw-bold mb-1"><?php echo e($g->nama_guru); ?></h6>
                            <small class="text-muted d-block mb-3"><?php echo e($g->mapel); ?></small>


                                

                        </div>
                        </a>
                    </div>
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

<?php echo $__env->make('layouts.landing', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\serkom2\resources\views/public/guru/guru.blade.php ENDPATH**/ ?>