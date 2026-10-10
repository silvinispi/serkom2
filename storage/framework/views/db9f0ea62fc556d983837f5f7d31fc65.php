<?php $__env->startSection('title', 'Detail Data Siswa'); ?>

<?php $__env->startSection('content'); ?>
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5>Detail Data Siswa</h5>
                            <a href="<?php echo e(route('admin.siswa.index')); ?>" class="btn btn-secondary btn-sm">
                                <i class="icofont icofont-arrow-left"></i> Kembali
                            </a>
                        </div>
                        <div class="card-block">
                            <table class="table table-bordered">
                                <tr><th style="width:250px;">NISN</th><td><?php echo e($siswa->nisn); ?></td></tr>
                                <tr><th>Nama Lengkap</th><td><?php echo e($siswa->nama_siswa); ?></td></tr>
                                <tr><th>Jenis Kelamin</th><td><?php echo e($siswa->jenis_kelamin); ?></td></tr>
                                <tr><th>Tahun Masuk</th><td><?php echo e($siswa->tahun_masuk); ?></td></tr>
                                <tr><th>Dibuat</th><td><?php echo e($siswa->created_at ? $siswa->created_at->format('d-m-Y H:i') : '-'); ?></td></tr>
                                <tr><th>Terakhir Diubah</th><td><?php echo e($siswa->updated_at ? $siswa->updated_at->format('d-m-Y H:i') : '-'); ?></td></tr>
                            </table>

                            <div class="text-end mt-3">
                                <a href="<?php echo e(route('admin.siswa.addEdit', Crypt::encrypt($siswa->id_siswa))); ?>" class="btn btn-warning">
                                    <i class="icofont icofont-edit"></i> Edit
                                </a>
                                <form action="<?php echo e(route('admin.siswa.delete', Crypt::encrypt($siswa->id_siswa))); ?>" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data ini?')">
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

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\serkom2\resources\views/admin/siswa/show.blade.php ENDPATH**/ ?>