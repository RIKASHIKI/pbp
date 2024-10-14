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

    <link rel="stylesheet" href="{{ asset('asset/css/amanda.css') }}">
</head>

<body>

    <div class="am-header">
        <div class="am-header-left">
            <a id="naviconLeft" href="" class="am-navicon d-none d-lg-flex"><i class="icon ion-navicon-round"></i></a>
            <a id="naviconLeftMobile" href="" class="am-navicon d-lg-none"><i class="icon ion-navicon-round"></i></a>
            <a href="index.html" class="am-logo">STMIK BJB</a>
        </div>

        <div class="am-header-right">

            <div class="dropdown dropdown-profile">
                <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
                    <img src="img/img3.jpg" class="wd-32 rounded-circle" alt="">
                    <span class="logged-name"><span class="hidden-xs-down">Jane Doe</span> <i class="fa fa-angle-down mg-l-3"></i></span>
                </a>
                <div class="dropdown-menu wd-200">
                    <ul class="list-unstyled user-profile-nav">
                        <li><a href=""><i class="icon ion-ios-person-outline"></i> Edit Profile</a></li>
                        <li><a href=""><i class="icon ion-power"></i> Sign Out</a></li>
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
                <a href="#" class="nav-link"></a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link"></a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link"></a>
            </li>
        </ul>

        <div class="tab-content">
            <div id="mainMenu" class="tab-pane active">
                <ul class="nav am-sideleft-menu">
                    <li class="nav-item">
                        <a href="{{route('home')}}" class="nav-link {{ Request::is('beranda') ? 'active' : '' }}">
                            <i class="icon ion-ios-home-outline"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('barang.index')}}" class="nav-link {{ Request::is('barang') ? 'active' : '' }}">
                            <i class="icon ion-ios-home-outline"></i>
                            <span>Barang</span>
                        </a>
                    </li>


                    <!-- nav-item -->
                    <li class="nav-item">
                        <a href="" class="nav-link with-sub">
                            <i class="icon ion-ios-gear-outline"></i>
                            <span>Forms</span>
                        </a>
                        <ul class="nav-sub">
                            <li class="nav-item"><a href="form-elements.html" class="nav-link">Form Elements</a></li>
                            <li class="nav-item"><a href="form-layouts.html" class="nav-link">Form Layouts</a></li>
                            <li class="nav-item"><a href="form-validation.html" class="nav-link">Form Validation</a></li>
                            <li class="nav-item"><a href="form-wizards.html" class="nav-link">Form Wizards</a></li>
                            <li class="nav-item"><a href="form-editor-text.html" class="nav-link">Text Editor</a></li>
                        </ul>
                    </li><!-- nav-item -->



                </ul>
            </div><!-- #mainMenu -->
        </div><!-- tab-content -->
    </div><!-- am-sideleft -->

    <div class="am-mainpanel">
        <div class="am-pagetitle">
            <h5 class="am-title">{{ isset($judul) ? ($judul) : '' }}</h5>
        </div>
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
</body>

</html>