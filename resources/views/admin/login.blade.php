<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin-login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="CodedThemes">
    <meta name="author" content="CodedThemes">
    <link rel="icon" href="{{ asset('assets/admin/images/favicon.ico') }}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">

    <style>
        body {
            background:
                linear-gradient(rgba(0, 30, 15, 0.75), rgba(0, 30, 15, 0.75)),
                url('{{ asset('assets/admin/images/logo2.png') }}') center/cover no-repeat fixed;
            min-height: 100vh;
            margin: 0;
        }
        .btn-login {
            background: #1a7f4e;
            border-color: #1a7f4e;
            color: #fff;
            font-weight: 600;
            border-radius: 8px;
            padding: 10px;
            font-size: 15px;
            transition: 0.3s;
        }
        .btn-login:hover {
            background: #14643c;
            border-color: #14643c;
            color: #fff;
        }
        .login-card .form-control:focus {
            border-color: #1a7f4e;
            box-shadow: 0 0 0 3px rgba(26, 127, 78, 0.15) !important;
        }
    </style>
</head>

<body>

    <section class="d-flex align-items-center justify-content-center min-vh-100 py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5 col-lg-4 col-sm-8">

                    <div class="card border-0 rounded-4 overflow-hidden login-card">
                        <form action="{{ route('proses.login') }}" method="POST">
                            @csrf

                            <div class="card-body p-4 p-md-5">

                                <div class="text-center mb-3">
                                    <img src="{{ asset('assets/admin/images/ni.png') }}" alt="Logo MTS PSA Nurul Ihsan"
                                        style="max-width: 90px;">
                                </div>

                                <h3 class="text-center fw-bold mb-1" style="color: #1a7f4e; font-size: 22px;">
                                    Sign In
                                </h3>
                                <p class="text-center text-muted mb-4" style="font-size: 13px;">
                                    Silakan masuk untuk mengelola website
                                </p>

                                <div class="mb-3 text-start">
                                    <label class="form-label fw-semibold small">Username</label>
                                    <input type="text" name="username" class="form-control"
                                        placeholder="Masukkan username" required
                                        style="border-radius: 10px; padding: 10px 14px; font-size: 14px;">
                                </div>

                                <div class="mb-3 text-start">
                                    <label class="form-label fw-semibold small">Password</label>
                                    <div style="position: relative;">
                                        <input type="password" name="password" id="input-password" class="form-control"
                                            placeholder="Masukkan password" required
                                            style="border-radius: 10px; padding: 10px 45px 10px 14px; font-size: 14px;">

                                        <button type="button" id="toggle-password" tabindex="-1"
                                            style="position: absolute; top: 50%; right: 12px; transform: translateY(-50%); background: transparent; border: none; padding: 0; z-index: 10; cursor: pointer;">
                                            <i class="fa-solid fa-eye-slash" id="eye-icon"
                                                style="color: #908f8f; font-size: 16px;"></i>
                                        </button>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-login w-100 mb-3 text-center">
                                    Sign In
                                </button>

                                <hr class="my-3">

                                <div class="text-center">
                                    <p class="mb-1 small text-muted">Terima kasih telah berkunjung.</p>
                                    <p class="mb-0 small fw-bold" style="color: #1a7f4e;">MTS PSA Nurul Ihsan</p>
                                </div>

                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('assets/admin/js/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/popper.js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('assets/admin/js/modernizr/modernizr.js') }}"></script>
    <script src="{{ asset('assets/admin/js/modernizr/css-scrollbars.js') }}"></script>
    <script src="{{ asset('assets/admin/js/common-pages.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var input = document.getElementById('input-password');
            var btn = document.getElementById('toggle-password');
            var icon = document.getElementById('eye-icon');

            if (btn && input && icon) {
                btn.addEventListener('click', function() {
                    if (input.type === 'password') {
                        input.type = 'text';
                        icon.classList.remove('fa-eye-slash');
                        icon.classList.add('fa-eye');
                    } else {
                        input.type = 'password';
                        icon.classList.remove('fa-eye');
                        icon.classList.add('fa-eye-slash');
                    }
                });
            }
        });
    </script>
</body>

</html>
