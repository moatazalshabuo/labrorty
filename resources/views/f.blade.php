<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>@yield('title')</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    {{-- <link rel="icon" href="{{ URL::asset('assets/img/icon.ico') }}" type="image/x-icon" /> --}}
    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css') }}">
    <style>
        @import url(https://fonts.googleapis.com/earlyaccess/droidarabickufi.css);

        /* font-family: 'Lateef', serif; */
        body * {
            font-family: 'Droid Arabic Kufi', serif;

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
</head>

<body
    style="background-image: url({{ asset('assets/bg1.JPEG') }});background-size: cover;background-repeat: no-repeat;">
    <div id="preloader">
        <div id="loader"></div>
    </div>
    <div style="height: 70px"></div>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="card shadow-lg p-0" style="width: 100%;">
                    <a href="{{ route('mobile') }}" class="card-text text-dark">
                        <img class="card-img-top" src="{{ asset('assets/img/44.png') }}" alt="Card image cap">
                        <div class="card-body text-center">
                            <small>عرض نتيجة
                            </small>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-6">
                <div class="card shadow-lg p-0" style="width: 100%;">
                    <a href="{{ route('home') }}" class="card-text text-dark">
                        <img class="card-img-top" src="{{ asset('assets/img/55.png') }}" alt="Card image cap">
                        <div class="card-body text-center">
                            <small>الدخول للنظام
                            </small>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ URL::asset('assets/js/core/jquery.3.2.1.min.js') }}"></script>
    <script>
        $(function() {
            $('#preloader').fadeOut('slow', function() {
                $(this).remove();
            });
        }, 100);
    </script>
</body>

</html>
