@extends('layouts.mobile')
@section('css')
    <style>
        body{
            background-color: #fff
        }
        .divider:after,
        .divider:before {
            content: "";
            flex: 1;
            height: 1px;
            background: #eee;
        }
    </style>
@endsection
@section('content')
    <section class="vh-100">
        <div class="container h-100">
            <div class="row d-flex py-3 align-items-center justify-content-center h-100">
                <div class="col-md-8 col-lg-7 col-xl-6">
                    <img src="{{URL::asset('assets/img/Screen.png')}}"
                        class="img-fluid" alt="Phone image">
                </div>
                <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                    <form action="{{route('mobile.login')}}" method="post">
                        @csrf
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="text" name="phone" class=" bg-light form-control form-control-lg  @if(Session::has('error')) is-invalid @endif" />
                            <label class="form-label" for="form1Example13">رقم الهاتف</label>
                            
                        </div>
                        <div class="form-outline mb-4">
                            <input type="password" name="password" class="bg-light form-control form-control-lg  @if(Session::has('error')) is-invalid @endif" />
                            <label class="form-label" for="form1Example13">كلمة المرور</label>
                           
                        </div>
                        <span>
                            @if(Session::has('error'))
                            <div class="alert alert-danger">
                            {{ Session::get('error')}}
                            </div>
                            @endif
                        </span>
                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-lg btn-block">الدخول</button>
                    </form>
                </div>
                <a href="{{ route('ho') }}">العودة لصفحة الدخول</a>
            </div>
        </div>
    </section>
@endsection
