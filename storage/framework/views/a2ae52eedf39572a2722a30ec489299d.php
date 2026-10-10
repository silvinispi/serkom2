<?php $__env->startSection('title', 'Data User'); ?>

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
                                <div class="page-header-title d-flex align-items-center">
                                    <div class="me-3 d-flex align-items-center justify-content-center rounded "
                                        style="width: 45px; height: 45px; background: #f17f8a; color: #fff; font-size: 24px; flex-shrink: 0;">
                                        <i class="fa-solid fa-key"></i>
                                    </div>
                                    <div class="px-3">
                                        <h4>Data Pengguna</h4>
                                        <span >Kelola Data Pengguna Dibawah Ini</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="page-header-breadcrumb">
                                    <ul class="breadcrumb-title">
                                        <li class="breadcrumb-item">
                                            <a href="<?php echo e(route('admin.dashboard')); ?>"><i
                                                    class="icofont icofont-home"></i></a>
                                        </li>
                                        
                                        <li class="breadcrumb-item"><a href="#!">Data Pengelola</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <div class="page-body">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5>Data Pengelola</h5>
                                <a href="<?php echo e(route('admin.user.addEdit')); ?>" class="btn btn-primary btn-sm">
                                    <i class="ti-plus"></i> Tambah User
                                </a>
                            </div>
                            <div class="card-block">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover" id="tabelUser">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Foto</th>
                                                <th>Nama</th>
                                                <th>Username</th>
                                                <th>Role</th>
                                                <th>Status</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__empty_1 = true; $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                <tr>
                                                    <td><?php echo e($index + 1); ?></td>
                                                    <td>
                                                        <?php if($u->foto && file_exists(public_path('assets/admin/images/' . $u->foto))): ?>
                                                            <img src="<?php echo e(asset('assets/admin/images/' . $u->foto)); ?>"
                                                                alt="Foto" class="rounded-circle"
                                                                style="width: 45px; height: 45px; object-fit: cover;">
                                                        <?php else: ?>
                                                            <div class="rounded-circle bg-light d-inline-flex align-items-center justify-content-center"
                                                                style="width: 45px; height: 45px; color: #999;">
                                                                <i class="icofont icofont-user"></i>
                                                            </div>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td><?php echo e($u->name); ?></td>
                                                    <td><?php echo e($u->username); ?></td>
                                                    <td>
                                                        <?php if($u->role === 'admin'): ?>
                                                            <span class="badge bg-primary">Admin</span>
                                                        <?php else: ?>
                                                            <span class="badge bg-warning">Operator</span>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <?php if($u->status === 'aktif'): ?>
                                                            <span class="badge bg-success">Aktif</span>
                                                        <?php else: ?>
                                                            <span class="badge bg-danger">Tidak Aktif</span>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="<?php echo e(route('admin.user.show', Crypt::encrypt($u->id_user))); ?>"
                                                            class="btn btn-info btn-sm">
                                                            <i class="icofont icofont-eye"></i> Lihat
                                                        </a>
                                                        <a href="<?php echo e(route('admin.user.addEdit', Crypt::encrypt($u->id_user))); ?>"
                                                            class="btn btn-warning btn-sm">
                                                            <i class="icofont icofont-edit"></i> Edit
                                                        </a>
                                                        <form
                                                            action="<?php echo e(route('admin.user.delete', Crypt::encrypt($u->id_user))); ?>"
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
                                                    <td colspan="7" class="text-center">Belum ada data user.</td>
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

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\serkom2\resources\views/admin/user/index.blade.php ENDPATH**/ ?>