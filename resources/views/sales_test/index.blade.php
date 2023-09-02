@extends('layouts.app')

@section('content')
    <div class="row text-right" dir="rtl">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">اضافة تحليل لعميل<h4>
                </div>
                <div class="card-body">
                    <button class="btn btn-primary m-3" data-toggle="modal" data-target="#exampleModal">اضافة عميل <i
                        class="fa fa-plus"></i></button>
                    <form action="{{ route('cl.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="client_id" class="col-form-label text-md-end">العملاء</label>

                                    <div class="">
                                        <select class="form-control" name="client_id" required id="client_id">
                                            <option value="">اختر العميل</option>
                                            @foreach ($client as $item)
                                                <option @selected($item->id == old('client_id') || Session::get('client_id') == $item->id)  value="{{ $item->id }}">
                                                    {{ $item->name }}</option>
                                            @endforeach
                                        </select>

                                        @error('client_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="group_id" class="col-form-label text-md-end">اختر التحاليل </label>

                                    <div class="">
                                        <select class="form-control" id="group_id" multiple required name="group_id[]">
                                            @foreach ($group as $item)
                                                <option @selected($item->id == old('group_id')) value="{{ $item->id }}">
                                                    {{ $item->name }}</option>
                                            @endforeach
                                        </select>

                                        @error('group_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-success m-5" type="submit">حفظ</button>
                            </div>
                        </div>
                    </form>
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
                                    placeholder="اسم " value="{{ old('name') }}" required autocomplete="name" autofocus>

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
            $("#group_id").select2()
            $("#client_id").select2()
            $("#user-table").DataTable();
            @if ($errors->any())
                $('#exampleModal').modal('show')
            @endif
        })
    </script>
@endsection
