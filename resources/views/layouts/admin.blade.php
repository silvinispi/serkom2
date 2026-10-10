<!DOCTYPE html>
<html lang="en">

<head>
    <title>MTS PSA Nurul Ihsan | @yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="CodedThemes">
    <meta name="keywords"
        content="Admin, Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="CodedThemes">
    <link rel="icon" href="{{ asset('assets/admin/images/favicon.ico') }}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/icon/themify-icons/themify-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/icon/icofont/css/icofont.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/jquery.mCustomScrollbar.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('DataTables/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('DataTables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">

    <style>
        a.mobile-menu-toggle {
            display: none;
            text-decoration: none !important;
        }

        @media (max-width: 991px) {
            a.mobile-menu-toggle {
                display: inline-flex !important;
                align-items: center;
                justify-content: center;
                position: fixed !important;
                top: 18px;
                left: 12px;
                z-index: 99999 !important;
                background: #222;
                color: #fff !important;
                width: 40px;
                height: 40px;
                border-radius: 6px;
                font-size: 20px;
                box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
            }

            a.mobile-menu-toggle i {
                color: #fff !important;
            }
        }

        .custom-dropdown .custom-dropdown-menu {
            display: none !important;
            position: absolute !important;
            top: 100% !important;
            right: 0 !important;
            margin-top: 5px !important;
            min-width: 130px !important;
            background: #ffffff !important;
            border-radius: 8px !important;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15) !important;
            padding: 2px 0 !important;
            list-style: none !important;
            z-index: 99999 !important;
            text-align: left !important;
        }

        .custom-dropdown .custom-dropdown-menu.show {
            display: block !important;
        }

        .custom-dropdown .custom-dropdown-menu li {
            display: block !important;
            width: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
            float: none !important;
            list-style: none !important;
            line-height: 1 !important;
        }

        .custom-dropdown .custom-dropdown-menu .custom-dropdown-item {
            display: flex !important;
            align-items: center !important;
            padding: 5px 12px !important;
            color: #333 !important;
            text-decoration: none !important;
            font-size: 13px !important;
            border-bottom: none !important;
            width: 100% !important;
            background: transparent !important;
            transition: background 0.2s !important;
            line-height: 1.2 !important;
        }

        .custom-dropdown .custom-dropdown-menu .custom-dropdown-item:hover {
            background: #f1f1f1 !important;
            color: #198754 !important;
        }

        .custom-dropdown .custom-dropdown-menu .custom-dropdown-danger {
            color: #dc3545 !important;
        }

        .custom-dropdown .custom-dropdown-menu .custom-dropdown-danger:hover {
            background: #fdeaea !important;
            color: #dc3545 !important;
        }

        .custom-dropdown .custom-dropdown-menu .custom-dropdown-divider {
            margin: 1px 0 !important;
            border: none !important;
            border-top: 1px solid #eee !important;
            display: block !important;
            width: 100% !important;
        }
    </style>
</head>

<body>
    <a href="#!" id="mobile-collapse" class="mobile-menu-toggle">
        <i class="ti-menu"></i>
    </a>

    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
            </div>
        </div>
    </div>

    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">

                    <div class="navbar-logo" style="padding: 0; background: #fff;">
                        <a class="mobile-search morphsearch-search" href="#">
                            <i class="ti-search"></i>
                        </a>

                        <a href="{{ route('admin.dashboard') }}"
                            style="display: block; width: 100%; height: 100%; text-align: center;">
                            <img src="{{ asset('assets/admin/images/logo2.png') }}" alt="Logo"
                                style="width: 100%; height: 100%; object-fit: cover;" />
                        </a>

                        <a class="mobile-options">
                            <i class="ti-more"></i>
                        </a>
                    </div>

                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            <li>
                                <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a>
                                </div>
                            </li>
                            <li>
                                <a href="#!" onclick="javascript:toggleFullScreen()">
                                    <i class="ti-fullscreen"></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-right">
                            <li class="user-profile header-notification custom-dropdown">
                                <a href="javascript:void(0)" class="d-flex align-items-center text-decoration-none"
                                    id="dropdownToggle">
                                    @if (Auth::user()->foto && file_exists(public_path('assets/admin/images/' . Auth::user()->foto)))
                                        <img src="{{ asset('assets/admin/images/' . Auth::user()->foto) }}"
                                            class="img-radius rounded-circle" alt="User-Profile-Image">
                                    @else
                                        <span
                                            class="rounded-circle bg-light d-inline-flex align-items-center justify-content-center"
                                            style="width: 45px; height: 45px; color: #8d8b8b;">
                                            <i class="fa-solid fa-user text-dark"></i>
                                        </span>
                                    @endif
                                    <span class="ms-2">{{ Auth::user()->name ?? 'User' }}</span>
                                    <i class="fa-solid fa-caret-down ms-1"></i>
                                </a>

                                <ul class="custom-dropdown-menu" id="dropdownMenu">
                                    <li>
                                        <a href="{{ route('admin.profilUser.index') }}" class="custom-dropdown-item">
                                            <i class="fa-solid fa-user"></i> Profil
                                        </a>
                                    </li>
                                    <li>
                                        <hr class="custom-dropdown-divider">
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            class="custom-dropdown-item custom-dropdown-danger"
                                            onclick="return confirm('Apakah Anda yakin ingin keluar?')">
                                            Logout <i class="fa-solid fa-circle-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar">
                        <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                        <div class="pcoded-inner-navbar main-menu">

                            <div class="pcoded-search">
                                <span class="searchbar-toggle"> </span>
                                <div class="pcoded-search-box ">
                                    <input type="text" id="sidebar-search" placeholder="Cari menu..."
                                        autocomplete="off">
                                    <span class="search-icon"><i class="ti-search" aria-hidden="true"></i></span>
                                </div>
                            </div>

                            <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">Menu</div>

                            <ul class="pcoded-item pcoded-left-item" id="sidebar-menu">
                                <li
                                    class="sidebar-item {{ request()->routeIs('admin.dashboard') || request()->segment(2) == 'dashboard' ? 'active' : '' }}">
                                    <a href="{{ route('admin.dashboard') }}">
                                        <span class="pcoded-micon"><i class="fa-regular fa-house"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li
                                    class="sidebar-item {{ request()->routeIs('admin.profil.*') || request()->segment(2) == 'profil' ? 'active' : '' }}">
                                    <a href="{{ route('admin.profil.index') }}">
                                        <span class="pcoded-micon"><i class="fa-solid fa-address-card"></i><b>P</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Profil Sekolah</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                @if (Auth::check() && strcasecmp(Auth::user()->role, 'admin') === 0)
                                    <li
                                        class="sidebar-item {{ request()->routeIs('admin.guru.*') || request()->segment(2) == 'guru' ? 'active' : '' }}">
                                        <a href="{{ route('admin.guru.index') }}">
                                            <span class="pcoded-micon"><i class="fa-solid fa-user"></i><b>G</b></span>
                                            <span class="pcoded-mtext" data-i18n="nav.dash.main">Guru</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                @endif
                                @if (Auth::check() && strcasecmp(Auth::user()->role, 'admin') === 0)
                                    <li
                                        class="sidebar-item {{ request()->routeIs('admin.siswa.*') || request()->segment(2) == 'siswa' ? 'active' : '' }}">
                                        <a href="{{ route('admin.siswa.index') }}">
                                            <span class="pcoded-micon"><i class="fa-solid fa-users"></i><b>S</b></span>
                                            <span class="pcoded-mtext" data-i18n="nav.dash.main">Siswa</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                @endif
                                <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">Konten & Media
                                </div>
                                <li
                                    class="sidebar-item {{ request()->routeIs('admin.berita.*') || request()->segment(2) == 'berita' ? 'active' : '' }}">
                                    <a href="{{ route('admin.berita.index') }}">
                                        <span class="pcoded-micon"><i class="fa-solid fa-newspaper"></i><b>B</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Berita</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li
                                    class="sidebar-item {{ request()->routeIs('admin.ekstrakurikuler.*') || request()->segment(2) == 'ekstrakurikuler' ? 'active' : '' }}">
                                    <a href="{{ route('admin.ekstrakurikuler.index') }}">
                                        <span class="pcoded-micon"><i class="fa-solid fa-star"></i><b>E</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Ektrakurikuler</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li
                                    class="sidebar-item {{ request()->routeIs('admin.galeri.*') || request()->segment(2) == 'galeri' ? 'active' : '' }}">
                                    <a href="{{ route('admin.galeri.index') }}">
                                        <span class="pcoded-micon"><i class="fa-solid fa-images"></i><b>Ga</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Galeri</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>



                                @if (Auth::check() && strcasecmp(Auth::user()->role, 'admin') === 0)
                                <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">Pengaturan
                                </div>
                                    <li
                                        class="sidebar-item {{ request()->routeIs('admin.user.*') || request()->segment(2) == 'user' ? 'active' : '' }}">
                                        <a href="{{ route('admin.user.index') }}">
                                            <span class="pcoded-micon"><i class="fa-solid fa-key"></i><b>Us</b></span>
                                            <span class="pcoded-mtext" data-i18n="nav.dash.main">Data Pengguna</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </nav>
                    <main class="content-wrapper w-100">
                        @yield('content')
                    </main>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="{{ asset('assets/admin/js/jquery/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/admin/js/jquery-ui/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/admin/js/popper.js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/admin/js/bootstrap/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/admin/js/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/admin/js/modernizr/modernizr.js') }}"></script>
    <script src="{{ asset('assets/admin/pages/widget/amchart/amcharts.min.js') }}"></script>
    <script src="{{ asset('assets/admin/pages/widget/amchart/serial.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/admin/pages/todo/todo.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/admin/pages/dashboard/custom-dashboard.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/admin/js/script.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/admin/js/SmoothScroll.js') }}"></script>
    <script src="{{ asset('assets/admin/js/pcoded.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/demo-12.js') }}"></script>
    <script src="{{ asset('assets/admin/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>

    <script src="{{ asset('DataTables/datatables.js') }}"></script>
    <script src="{{ asset('DataTables/datatables.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.table').each(function() {
                if ($(this).find('thead tr').length && $(this).find('tbody tr').length) {
                    var headCols = $(this).find('thead tr th').length;
                    var bodyCols = $(this).find('tbody tr:first td').length;
                    if (headCols === bodyCols) {
                        $(this).DataTable();
                    }
                }
            });
        });
    </script>

    <script>
        var $window = $(window);
        var nav = $('.fixed-button');
        $window.scroll(function() {
            if ($window.scrollTop() >= 200) {
                nav.addClass('active');
            } else {
                nav.removeClass('active');
            }
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var searchInput = document.getElementById('sidebar-search');
            var menuItems = document.querySelectorAll('#sidebar-menu .sidebar-item');

            if (searchInput) {
                searchInput.addEventListener('keyup', function() {
                    var keyword = this.value.toLowerCase().trim();

                    menuItems.forEach(function(item) {
                        var textEl = item.querySelector('.pcoded-mtext');
                        var menuText = textEl ? textEl.textContent.toLowerCase() : '';

                        if (keyword === '' || menuText.indexOf(keyword) > -1) {
                            item.style.display = '';
                        } else {
                            item.style.display = 'none';
                        }
                    });
                });
            }

            var toggle = document.getElementById('dropdownToggle');
            var menu = document.getElementById('dropdownMenu');

            if (toggle && menu) {
                toggle.addEventListener('click', function(e) {
                    e.stopPropagation();
                    menu.classList.toggle('show');
                });

                document.addEventListener('click', function(e) {
                    if (!menu.contains(e.target) && !toggle.contains(e.target)) {
                        menu.classList.remove('show');
                    }
                });
            }
        });
    </script>

    <script src="{{ asset('assets/fontawesome/js/all.min.js') }}"></script>
</body>

</html>
