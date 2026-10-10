<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin-login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="CodedThemes">
    <meta name="author" content="CodedThemes">
    <link rel="icon" href="<?php echo e(asset('assets/admin/images/favicon.ico')); ?>" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/admin/css/bootstrap/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/admin/icon/themify-icons/themify-icons.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/admin/icon/icofont/css/icofont.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/admin/css/style.css')); ?>">

    <style>
        /* ===== BACKGROUND LOGIN ===== */
        html, body,
        body.fix-menu,
        body.login-page {
            background:
                linear-gradient(rgba(0, 30, 15, 0.75), rgba(0, 30, 15, 0.75)),
                url('<?php echo e(asset("assets/admin/images/logo2.png")); ?>') center/cover no-repeat fixed !important;
            background-size: cover !important;
            min-height: 100vh;
            margin: 0;
            padding: 0;
        }

        section.login,
        section.login.bg-primary,
        section.login.common-img-bg {
            background: transparent !important;
            min-height: 100vh;
            padding: 20px;
        }

        /* ===== CARD LOGIN — TANPA SHADOW ===== */
        .login-card,
        .login-card .auth-box,
        .card,
        .card-block {
            background: #ffffff !important;
            border-radius: 16px !important;
            box-shadow: none !important;
            -webkit-box-shadow: none !important;
            -moz-box-shadow: none !important;
            border: none !important;
            outline: none !important;
        }

        .login-card {
            padding: 0 !important;
            margin: 0 !important;
            overflow: hidden;
            position: relative;
        }

        /* Matikan semua pseudo-element pembawa shadow bawaan template */
        .login-card::before,
        .login-card::after,
        .auth-box::before,
        .auth-box::after {
            display: none !important;
            content: none !important;
            box-shadow: none !important;
            -webkit-box-shadow: none !important;
            border: none !important;
        }

        /* Form */
        .login-card form {
            margin: 0 !important;
            padding: 0 !important;
            border: none !important;
        }

        .login-card .auth-box {
            padding: 35px 35px !important;
        }

        /* Logo */
        .login-logo {
            text-align: center;
            margin-bottom: 12px;
        }
        .login-logo img {
            max-width: 90px;
            height: auto;
            object-fit: contain;
        }

        .txt-primary {
            color: #1a7f4e !important;
            font-weight: 700;
        }

        /* Input & Label - Rata Kiri */
        .login-card .mb-3 {
            text-align: left !important;
        }
        .login-card .form-label {
            font-size: 13px;
            margin-bottom: 5px;
            display: block;
            text-align: left !important;
        }
        .login-card .form-control {
            border-radius: 8px;
            padding: 8px 12px;
            height: auto;
            font-size: 14px;
            border: 1px solid #ddd;
            text-align: left !important;
        }
        .login-card .form-control:focus {
            border-color: #1a7f4e;
            box-shadow: 0 0 0 3px rgba(26,127,78,0.15) !important;
        }

        /* Checkbox Remember Me - Rata Kiri */
        /* .login-card .form-check {
            text-align: left !important;
            display: flex;
            align-items: center;
            gap: 8px;
            padding-left: 0 !important;
        } */
        /* .login-card .form-check-input {
            float: none !important;
            margin-left: 0 !important;
            margin-top: 0 !important;
        }
        .login-card .form-check-label {
            text-align: left !important;
            font-size: 13px;
            margin-bottom: 0 !important;
        } */

        /* Tombol */
        .btn-login {
            background: #1a7f4e;
            border-color: #1a7f4e;
            color: #fff;
            font-weight: 600;
            border-radius: 8px;
            padding: 10px;
            font-size: 15px;
            transition: 0.3s;
            text-align: center; 
            align-items: center;
        }
        .btn-login:hover {
            background: #14643c;
            border-color: #14643c;
            color: #fff;
        }

        /* Footer */
        .login-footer { font-size: 13px; color: #666; }

        /* Hilangkan md-line */
        .md-line { display: none; }

        /* Responsive */
        @media (max-width: 576px) {
            .login-logo img { max-width: 75px; }
            .login-card .auth-box { padding: 25px 20px !important; }
        }
    </style>
</head>

<body class="fix-menu login-page">

    <section class="login d-flex align-items-center justify-content-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5 col-lg-4 col-sm-8">

                    <div class="login-card">
                        <form class="md-float-material" action="<?php echo e(route('proses.login')); ?>" method="POST">
                            <?php echo csrf_field(); ?>

                            <div class="auth-box">

                                
                                <div class="login-logo">
                                    <img src="<?php echo e(asset('assets/admin/images/ni.png')); ?>" alt="Logo MTS PSA Nurul Ihsan">
                                </div>

                                
                                <h3 id="login-title" class="txt-primary mb-1" style="font-size: 22px;">Sign In</h3>
                                <p id="login-desc" class="text-muted mb-4" style="font-size: 13px;">Silakan masuk untuk mengelola website</p>

                                
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Username</label>
                                    <input type="text" name="username" class="form-control" placeholder="Masukkan username" required>
                                </div>

                                
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Password</label>
                                    <div style="position: relative;">
                                        <input type="password" name="password" id="input-password" class="form-control" placeholder="Masukkan password" required style="padding-right: 40px;">
                                        <button type="button" id="toggle-password" tabindex="-1"
                                            style="position: absolute; right: 8px; top: 50%; transform: translateY(-50%); background: transparent; border: none; z-index: 10; cursor: pointer;">
                                            <i class="icofont icofont-eye" id="eye-icon" style="color: #999; font-size: 16px;"></i>
                                        </button>
                                    </div>
                                </div>

                                
                                

                                
                                <button type="submit" class="btn btn-login w-100 mb-3">Sign In</button>

                                <hr class="my-3">

                                <div class="text-center login-footer">
                                    <p class="mb-1">Terima kasih telah berkunjung.</p>
                                    <p class="mb-0 fw-bold" style="color: #1a7f4e;">MTS PSA Nurul Ihsan</p>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- Scripts -->
    <script type="text/javascript" src="<?php echo e(asset('assets/admin/js/jquery/jquery.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/admin/js/jquery-ui/jquery-ui.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/admin/js/popper.js/popper.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/admin/js/bootstrap/js/bootstrap.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/admin/js/jquery-slimscroll/jquery.slimscroll.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/admin/js/modernizr/modernizr.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/admin/js/modernizr/css-scrollbars.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/admin/js/common-pages.js')); ?>"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Script untuk Toggle Password
            var input = document.getElementById('input-password');
            var btn   = document.getElementById('toggle-password');
            var icon  = document.getElementById('eye-icon');

            if (btn && input && icon) {
                btn.addEventListener('click', function() {
                    if (input.type === 'password') {
                        input.type = 'text';
                        icon.classList.remove('icofont-eye');
                        icon.classList.add('icofont-eye-blocked');
                    } else {
                        input.type = 'password';
                        icon.classList.remove('icofont-eye-blocked');
                        icon.classList.add('icofont-eye');
                    }
                });
            }

            // MEMAKSA JUDUL SIGN IN KE TENGAH MENGALAHKAN SCRIPT TEMPLATE
            setTimeout(function() {
                var title = document.getElementById('login-title');
                var desc = document.getElementById('login-desc');
                if (title) {
                    title.style.setProperty('text-align', 'center', 'important');
                    title.style.setProperty('width', '100%', 'important');
                }
                if (desc) {
                    desc.style.setProperty('text-align', 'center', 'important');
                    desc.style.setProperty('width', '100%', 'important');
                }
            }, 50); // Dijalankan setelah script bawaan selesai
        });
    </script>
</body>

</html>
<?php /**PATH D:\serkom2\resources\views/admin/login.blade.php ENDPATH**/ ?>