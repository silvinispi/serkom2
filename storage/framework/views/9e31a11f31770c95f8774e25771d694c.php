<?php $__env->startSection('title', 'Detail Ekstrakurikuler'); ?>

<?php $__env->startSection('content'); ?>
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5>Detail Ekstrakurikuler</h5>
                            <a href="<?php echo e(route('admin.ekstrakurikuler.index')); ?>" class="btn btn-secondary btn-sm">
                                <i class="icofont icofont-arrow-left"></i> Kembali
                            </a>
                        </div>
                        <div class="card-block">

                            <?php if($ekstrakurikuler->gambar && file_exists(public_path('assets/admin/images/' . $ekstrakurikuler->gambar))): ?>
                                <div class="text-center mb-4">
                                    <img src="<?php echo e(asset('assets/admin/images/' . $ekstrakurikuler->gambar)); ?>" style="width: 200px; height: 200px; object-fit: cover; border-radius: 10px;">
                                </div>
                            <?php endif; ?>

                            <table class="table table-bordered">
                                <tr><th style="width:250px;">Nama Ekstrakurikuler</th><td><?php echo e($ekstrakurikuler->nama_ekskul); ?></td></tr>
                                <tr><th>Pembina</th><td><?php echo e($ekstrakurikuler->guru->nama_guru ?? $ekstrakurikuler->pembina ?? '-'); ?></td></tr>
                                <tr><th>Jadwal Latihan</th><td><?php echo e($ekstrakurikuler->jadwal_latihan); ?></td></tr>
                                <tr><th>Deskripsi</th><td><?php echo e($ekstrakurikuler->deskripsi); ?></td></tr>
                                <tr><th>Dibuat</th><td><?php echo e($ekstrakurikuler->created_at ? $ekstrakurikuler->created_at->format('d-m-Y H:i') : '-'); ?></td></tr>
                                <tr><th>Terakhir Diubah</th><td><?php echo e($ekstrakurikuler->updated_at ? $ekstrakurikuler->updated_at->format('d-m-Y H:i') : '-'); ?></td></tr>
                            </table>

                            <div class="text-end mt-3">
                                <a href="<?php echo e(route('admin.ekstrakurikuler.addEdit', Crypt::encrypt($ekstrakurikuler->id_ekskul))); ?>" class="btn btn-warning">
                                    <i class="icofont icofont-edit"></i> Edit
                                </a>
                                <form action="<?php echo e(route('admin.ekstrakurikuler.delete', Crypt::encrypt($ekstrakurikuler->id_ekskul))); ?>" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data ini?')">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-danger">
                                        <i class="icofont icofont-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\serkom2\resources\views/admin/ekstrakurikuler/show.blade.php ENDPATH**/ ?>