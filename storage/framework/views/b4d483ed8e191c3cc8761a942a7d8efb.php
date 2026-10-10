<?php $__env->startSection('title', 'Detail Berita'); ?>

<?php $__env->startSection('content'); ?>
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <div class="page-body">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5>Detail Berita</h5>
                                <a href="<?php echo e(route('admin.berita.index')); ?>" class="btn btn-secondary btn-sm">
                                    <i class="icofont icofont-arrow-left"></i> Kembali
                                </a>
                            </div>
                            <div class="card-block">

                                <div class="article-cover-wrapper mb-4">
                                    <?php if($berita->gambar && file_exists(public_path('assets/admin/images/' . $berita->gambar))): ?>
                                        <img src="<?php echo e(asset('assets/admin/images/' . $berita->gambar)); ?>"
                                            alt="Foto <?php echo e($berita->judul); ?>">
                                    <?php else: ?>
                                        <div class="w-100 h-100 d-flex flex-column align-items-center justify-content-center text-white-50"
                                            style="min-height: 280px; background: #1e293b;">
                                            <i data-feather="image" width="60" class="mb-2 text-secondary"></i>
                                            <span class="small text-muted">Tidak ada gambar sampul</span>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <table class="table table-bordered">
                                    <tr>
                                        <th style="width:250px;">Judul</th>
                                        <td><?php echo e($berita->judul); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Penulis</th>
                                        <td>
                                            <?php echo e($berita->user->name ?? '-'); ?>

                                            <?php if($berita->user): ?>
                                                <span style="color: #999;">- <?php echo e(ucfirst($berita->user->role)); ?></span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>
                                            <?php if($berita->status === 'publish'): ?>
                                                <span class="badge bg-success">Publish</span>
                                            <?php else: ?>
                                                <span class="badge bg-warning">Draft</span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal</th>
                                        <td><?php echo e(\Carbon\Carbon::parse($berita->tanggal)->format('d-m-Y')); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Isi</th>
                                        <td><?php echo nl2br(e($berita->isi)); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Dibuat</th>
                                        <td><?php echo e($berita->created_at ? $berita->created_at->format('d-m-Y H:i') : '-'); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Terakhir Diubah</th>
                                        <td><?php echo e($berita->updated_at ? $berita->updated_at->format('d-m-Y H:i') : '-'); ?></td>
                                    </tr>
                                </table>

                                <div class="text-end mt-3">
                                    <a href="<?php echo e(route('admin.berita.addEdit', Crypt::encrypt($berita->id_berita))); ?>"
                                        class="btn btn-warning">
                                        <i class="icofont icofont-edit"></i> Edit
                                    </a>
                                    <form action="<?php echo e(route('admin.berita.delete', Crypt::encrypt($berita->id_berita))); ?>"
                                        method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data ini?')">
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

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\serkom2\resources\views/admin/berita/show.blade.php ENDPATH**/ ?>