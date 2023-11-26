@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">جدول عملاء المختبر</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <button class="btn btn-primary m-3 col" data-toggle="modal" data-target="#exampleModal">اضافة عميل <i
                            class="fa fa-plus"></i></button>
                        <a class="btn btn-primary m-3 col" href="{{ route('cl.index') }}">تخصيص تحليل لعميل <i
                                class="fa fa-plus"></i></a>
                    </div>
                    
                    <div class="table-responsive">
                        <table id="user-table" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th class="border-bottom-0">الاسم</th>
                                    <th class="border-bottom-0">رقم الهاتف</th>
                                    <th class="border-bottom-0">الموقع</th>
                                    <th class="border-bottom-0">التحكم</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clients as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td><a href="{{ route('client_test',$item->id) }}">{{ $item->name }} </a></td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{{ $item->address }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('client.edit', $item->id) }}"
                                                class="btn btn-warning text-white">
                                                <i class="fa fa-edit"></i></a>
                                            <form action="{{ route('client.destroy', $item->id) }}" method="post"
                                                id="delete-user-{{ $item->id }}">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-danger text-white delete" type="submit"
                                                data-id="{{ $item->id }}"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form-client" method="post" action="{{ route('client.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="col-form-label text-md-end">اسم</label>
                            <div class="">
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    placeholder="اسم " value="{{ old('name') }}" required autocomplete="name"
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
                                    class="form-control @error('phone') is-invalid @enderror" placeholder="رقم الهاتف"
                                    name="phone" value="{{ old('phone') }}" required autocomplete="phone">
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
                                    class="form-control @error('password') is-invalid @enderror" placeholder="كلمة المرور"
                                    name="password"  required autocomplete="password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>موقع السكن </label>
                            <input type="text" name="address" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">حفظ البيانات</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(function() {
            $("#user-table").DataTable();
            function senddata() {
                $("#form-client").submit();
            }
            @if ($errors->any())
            $('#exampleModal').modal('show')
            @endif
        })
    </script>
@endsection
