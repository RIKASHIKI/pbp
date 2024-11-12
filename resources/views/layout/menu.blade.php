<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="{{ asset('asset/img/img1.png') }}" type="image/png" />
    <title>STMIK Banjarbaru</title>

    <link href="{{ asset('asset/lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/lib/Ionicons/css/ionicons.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/lib/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/lib/jquery-toggles/toggles-full.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/lib/rickshaw/rickshaw.min.css') }}" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">

    <!-- sweetalert dan template amanda -->
    <link rel="stylesheet" href="{{ asset('asset/css/amanda.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    <div class="am-header">
        <div class="am-header-left">
            <a id="naviconLeft" href="" class="am-navicon d-none d-lg-flex"><i
                    class="icon ion-navicon-round"></i></a>
            <a id="naviconLeftMobile" href="" class="am-navicon d-lg-none"><i
                    class="icon ion-navicon-round"></i></a>
            <a href="index.html" class="am-logo">STMIK BJB</a>
        </div>

        <div class="am-header-right">

            <div class="dropdown dropdown-profile">
                <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
                    <img src="img/img3.jpg" class="wd-32 rounded-circle" alt="">
                    <span class="logged-name"><span class="hidden-xs-down">{{ Auth::user()->username }}</span> <i
                            class="fa fa-angle-down mg-l-3"></i></span>
                </a>
                <div class="dropdown-menu wd-200">
                    <ul class="list-unstyled user-profile-nav">
                        <li><a href=""><i class="icon ion-ios-person-outline"></i> Edit Profile</a></li>
                        <li><a href="{{ route('logout') }}"><i class="icon ion-power"></i> Sign Out</a></li>
                    </ul>
                </div><!-- dropdown-menu -->
            </div><!-- dropdown -->
        </div><!-- am-header-right -->
    </div><!-- am-header -->

    <div class="am-sideleft">
        <ul class="nav am-sideleft-tab">
            <li class="nav-item">
                <a href="#" class="nav-link active"><i class="icon ion-ios-home-outline tx-24"></i></a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link"><i class="icon ion-ios-home-outline tx-24"></i></a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link"><i class="icon ion-ios-home-outline tx-24"></i></a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link"><i class="icon ion-ios-home-outline tx-24"></i></a>
            </li>
        </ul>

        <div class="tab-content">
            <div id="mainMenu" class="tab-pane active">
                <ul class="nav am-sideleft-menu">
                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
                            <i class="icon ion-ios-home-outline"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('barang.index') }}"
                            class="nav-link {{ Request::is('barang') ? 'active' : '' }}">
                            <i class="icon ion-ios-home-outline"></i>
                            <span>Barang</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('suplier.index') }}"
                            class="nav-link {{ request::is('suplier') ? 'active' : '' }}">
                            <i class="icon ion-ios-home-outline"></i>
                            <span>Suplier</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('pembeli.tampil') }}"
                            class="nav-link {{ request::is('pembeli') ? 'active' : '' }}">
                            <i class="icon ion-ios-home-outline"></i>
                            <span>Pembeli</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('pembelian.index') }}"
                            class="nav-link {{ request::is('pembelian') ? 'active' : '' }}">
                            <i class="icon ion-ios-home-outline"></i>
                            <span>Pembelian</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('pesanan.index') }}"
                            class="nav-link {{ request::is('pesanan') ? 'active' : '' }}">
                            <i class="icon ion-ios-home-outline"></i>
                            <span>pesanan</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.index') }}"
                            class="nav-link {{ request::is('user') ? 'active' : '' }}">
                            <i class="icon ion-ios-home-outline"></i>
                            <span>user</span>
                        </a>
                    </li>
                    <!-- nav-item -->
                    <li class="nav-item">
                        <a href="" class="nav-link with-sub">
                            <i class="fa fa-desktop"></i>
                            <span>master</span>
                        </a>
                        <ul class="nav-sub">
                            <li class="nav-link {{ request::is('home') ? 'active' : '' }}"><a href="{{ route('home') }}" class="nav-link"><i class="fa fa-home"></i><span>beranda</span></a></li>
                            <li class="nav-link {{ request::is('barang') ? 'active' : '' }}"><a href="{{ route('barang.index') }}" class="nav-link"><i class="fa fa-cube"></i>barang</a></li>
                            <li class="nav-link {{ request::is('pembeli') ? 'active' : '' }}"><a href="{{ route('pembeli.tampil') }}" class="nav-link"><i class="icon ion-locked"></i>pembeli</a></li>
                            <li class="nav-link {{ request::is('suplier') ? 'active' : '' }}"><a href="{{ route('suplier.index') }}" class="nav-link"><i class="fa fa-truck"></i>suplier</a></li>
                            <li class="nav-link {{ request::is('pembelian') ? 'active' : '' }}"><a href="{{ route('pembelian.index') }}" class="nav-link"><i class="fa fa-credit-card"></i>pembelian</a></li>
                            <li class="nav-link {{ request::is('pesanan') ? 'active' : '' }}"><a href="{{ route('pesanan.index') }}" class="nav-link"><i class="icon ion-chatboxes"></i>pesanan</a></li>
                            <li class="nav-link {{ request::is('user') ? 'active' : '' }}"><a href="{{ route('admin.index') }}" class="nav-link"><i class="icon ion-person"></i>user</a></li>
                        </ul>
                    </li><!-- nav-item -->



                </ul>
            </div><!-- #mainMenu -->
        </div><!-- tab-content -->
    </div><!-- am-sideleft -->
    <div class="am-pagetitle">
        <h5 class="am-title">{{ isset($judul) ? $judul : '' }}</h5>
    </div>
    <div class="am-mainpanel">

        <div class="am-pagebody">
            @yield('konten')
        </div>
    </div>
    <script src="{{ asset('asset/lib/jquery/jquery.js') }}"></script>
    <script src="{{ asset('asset/lib/popper.js/popper.js') }}"></script>
    <script src="{{ asset('asset/lib/bootstrap/bootstrap.js') }}"></script>
    <script src="{{ asset('asset/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js') }}"></script>
    <script src="{{ asset('asset/lib/jquery-toggles/toggles.min.js') }}"></script>
    <script src="{{ asset('asset/lib/d3/d3.js') }}"></script>
    <script src="{{ asset('asset/lib/rickshaw/rickshaw.min.js') }}"></script>
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyAEt_DBLTknLexNbTVwbXyq2HSf2UbRBU8"></script>
    <script src="{{ asset('asset/lib/gmaps/gmaps.js') }}"></script>
    <script src="{{ asset('asset/lib/Flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('asset/lib/Flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('asset/lib/Flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('asset/lib/flot-spline/jquery.flot.spline.js') }}"></script>

    <script src="{{ asset('asset/js/amanda.js') }}"></script>
    <script src="{{ asset('asset/js/ResizeSensor.js') }}"></script>
    <script src="{{ asset('asset/js/dashboard.js') }}"></script>

    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        new DataTable('#exa');
    </script>
</body>

</html>
