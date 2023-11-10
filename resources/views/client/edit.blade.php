@extends('layouts.app')

@section('content')
<div class="row row-sm">
    <div class="col-md-3"></div>
    <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12">
        <div class="card  box-shadow-0">
            <div class="card-header">
                <h4 class="card-title mb-1">تعديل بيانات العميل</h4>
            </div>
            <div class="card-body pt-0">

                <form method="POST" action="{{ route('client.update',$client->id) }}">
                    @method("PUT")
                    @csrf

                    <div class="form-group">
                        <label for="name" class="col-form-label text-md-end">اسم</label>

                        <div class="">
                            <input id="name" type="text"
                                class="form-control @error('name') is-invalid @enderror" name="name"
                                placeholder="اسم المستخدم" value="{{ old('name',$client->name) }}" required autocomplete="name"
                                autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>



                    <div class="form-group">
                        <label for="phone" class="col-form-label text-md-end">رقم الهاتف</label>

                        <div class="">
                            <input id="phone" type="phone"
                                class="form-control @error('phone') is-invalid @enderror"
                                placeholder="رقم الهاتف" name="phone" value="{{ old('phone',$client->phone) }}" required
                                autocomplete="phone">

                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-form-label text-md-end">كلمة المرور</label>

                        <div class="">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror"
                                placeholder="كلمة المرور" name="password" value="{{ old('password',$client->password) }}" required
                                autocomplete="password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label>موقع السكن </label>
                        <input type="text" name="address"  value="{{ old('address',$client->address) }}" class="form-control">

                    </div>
                    <div class="row mb-0">
                        <div class=" offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                تعديل
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        $("#user-table").DataTable();
    </script>
@endsection
