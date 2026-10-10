<?php $__env->startSection('title', 'Data Galeri'); ?>

<?php $__env->startSection('content'); ?>
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            
            <?php if(session('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="ti-check-box"></i> <?php echo e(session('success')); ?>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>

            <?php if(session('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="ti-alert"></i> <?php echo e(session('error')); ?>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>

            <script>
                setTimeout(function() {
                    document.querySelectorAll('.alert').forEach(function(el) {
                        el.style.transition = 'opacity .5s';
                        el.style.opacity = '0';
                        setTimeout(() => el.remove(), 500);
                    });
                }, 5000);
            </script>
            <div class="main-body">
                <div class="page-wrapper">

                    
                    <div class="page-header card">
                        <div class="row align-items-end">
                            <div class="col-lg-8">
                                <div class="page-header-title">
                                    <div class="me-3 d-flex align-items-center justify-content-center rounded "
                                        style="width: 45px; height: 45px; background: #f17f8a; color: #fff; font-size: 24px; flex-shrink: 0;">
                                        <i class="fa-solid fa-images"></i>
                                    </div>
                                    <div class="px-3">
                                        <h4>Data Galeri</h4>
                                        <span>Kelola Galeri Dibawah Ini</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="page-header-breadcrumb">
                                    <ul class="breadcrumb-title">
                                        <li class="breadcrumb-item">
                                            <a href="<?php echo e(route('admin.dashboard')); ?>">
                                                <i class="icofont icofont-home"></i>
                                            </a>
                                        </li>
                                        
                                        <li class="breadcrumb-item"><a href="#!">Galeri</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <div class="page-body">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5>Galeri</h5>
                                <a href="<?php echo e(route('admin.galeri.addEdit')); ?>" class="btn btn-primary btn-sm">
                                    <i class="ti-plus"></i> Tambah Galeri
                                </a>
                            </div>
                            <div class="card-block">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover" id="tabelGaleri">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Judul</th>
                                                <th>Keterangan</th>
                                                <th>File</th>
                                                <th>Kategori</th>
                                                <th>Tanggal</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__empty_1 = true; $__currentLoopData = $galeri; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                <tr>
                                                    <td><?php echo e($index + 1); ?></td>
                                                    <td><?php echo e($g->judul); ?></td>
                                                    <td><?php echo e(\Illuminate\Support\Str::limit($g->keterangan, 50)); ?></td>
                                                    <td>
                                                        <?php if($g->file && file_exists(public_path('assets/admin/images/' . $g->file))): ?>
                                                            <?php if($g->kategori == 'Foto'): ?>
                                                                <img src="<?php echo e(asset('assets/admin/images/' . $g->file)); ?>"
                                                                    style="width: 45px; height: 45px; object-fit: cover; border-radius: 5px;">
                                                            <?php else: ?>
                                                                <span class="badge bg-primary">Video</span>
                                                            <?php endif; ?>
                                                        <?php else: ?>
                                                            <span class="text-muted">-</span>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td><?php echo e($g->kategori); ?></td>
                                                    <td><?php echo e(\Carbon\Carbon::parse($g->tanggal)->format('d-m-Y')); ?></td>
                                                    <td class="text-center">
                                                        <a href="<?php echo e(route('admin.galeri.show', Crypt::encrypt($g->id_galeri))); ?>"
                                                            class="btn btn-info btn-sm">
                                                            <i class="icofont icofont-eye"></i> Lihat
                                                        </a>
                                                        <a href="<?php echo e(route('admin.galeri.addEdit', Crypt::encrypt($g->id_galeri))); ?>"
                                                            class="btn btn-warning btn-sm">
                                                            <i class="icofont icofont-edit"></i> Edit
                                                        </a>
                                                        <form
                                                            action="<?php echo e(route('admin.galeri.delete', Crypt::encrypt($g->id_galeri))); ?>"
                                                            method="POST" class="d-inline"
                                                            onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                            <?php echo csrf_field(); ?>
                                                            <?php echo method_field('DELETE'); ?>
                                                            <button type="submit" class="btn btn-danger btn-sm">
                                                                <i class="icofont icofont-trash"></i> Hapus
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                <tr>
                                                    <td colspan="7" class="text-center">Belum ada data galeri.</td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\serkom2\resources\views/admin/galeri/index.blade.php ENDPATH**/ ?>