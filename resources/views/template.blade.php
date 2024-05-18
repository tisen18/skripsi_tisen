<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>BPBD KOTA MALANG</title>
    <!-- theme meta -->
    <meta name="theme-name" content="mono" />
    <!-- GOOGLE FONTS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700|Roboto" rel="stylesheet">
    <link href="{{ asset('template/theme/plugins/material/css/materialdesignicons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('template/theme/plugins/simplebar/simplebar.css') }}" rel="stylesheet" />
    <!-- PLUGINS CSS STYLE -->
    <link href="{{ asset('template/theme/plugins/nprogress/nprogress.css') }}" rel="stylesheet" />
    <link href="{{ asset('template/theme/plugins/DataTables/DataTables-1.10.18/css/jquery.dataTables.min.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('template/theme/plugins/jvectormap/jquery-jvectormap-2.0.3.css') }}" rel="stylesheet" />
    <link href="{{ asset('template/theme/plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet" />
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="{{ asset('template/theme/plugins/toaster/toastr.min.css') }}" rel="stylesheet" />
    <!-- MONO CSS -->
    <link id="main-css-href" rel="stylesheet" href="{{ asset('template/theme/css/style.css') }}" />
    <!-- FAVICON -->
    <link href="{{ asset('template/theme/images/favicon.png') }}" rel="shortcut icon" />
    <link href="{{ asset('template/theme/css/style.css') }}" rel="stylesheet" />
    <script src="{{ asset('template/theme/plugins/nprogress/nprogress.js') }}"></script>
    <script src="{{ asset('assets/js/lurah.js') }}"></script>
</head>

<body class="navbar-fixed sidebar-fixed" id="body">
    <div class="wrapper">
        <aside class="left-sidebar sidebar-dark" id="left-sidebar">
            <div id="sidebar" class="sidebar">
                <!-- begin sidebar scrollbar -->
                <div class="sidebar-left" data-simplebar style="height: 100%;">
                    <!-- sidebar menu -->
                    <ul class="nav sidebar-inner" id="sidebar-menu">
                        <li class="active">
                            <a class="sidenav-item-link" href="/">
                                <i class="mdi mdi-briefcase-account-outline"></i>
                                <span class="nav-text">DASHBOARD</span>
                            </a>
                        </li>
                        <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                            data-target="#bencana" aria-expanded="false" aria-controls="bencana">
                            <i class="mdi mdi-bencana"></i>
                            <li class="section-title" font-size:14px>Data Bencana</li>
                        </a>

                        <li class="has-sub">
                            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                                data-target="#bencana" aria-expanded="false" aria-controls="bencana">
                                <i class="mdi mdi-desa"></i>
                                <span class="nav-text">Data Bencana</span> <b class="caret"></b>
                            </a>
                            <ul class="collapse" id="bencana" data-parent="#sidebar-menu">
                                <div class="sub-menu">
                                    <li>
                                        <a class="sidenav-item-link" href="/bencana">
                                            <span class="nav-text">Tabel Bencana Alam</span>
                                        </a>
                                    </li>
                                </div>
                            </ul>
                        </li>
                        <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                            data-target="#desa" aria-expanded="false" aria-controls="desa">
                            <i class="mdi mdi-desa"></i>
                            <li class="section-title" font-size:14px>Data Daerah</li>
                        </a>
                        <li class="has-sub">
                            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                                data-target="#camat" aria-expanded="false" aria-controls="camat">
                                <i class="mdi mdi-camat"></i>
                                <span class="nav-text">Data Kecamatan</span> <b class="caret"></b>
                            </a>
                            <ul class="collapse" id="camat" data-parent="#sidebar-menu">
                                <div class="sub-menu">
                                    <li>
                                        <a class="sidenav-item-link" href="/camat">
                                            <span class="nav-text">Tabel Kecamatan</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="sidenav-item-link" href=/camat>
                                            <span class="nav-text">Tambah Data Kecamatan</span>
                                        </a>
                                    </li>
                                </div>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                                data-target="#lurah" aria-expanded="false" aria-controls="lurah">
                                <i class="mdi mdi-lurah"></i>
                                <span class="nav-text">Data Kelurahan</span> <b class="caret"></b>
                            </a>
                            <ul class="collapse" id="lurah" data-parent="#sidebar-menu">
                                <div class="sub-menu">
                                    <li>
                                        <a class="sidenav-item-link" href="/lurah">
                                            <span class="nav-text">Tabel Kelurahan</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="sidenav-item-link" href=/lurah>
                                            <span class="nav-text">Tambah Data Kelurahan</span>
                                        </a>
                                    </li>
                                </div>
                            </ul>
                        </li>

                        <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                            data-target="#desa" aria-expanded="false" aria-controls="desa">
                            <i class="mdi mdi-desa"></i>
                            <li class="section-title" font-size:14px>Data Kategori</li>
                        </a>
                        <li class="has-sub">
                            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                                data-target="#kategori" aria-expanded="false" aria-controls="produk">
                                <i class="mdi mdi-produk"></i>
                                <span class="nav-text">Data Kategori</span> <b class="caret"></b>
                            </a>
                            <ul class="collapse" id="kategori" data-parent="#sidebar-menu">
                                <div class="sub-menu">
                                    <li>
                                        <a class="sidenav-item-link" href="/kategori">
                                            <span class="nav-text">Tabel Kategori</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="sidenav-item-link" href=/kategori>
                                            <span class="nav-text">Tambah Data Kategori</span>
                                        </a>
                                    </li>
                                </div>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                                data-target="#parameter" aria-expanded="false" aria-controls="parameter">
                                <i class="mdi mdi-parameter"></i>
                                <span class="nav-text">Data Parameter</span> <b class="caret"></b>
                            </a>
                            <ul class="collapse" id="parameter" data-parent="#sidebar-menu">
                                <div class="sub-menu">
                                    <li>
                                        <a class="sidenav-item-link" href="/parameter">
                                            <span class="nav-text">Tabel Parameter</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="sidenav-item-link" href=/parameter>
                                            <span class="nav-text">Tambah Data Parameter</span>
                                        </a>
                                    </li>
                                </div>
                            </ul>
                        </li>
                        <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                            data-target="#sales" aria-expanded="false" aria-controls="accounting">
                            <i class="mdi mdi-sales"></i>
                            <li class="section-title" font-size:14px>Cluster</li>
                        </a>

                        <li class="has-sub">
                            <a class="sidenav-item-link" href="/datacluster">
                                <i class="mdi mdi-ai"></i>
                                <span class="nav-text">Cluster</span>
                            </a>
                        </li>
                        <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                            data-target="#sales" aria-expanded="false" aria-controls="accounting">
                            <i class="mdi mdi-sales"></i>
                            <li class="section-title" font-size:14px>Peta</li>
                        </a>

                        <li class="has-sub">
                            <a class="sidenav-item-link" href="/mapcluster">
                                <i class="mdi mdi-ai"></i>
                                <span class="nav-text">Peta</span>
                            </a>
                        </li>
                        <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                            data-target="#sales" aria-expanded="false" aria-controls="accounting">
                            <i class="mdi mdi-sales"></i>
                            <li class="section-title" font-size:14px>User</li>
                        </a>

                        <li class="has-sub">
                            <a class="sidenav-item-link" href="/user">
                                <i class="mdi mdi-ai"></i>
                                <span class="nav-text">user</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </aside>
        <div class="page-wrapper">
            <!-- Header -->
            <header class="main-header" id="header">
                <nav class="navbar navbar-expand-lg navbar-light" id="navbar">
                    <!-- Sidebar toggle button -->
                    <button id="sidebar-toggler" class="sidebar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                    </button>
                    
                    <span class="page-title ">BPBD KOTA MALANG</span>

                    <div class="navbar-right ">

                        <!-- search form -->
                        <div class="search-form">
                            <form action="index.html" method="get">
                                <div class="input-group input-group-sm" id="input-group-search">
                                    <input type="text" autocomplete="off" name="query" id="search-input"
                                        class="form-control" placeholder="Search..." />
                                    <div class="input-group-append">
                                        <button class="btn" type="button">/</button>
                                    </div>
                                </div>
                            </form>
                            {{---
                            <ul class="dropdown-menu dropdown-menu-search">

                                <li class="nav-item">
                                    <a class="nav-link" href="index.html">Morbi leo risus</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="index.html">Dapibus ac facilisis in</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="index.html">Porta ac consectetur ac</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="index.html">Vestibulum at eros</a>
                                </li>
                            </ul>
                        --}}
                        </div>

                        <ul class="nav navbar-nav">
                            <!-- User Account -->
                            <li class="dropdown user-menu">
                                <button class="dropdown-toggle nav-link" data-toggle="dropdown">
                                    <img src="{{ asset('template/theme/images/user/u7.jpg') }}"
                                        class="user-image rounded-circle" alt="User Image" />
                                    <span class="d-none d-lg-inline-block">Alexander Pierce</span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li class="dropdown-footer">
                                        <a class="dropdown-link-item" href="sign-in.html"> <i
                                                class="mdi mdi-logout"></i> Log Out </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>


            </header>

            <div class="content-wrapper mt-n5">
                <div class="content"><!-- For Components documentaion -->
                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                    <!-- /.container-fluid -->
                </div>
            </div>

            {{-- <!-- Footer -->
            <footer class="footer mt-auto">
                <div class="copyright bg-white">
                    <p>
                        &copy; <span id="copy-year"></span>
                </div>
                <script>
                    var d = new Date();
                    var year = d.getFullYear();
                    document.getElementById("copy-year").innerHTML = year;
                </script>
            </footer> --}}

        </div>
    </div>


    <script src="{{ asset('template/theme/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('template/theme/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('template/theme/plugins/simplebar/simplebar.min.js') }}"></script>
    <script src="https://unpkg.com/hotkeys-js/dist/hotkeys.min.js"></script>
    <script src="{{ asset('template/theme/plugins/apexcharts/apexcharts.js') }}"></script>
    <script src="{{ asset('template/theme/plugins/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('template/theme/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js') }}"></script>
    <script src="{{ asset('template/theme/plugins/jvectormap/jquery-jvectormap-world-mill.js') }}"></script>
    <script src="{{ asset('template/theme/plugins/jvectormap/jquery-jvectormap-us-aea.js') }}"></script>
    <script src="{{ asset('template/theme/plugins/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('template/theme/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script>
        jQuery(document).ready(function() {
            jQuery('input[name="dateRange"]').daterangepicker({
                autoUpdateInput: false,
                singleDatePicker: true,
                locale: {
                    cancelLabel: 'Clear'
                }
            });
            jQuery('input[name="dateRange"]').on('apply.daterangepicker', function(ev, picker) {
                jQuery(this).val(picker.startDate.format('MM/DD/YYYY'));
            });
            jQuery('input[name="dateRange"]').on('cancel.daterangepicker', function(ev, picker) {
                jQuery(this).val('');
            });
        });
    </script>



    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script src="{{ asset('template/theme/js/mono.js') }}"></script>
    <script src="{{ asset('template/theme/js/chart.js') }}"></script>
    <script src="{{ asset('template/theme/js/map.js') }}"></script>
    <script src="{{ asset('template/theme/js/custom.js') }}"></script>
</body>

</html>
