@extends('layouts.app')

@section('content')
<div class="row row-sm">
    <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12">
        <div class="card  box-shadow-0">
            <div class="card-header">
                <h4 class="card-title mb-1">تعديل مستخدم</h4>
            </div>
            <div class="card-body pt-0">

                <form method="POST" action="{{ route('users.update',$user->id) }}">
                    @method("PUT")
                    @csrf

                    <div class="form-group">
                        <label for="name" class="col-form-label text-md-end">اسم </label>

                        <div class="">
                            <input id="name" type="text"
                                class="form-control @error('name') is-invalid @enderror" name="name"
                                placeholder="اسم المستخدم" value="{{ old('name',$user->name) }}" required autocomplete="name"
                                autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>



                    <div class="form-group">
                        <label for="username" class="col-form-label text-md-end">اسم المستخدم</label>

                        <div class="">
                            <input id="username" type="username"
                                class="form-control @error('username') is-invalid @enderror"
                                placeholder="البريد الالكتروني" name="username" value="{{ old('username',$user->username) }}" required
                                autocomplete="username">

                            @error('username')
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
                                class="form-control @error('password') is-invalid @enderror" placeholder="كلمة المرور"
                                name="password"  autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password-confirm" class="col-form-label text-md-end">تاكيد كلمة المرور</label>

                        <div class="">
                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" placeholder="تاكيد كلمة المرور"
                                autocomplete="new-password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="permission">الصلاحيات</label>
                        <br>

                        <input type="checkbox" id="check_select">
                        <select class="form-control select2 @error('password') is-invalid @enderror" id="permission"
                            name="permission" >
                            @foreach ($permission as $item)
                                <option @selected($item->name == $ourpermission) value="{{ $item->name }}">
                                    {{ $item->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('permission')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row mb-0">
                        <div class=" offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                تسجيل
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
