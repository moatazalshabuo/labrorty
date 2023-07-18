<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>@yield('title')</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="{{ URL::asset('assets/img/icon.ico') }}" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="{{ URL::asset('assets/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Open+Sans:300,400,600,700"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"],
                urls: ['../{{ URL::asset('assets/css/fonts.css') }}']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/azzara.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ URL::asset('assets/css/demo.css') }}">
    <style>
        @import url(https://fonts.googleapis.com/earlyaccess/droidarabickufi.css);

        /* font-family: 'Lateef', serif; */
        body * {
            font-family: font-family: 'Droid Arabic Kufi', serif;
            ;
        }

        #preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #2a80bb;
            z-index: 50000000;
        }

        #loader {
            display: block;
            position: relative;
            left: 50%;
            top: 50%;
            width: 150px;
            height: 150px;
            margin: -75px 0 0 -75px;
            border-radius: 50%;
            border: 3px solid transparent;
            border-top-color: #c2deff;
            -webkit-animation: spin 2s linear infinite;
            animation: spin 2s linear infinite;
        }

        #loader:before {
            content: "";
            position: absolute;
            top: 5px;
            left: 5px;
            right: 5px;
            bottom: 5px;
            border-radius: 50%;
            border: 3px solid transparent;
            border-top-color: #000000;
            -webkit-animation: spin 3s linear infinite;
            animation: spin 3s linear infinite;
        }

        #loader:after {
            content: "";
            position: absolute;
            top: 15px;
            left: 15px;
            right: 15px;
            bottom: 15px;
            border-radius: 50%;
            border: 3px solid transparent;
            border-top-color: #ffffff;
            -webkit-animation: spin 1.5s linear infinite;
            animation: spin 1.5s linear infinite;
        }

        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
                -ms-transform: rotate(0deg);
                transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
                -ms-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

        @keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
                -ms-transform: rotate(0deg);
                transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
                -ms-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }
    </style>
    @yield('css')
</head>

<body>

    <div class="wrapper">
        <div id="preloader">
            <div id="loader"></div>
        </div>
        <!--
   Tip 1: You can change the background color of the main header using: data-background-color="blue | purple | light-blue | green | orange | red"
  -->
        <div class="main-header" data-background-color="purple">
            <!-- Logo Header -->
            <div class="logo-header">

                <a href="index.html" class="logo text-white">
                    <b>مختبر البشرى</b>
                </a>
                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
                    data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="fa fa-bars"></i>
                    </span>
                </button>
                <button class="topbar-toggler more"><i class="fa fa-ellipsis-v"></i></button>
                <div class="navbar-minimize">
                    <button class="btn btn-minimize btn-rounded">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>
            </div>
            <!-- End Logo Header -->

            <!-- Navbar Header -->
            <nav class="navbar navbar-header navbar-expand-lg">

                <div class="container-fluid">

                    <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">

                        <li class="nav-item dropdown hidden-caret">
                            <a class="nav-link " href="{{ route('message.index') }}" aria-haspopup="true"
                                aria-expanded="false">
                                <i class="fa fa-envelope"></i>
                                <span class="notification">{{ Helepers::countMassage() }}</span>
                            </a>

                        </li>

                        <li class="nav-item dropdown hidden-caret">
                            <a class="profile-pic" href="" aria-expanded="false">
                                <div class="avatar-sm">
                                    <img src="{{ URL::asset('assets/img/profile.jpg') }}" alt="..."
                                        class="avatar-img rounded-circle">
                                </div>
                            </a>
                        </li>

                    </ul>
                </div>
            </nav>
            <!-- End Navbar -->
        </div>

        <!-- Sidebar -->
        <div class="sidebar">

            <div class="sidebar-background"></div>
            <div class="sidebar-wrapper scrollbar-inner">
                <div class="sidebar-content">
                    <div class="user">
                        <div class="avatar avatar-online">
                            <span class="avatar-title rounded-circle border border-white bg-info"><i
                                    class="fa fa-user"></i></span>
                        </div>
                        <div class="info">
                            <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                                <span>
                                    {{ auth()->user()->name }}
                                    <span class="user-level"></span>
                                    <span class="caret"></span>
                                </span>
                            </a>
                            <div class="clearfix"></div>

                            <div class="collapse in" id="collapseExample">
                                <ul class="nav">

                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="btn btn-primary">Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <ul class="nav">
                        <li class="nav-item active">
                            <a href="{{ route('home') }}">
                                <i class="fas fa-home"></i>
                                <p>الرئيسية</p>
                                <span class="badge badge-count">5</span>
                            </a>
                        </li>
                        @if (Auth::user()->hasRole('المسؤول') || Auth::user()->hasRole('الاداري'))
                            <li class="nav-section">
                                <span class="sidebar-mini-icon">
                                    <i class="fa fa-ellipsis-h"></i>
                                </span>
                                <h4 class="text-section">المستخدمين</h4>
                            </li>
                            <li class="nav-item">
                                <a data-toggle="collapse" href="#base">
                                    <i class="fas fa-layer-group"></i>
                                    <p> المستخدمن</p>
                                    <span class="caret"></span>
                                </a>
                                <div class="collapse" id="base">
                                    <ul class="nav nav-collapse">
                                        <li>
                                            <a href="{{ route('users.index') }}">
                                                <span class="sub-item">ادارة المستخدمن</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('users.create') }}">
                                                <span class="sub-item">اضافة مستخدم</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        @endif
                        <li class="nav-section">
                            <span class="sidebar-mini-icon">
                                <i class="fa fa-user"></i>
                            </span>
                            <h4 class="text-section">العملاء</h4>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('client.index') }}">
                                <i class="fa fa-users"></i>
                                <p> العملاء</p>
                                {{-- <span class="caret"></span> --}}
                            </a>

                        </li>
                        <li class="nav-item">
                            <a data-toggle="collapse" href="#base3">
                                <i class="fas fa-layer-group"></i>
                                <p> تحليل لعميل</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="base3">
                                <ul class="nav nav-collapse">

                                    <li>
                                        <a href="{{ route('cl.index') }}">
                                            <span class="sub-item">اضافة تحليل</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('cl.finish') }}">
                                            <span class="sub-item"> التحاليل المكتملة</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('cl.notfinish') }}">
                                            <span class="sub-item"> التحاليل الغير المكتملة</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-section">
                            <span class="sidebar-mini-icon">
                                <i class="fa fa-user"></i>
                            </span>
                            <h4 class="text-section">التحاليل</h4>
                        </li>
                        @if (Auth::user()->hasRole('المسؤول') || Auth::user()->hasRole('الاداري'))
                            <li class="nav-item">
                                <a href="{{ route('group-test.index') }}">
                                    <i class="fa fa-flask"></i>
                                    <p> مجموعات التحاليل</p>
                                    {{-- <span class="caret"></span> --}}
                                </a>

                            </li>
                            <li class="nav-item">
                                <a data-toggle="collapse" href="#base2">
                                    <i class="fas fa-layer-group"></i>
                                    <p> التحاليل</p>
                                    <span class="caret"></span>
                                </a>
                                <div class="collapse" id="base2">
                                    <ul class="nav nav-collapse">
                                        <li>
                                            <a href="{{ route('lab_tests.index') }}">
                                                <span class="sub-item">ادارة التحاليل</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('lab_tests.create') }}">
                                                <span class="sub-item">اضافة تحليل</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Sidebar -->

        <div class="main-panel">
            <div class="content">
                <div class="page-inner text-right" dir="rtl">
                    @yield('content')
                </div>
            </div>

        </div>

        >
    </div>
    </div>
    <!--   Core JS Files   -->
    <script src="{{ URL::asset('assets/js/core/jquery.3.2.1.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/core/bootstrap.min.js') }}"></script>

    <!-- jQuery UI -->
    <script src="{{ URL::asset('assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script>

    <!-- jQuery Scrollbar -->
    <script src="{{ URL::asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

    <!-- Moment JS -->
    <script src="{{ URL::asset('assets/js/plugin/moment/moment.min.js') }}"></script>

    <!-- Chart JS -->
    <script src="{{ URL::asset('assets/js/plugin/chart.js') }}/chart.min.js')}}"></script>

    <!-- jQuery Sparkline -->
    <script src="{{ URL::asset('assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>

    <!-- Chart Circle -->
    <script src="{{ URL::asset('assets/js/plugin/chart-circle/circles.min.js') }}"></script>

    <!-- Datatables -->
    <script src="{{ URL::asset('assets/js/plugin/datatables/datatables.min.js') }}"></script>

    <!-- Bootstrap Notify -->
    <script src="{{ URL::asset('assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

    <!-- Bootstrap Toggle -->
    <script src="{{ URL::asset('assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js') }}"></script>

    <!-- jQuery Vector Maps -->
    <script src="{{ URL::asset('assets/js/plugin/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/plugin/jqvmap/maps/jquery.vmap.world.js') }}"></script>

    <!-- Google Maps Plugin -->
    <script src="{{ URL::asset('assets/js/plugin/gmaps/gmaps.js') }}"></script>

    <!-- Sweet Alert -->
    <script src="{{ URL::asset('assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>

    <!-- Azzara JS -->
    <script src="{{ URL::asset('assets/js/ready.min.js') }}"></script>

    <!-- Azzara DEMO methods, don't include it in your project! -->
    <script src="{{ URL::asset('assets/js/setting-demo.js') }}"></script>
    <script src="{{ URL::asset('assets/js/demo.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>

            $(function() {
                $('#preloader').fadeOut('slow', function() {
                    $(this).remove();
                });
            }, 100);

    </script>
    @if (Session::has('success'))
        <script>
             $(function() {
            var message = "{{ Session::get('success') }}"
            $.notify({
                icon: 'flaticon-alarm-1',
                title: 'رسالة',
                message: message,
            }, {
                type: 'success',
                placement: {
                    from: "bottom",
                    align: "right"
                },
                time: 1000,
            });
        });
        </script>
    @endif
    @if (Session::has('error'))
        <script>
             $(function() {
            var message = "{{ Session::get('error') }}"
            $.notify({
                icon: 'flaticon-alarm-1',
                title: 'رسالة',
                message: message,
            }, {
                type: 'danger',
                placement: {
                    from: "bottom",
                    align: "right"
                },
                time: 1000,
            });
        });
        </script>
    @endif
    @yield('script')
</body>

</html>
