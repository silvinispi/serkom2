<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('content'); ?>
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="card">
                        <div class="card-header">
                            <h5>Edit Profil Sekolah</h5>
                        </div>
                        <div class="card-block">

                            <?php if($errors->any()): ?>
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><?php echo e($error); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            <?php endif; ?>

                            <form action="<?php echo e(route('admin.profil.update', Crypt::encrypt($profil->id_profil))); ?>" method="POST" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>

                                
                                <div class="mb-3 text-center">
                                    <label class="form-label d-block fw-bold">Logo Sekolah</label>
                                    <?php if($profil->logo): ?>
                                        <div class="mb-2">
                                            <img src="<?php echo e(asset('assets/admin/images/' . $profil->logo)); ?>" alt="Logo" class="rounded-circle img-thumbnail" style="width: 90px; height: 90px; object-fit: cover;">
                                        </div>
                                    <?php endif; ?>
                                    <input type="file" name="logo" class="form-control">
                                    <small class="text-secondary">Kosongkan jika tidak ingin ganti.</small>
                                </div>

                                
                                <div class="mb-3 text-center">
                                    <label class="form-label d-block fw-bold">Foto Kepala Sekolah</label>
                                    <?php if($profil->foto): ?>
                                        <div class="mb-2">
                                            <img src="<?php echo e(asset('assets/admin/images/' . $profil->foto)); ?>" alt="Foto Kepsek" class="rounded-circle img-thumbnail" style="width: 90px; height: 90px; object-fit: cover;">
                                        </div>
                                    <?php endif; ?>
                                    <input type="file" name="foto" class="form-control">
                                    <small class="text-secondary">Kosongkan jika tidak ingin ganti.</small>
                                </div>

                                <div class="mb-3 text-center">
                                    <label class="form-label d-block fw-bold">Foto Banner</label>
                                    <?php if($profil->banner): ?>
                                        <div class="mb-2">
                                            <img src="<?php echo e(asset('assets/admin/images/' . $profil->banner)); ?>" alt="Foto Banner" class="rounded-circle img-thumbnail" style="width: 90px; height: 90px; object-fit: cover;">
                                        </div>
                                    <?php endif; ?>
                                    <input type="file" name="banner" class="form-control">
                                    <small class="text-secondary">Kosongkan jika tidak ingin ganti.</small>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Nama Sekolah</label>
                                    <input type="text" name="nama_sekolah" class="form-control" value="<?php echo e(old('nama_sekolah', $profil->nama_sekolah)); ?>" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Kepala Sekolah</label>
                                    <input type="text" name="kepala_sekolah" class="form-control" value="<?php echo e(old('kepala_sekolah', $profil->kepala_sekolah)); ?>">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">NIP</label>
                                    <input type="text" name="nip" class="form-control" value="<?php echo e(old('nip', $profil->nip)); ?>">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">NPSN</label>
                                    <input type="text" name="npsn" class="form-control" value="<?php echo e(old('npsn', $profil->npsn)); ?>">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Tahun Berdiri</label>
                                    <input type="number" name="tahun_berdiri" class="form-control" value="<?php echo e(old('tahun_berdiri', $profil->tahun_berdiri)); ?>">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Kontak</label>
                                    <input type="text" name="kontak" class="form-control" value="<?php echo e(old('kontak', $profil->kontak)); ?>">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Alamat</label>
                                    <textarea name="alamat" class="form-control" rows="3"><?php echo e(old('alamat', $profil->alamat)); ?></textarea>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Youtube</label>
                                    <textarea name="youtube" class="form-control" rows="3"><?php echo e(old('youtube', $profil->youtube)); ?></textarea>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Instagram</label>
                                    <textarea name="instagram" class="form-control" rows="3"><?php echo e(old('instagram', $profil->instagram)); ?></textarea>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Facebook</label>
                                    <textarea name="facebook" class="form-control" rows="3"><?php echo e(old('facebook', $profil->facebook)); ?></textarea>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Visi & Misi</label>
                                    <textarea name="visi_misi" class="form-control" rows="3"><?php echo e(old('visi_misi', $profil->visi_misi)); ?></textarea>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Deskripsi</label>
                                    <textarea name="deskripsi" class="form-control" rows="3"><?php echo e(old('deskripsi', $profil->deskripsi)); ?></textarea>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Text Banner</label>
                                    <textarea name="text" class="form-control" rows="3"><?php echo e(old('text', $profil->text)); ?></textarea>
                                </div>

                                <div class="text-end">
                                    <a href="<?php echo e(route('admin.profil.index')); ?>" class="btn btn-secondary">Kembali</a>
                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\serkom2\resources\views/admin/profil/edit.blade.php ENDPATH**/ ?>