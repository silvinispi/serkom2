<?php $__env->startSection('title', 'Profil'); ?>
<?php $__env->startSection('content'); ?>

    <section class="container py-5" data-aos="fade-up" data-aos-delay="100">
        

        <div class="row justify-content-center mb-5">
            <div class="col-md-8 text-center">
                <?php if($profil->logo && file_exists(public_path('assets/admin/images/' . $profil->logo))): ?>
                    <img src="<?php echo e(asset('assets/admin/images/' . $profil->logo)); ?>" alt="Logo Sekolah" class="img-fluid mb-3"
                        style="max-height: 150px; object-fit: contain;">
                <?php endif; ?>
                <h3 class="fw-bold text-success mb-2"><?php echo e($profil->nama_sekolah ?? '-'); ?></h3>
                <p class="text-muted mb-0">NPSN: <?php echo e($profil->npsn ?? '-'); ?></p>
            </div>
        </div>
        <hr>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row g-4 ">

                    <div class="col-md-4">
                        <?php if($profil->foto && file_exists(public_path('assets/admin/images/' . $profil->foto))): ?>
                            <img src="<?php echo e(asset('assets/admin/images/' . $profil->foto)); ?>"
                                alt="<?php echo e($profil->kepala_sekolah); ?>" class="img-fluid rounded-4 shadow-sm w-100"
                                style="object-fit: cover; width:50px: height: 30px;">
                        <?php else: ?>
                            <div class="d-flex align-items-center justify-content-center bg-secondary bg-opacity-25 rounded-4"
                                style="aspect-ratio: 1/1;">
                                <i class="fa-solid fa-user text-muted" style="font-size: 100px;"></i>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="col-md-8">
                        <h2 class="fw-bold text-success mb-3">KEPALA SEKOLAH</h2>
                        <div class="mb-4"
                            style="width: 200px; height: 3px; background: linear-gradient(to right, #f5c518, transparent);">
                        </div>

                        <table class="table table-borderless mb-0">
                            <tr>
                                <th style="width: 150px;">
                                    <i class="fa-solid fa-user text-success me-2"></i> Nama
                                </th>
                                <td>: <?php echo e($profil->kepala_sekolah ?? '-'); ?></td>
                            </tr>
                            <tr>
                                <th>
                                    <i class="fa-solid fa-id-card text-success me-2"></i> NIP
                                </th>
                                <td>: <?php echo e($profil->nip ?? '-'); ?></td>
                            </tr>
                        </table>
                    </div>

                </div>
            </div>
        </div>

        <div class="row justify-content-center mb-4 py-5">
            <div class="col-md-5 mb-3 mb-md-0">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="fw-bold text-success mb-3">
                            <i class="fa-solid fa-circle-info"></i> Informasi Sekolah
                        </h5>
                        <table class="table table-borderless mb-0">
                            <tr>
                                <th style="width: 40%;">Tahun Berdiri</th>
                                <td>: <?php echo e($profil->tahun_berdiri ?? '-'); ?></td>
                            </tr>
                            <tr>
                                <th>Kontak</th>
                                <td>: <?php echo e($profil->kontak ?? '-'); ?></td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>: <?php echo e($profil->alamat ?? '-'); ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-5">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="fw-bold text-success mb-3">
                            <i class="fa-solid fa-eye"></i> Visi & Misi
                        </h5>
                        <p style="white-space: pre-line; line-height: 1.8;">
                            <?php echo e($profil->visi_misi ?? '-'); ?>

                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="fw-bold text-success mb-3">
                            <i class="fa-solid fa-file-lines"></i> Deskripsi Sekolah
                        </h5>
                        <p style="white-space: pre-line; line-height: 1.9; text-align: justify;">
                            <?php echo e($profil->deskripsi ?? '-'); ?>

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.landing', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\serkom2\resources\views/public/profil.blade.php ENDPATH**/ ?>