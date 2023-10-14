<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>@yield('title')</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    {{-- <link rel="icon" href="{{ URL::asset('assets/img/icon.ico') }}" type="image/x-icon" /> --}}
    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css') }}">
</head>

<body style="background-image: url({{ asset('assets/img/10.jpg') }});">
    <div style="height: 180px"></div>
<div class="container">
    <div class="row">
        <div class="col-6">
            <div class="card" style="width: 100%;">
                <img class="card-img-top" src="{{ asset('assets/img/44.png') }}" alt="Card image cap">
                <div class="card-body text-center">
                  <a href="{{ route('mobile') }}" class="card-text text-dark">عرض نتيجة </a>
                </div>
              </div>
        </div>
        <div class="col-6">
            <div class="card" style="width: 100%;">
                <img class="card-img-top" src="{{ asset('assets/img/55.png') }}" alt="Card image cap">
                <div class="card-body text-center">
                  <a href="{{ route('home') }}" class="card-text text-dark">الدخول للنظام</a>
                </div>
              </div>
        </div>
    </div>
</div>
</body>

</html>
