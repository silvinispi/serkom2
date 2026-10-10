<?php $__env->startSection('title', $title); ?>

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
                    <div class="page-body">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5>Profil Saya</h5>
                                <a href="<?php echo e(route('admin.profilUser.edit')); ?>" class="btn btn-primary btn-sm">
                                    <i class="icofont icofont-edit"></i> Edit Profil
                                </a>
                            </div>
                            <div class="card-block">
                                <div class="text-center mb-4">
                                    <?php if($user->foto && file_exists(public_path('assets/admin/images/' . $user->foto))): ?>
                                        <img src="<?php echo e(asset('assets/admin/images/' . $user->foto)); ?>" alt="Foto Profil"
                                            class="rounded-circle img-thumbnail"
                                            style="width: 130px; height: 130px; object-fit: cover;">
                                    <?php else: ?>
                                        <div class="rounded-circle bg-light d-inline-flex align-items-center justify-content-center"
                                            style="width: 130px; height: 130px; font-size: 3rem; color: #999;">
                                            <i class="icofont icofont-user"></i>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <table class="table table-bordered">
                                    <tr>
                                        <th style="width:250px;">Nama Lengkap</th>
                                        <td><?php echo e($user->name ?? '-'); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Username</th>
                                        <td><?php echo e($user->username); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Role</th>
                                        <td>
                                            <?php if($user->role === 'admin'): ?>
                                                <span class="badge bg-primary">Admin</span>
                                            <?php else: ?>
                                                <span class="badge bg-warning">Operator</span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Dibuat</th>
                                        <td><?php echo e($user->created_at ? $user->created_at->format('d-m-Y H:i') : '-'); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Terakhir Diubah</th>
                                        <td><?php echo e($user->updated_at ? $user->updated_at->format('d-m-Y H:i') : '-'); ?></td>
                                    </tr>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\serkom2\resources\views/admin/profilUser/index.blade.php ENDPATH**/ ?>