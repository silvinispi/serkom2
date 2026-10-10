<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo e($title ?? 'MTS PSA Nurul Ihsan'); ?></title>
    <link rel="stylesheet" href="<?php echo e(asset('assets/bootstrap/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/fontawesome/css/all.min.css')); ?>">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
</head>
<body class="d-flex flex-column min-vh-100">

    <nav class="navbar navbar-expand-lg navbar-dark bg-success py-2 fixed-top">
        <div class="container">

            <a href="<?php echo e(route('public.dashboard')); ?>"
                class="navbar-brand d-flex align-items-center text-decoration-none">
                <?php if($profil && $profil->logo && file_exists(public_path('assets/admin/images/' . $profil->logo))): ?>
                    <img src="<?php echo e(asset('assets/admin/images/' . $profil->logo)); ?>" alt="Logo"
                        style="height: 45px; object-fit: contain;" class="rounded-5">
                <?php else: ?>
                    <img src="<?php echo e(asset('assets/admin/images/ni.png')); ?>" alt="Logo"
                        style="height: 45px; object-fit: contain;" class="rounded-5">
                <?php endif; ?>
                <div class="ms-2">
                    <div class="fw-bold text-white" style="font-size: 16px; line-height: 1.2;">
                        <?php echo e($profil->nama_sekolah ?? 'MTS PSA Nurul Ihsan'); ?>

                    </div>
                </div>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuUtama">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="menuUtama">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link fw-medium <?php echo e(request()->routeIs('public.dashboard') ? 'active' : ''); ?>"
                            href="<?php echo e(route('public.dashboard')); ?>">
                            <i class="fa-solid fa-house"></i> Beranda
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-medium <?php echo e(request()->routeIs('public.profil') ? 'active' : ''); ?>"
                            href="<?php echo e(route('public.profil')); ?>">
                            <i class="fa-solid fa-school-flag"></i> Profil Sekolah
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-medium <?php echo e(request()->routeIs('public.berita*') ? 'active' : ''); ?>"
                            href="<?php echo e(route('public.berita')); ?>">
                            <i class="fa-solid fa-newspaper"></i> Berita
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-medium <?php echo e(request()->routeIs('public.guru*') ? 'active' : ''); ?>"
                            href="<?php echo e(route('public.guru')); ?>">
                            <i class="fa-solid fa-chalkboard-user"></i> Guru
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-medium <?php echo e(request()->routeIs('public.ekstrakurikuler') ? 'active' : ''); ?>"
                            href="<?php echo e(route('public.ekstrakurikuler')); ?>">
                            <i class="fa-solid fa-person-circle-check"></i> Ekstrakurikuler
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-medium <?php echo e(request()->routeIs('public.galeri*') ? 'active' : ''); ?>"
                            href="<?php echo e(route('public.galeri')); ?>">
                            <i class="fa-solid fa-photo-film"></i> Galeri
                        </a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>

    <main class="content-wrapper py-5 w-100">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <div class="footer mt-3 text-white" style="background: #14643c;">
        <div class="container pt-4">
            <div class="row">
                <div class="col-md-4">
                    <div class="container">
                        <div class="d-flex align-items-center mb-3">
                            <?php if($profil && $profil->logo && file_exists(public_path('assets/admin/images/' . $profil->logo))): ?>
                                <img src="<?php echo e(asset('assets/admin/images/' . $profil->logo)); ?>" alt="Logo"
                                    style="width: 50px; border-radius: 100px;">
                            <?php else: ?>
                                <img src="<?php echo e(asset('assets/admin/images/ni.png')); ?>" alt="Logo"
                                    style="width: 50px; border-radius: 100px;">
                            <?php endif; ?>
                            <div class="ms-2">
                                <div class="fw-bold" style="font-size: 16px;">
                                    <?php echo e($profil->nama_sekolah ?? 'MTS PSA Nurul Ihsan'); ?>

                                </div>
                            </div>
                        </div>
                        <p style="font-size: 14px;">
                            <?php echo e($profil->deskripsi ?? 'MTS PSA Nurul Ihsan merupakan lembaga pendidikan Islam di bawah naungan Pesantren Satu Atap Nurul Ihsan...'); ?>

                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="container">
                        <h4>Halaman</h4>
                        <p><a href="<?php echo e(route('public.dashboard')); ?>#beranda" class="text-white text-decoration-none"><i class="fa-solid fa-house"></i> Beranda</a></p>
                        <p><a href="<?php echo e(route('public.dashboard')); ?>#profil" class="text-white text-decoration-none"><i class="fa-solid fa-school-flag"></i> Profil Sekolah</a></p>
                        <p><a href="<?php echo e(route('public.dashboard')); ?>#berita" class="text-white text-decoration-none"><i class="fa-solid fa-newspaper"></i> Berita</a></p>
                        <p><a href="<?php echo e(route('public.dashboard')); ?>#guru" class="text-white text-decoration-none"><i class="fa-solid fa-chalkboard-user"></i> Guru</a></p>
                        <p><a href="<?php echo e(route('public.dashboard')); ?>#ekstrakurikuler" class="text-white text-decoration-none"><i class="fa-solid fa-person-circle-check"></i> Ekstrakurikuler</a></p>
                        <p><a href="<?php echo e(route('public.dashboard')); ?>#galeri" class="text-white text-decoration-none"><i class="fa-solid fa-photo-film"></i> Galeri</a></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="container py-2">
                        <h4>Kontak</h4>
                        <p>
                            <a href="https://wa.me/<?php echo e($profil->kontak ?? '-'); ?>" target="_blank" class="nav-link">
                                <i class="fa-brands fa-whatsapp" style="font-size: 25px;"></i>
                                <?php echo e($profil->kontak ?? '-'); ?>

                            </a>
                        </p>
                        <h5 >Social</h5>
                        <div class="d-flex gap-2">
                            <a href="<?php echo e($profil->instagram ?? 'https://instagram.com/mtspsanurulihsan'); ?>" target="_blank" title="Instagram"
                                class="nav-link py-2">
                                <i class="fa-brands fa-instagram" style="font-size: 25px;"></i>
                            </a>
                            <a href="<?php echo e($profil->facebook ?? 'https://facebook.com/MTs.PSA.NI'); ?>" target="_blank" title="Facebook"
                                class="nav-link py-2">
                                <i class="fa-brands fa-facebook" style="font-size: 25px;"></i>
                            </a>
                            <a href="<?php echo e($profil->youtube ?? 'https://youtube.com/@pesantrennurulihsan'); ?>" target="_blank" title="Youtube"
                                class="nav-link py-2">
                                <i class="fa-brands fa-youtube" style="font-size: 25px;"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <p class="text-center fw-bold">&copy; <?php echo e($profil->nama_sekolah ?? 'Media-NI'); ?>. Mencetak Insan Ihsan Mapan Masa depan.</p>
            <div class="text-center">
                <small>crafted with dedication by ITNI</small>
            </div>
        </div>
    </div>

    <script src="<?php echo e(asset('assets/bootstrap/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/fontawesome/js/all.min.js')); ?>"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true,
        });
    </script>
</body>
</html>
<?php /**PATH D:\serkom2\resources\views/layouts/landing.blade.php ENDPATH**/ ?>