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
    style="background-image: url({{ asset('assets/img/fff.JPEG') }});background-size: cover;background-repeat: no-repeat;">
    <div id="preloader">
        <div id="loader"></div>
    </div>
    <div style="height: 70px"></div>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="card  p-0 m-auto" style="width: 75%;background-color: #fff0;box-shadow:none;border: 0;">
                    <a href="{{ route('mobile') }}" class="card-text text-dark">
                        <img class="card-img-top" src="{{ asset('assets/img/44-removebg-preview.png') }}" alt="Card image cap">
                        <div class="card-body text-center p-1">
                            <small>عرض نتيجة
                            </small>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-6">
                <div class="card  p-0 m-auto" style="width: 75%;background-color: #fff0;box-shadow:none;border: 0;">
                    <a href="{{ route('home') }}" class="card-text text-dark">
                        <img class="card-img-top" src="{{ asset('assets/img/55-removebg-preview.png') }}" alt="Card image cap">
                        <div class="card-body text-center p-1">
                            <small>الدخول للنظام
                            </small>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <a href="{{ route('about1') }}" class="badge badge-primary position-absolute" style="bottom: 170px;left:40%">حول النظام</a>
    <marquee class="bg-white p-3 position-absolute" style="bottom: 55px">
        @foreach ($test as $item)
            <span class="m-3">{{$item->name}} <span class="badge badge-success">{{$item->price}}</span>: سعر - </span>
        @endforeach      
    </marquee>
    <marquee direction='right' class="bg-white p-3 position-absolute" style="bottom: 0px" >
        المختبر الطبي التشخيصي هو مخُتبر في مدينة سبها يقوم عادة بإجراء الفحوص على العينات السريرية للحصول على معلومات عن صحة المريض كجزء من التشخيص والعلاج والوقاية من الأمراض. 
في هذا التطبيق يُمكنك استلام نتائج التحاليل عن بُعد ورياحية ، بالاظافة اللى انه يُمكّنك من التواصل مع احد موظفي المخُتبر بواسطة الاستشاره الطبيه للأستفسار عن شيء معُين .
    </marquee>
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
