@extends('layouts.app')

@section('content')
    <div class="row text-right" dir="rtl" >
        <div class="col-md-12">
            <div class="card" >
                <div class="card-header">
                    <h4 class="card-title">جدول اصناف التحاليل</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('group-test.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <label>اسم المجموعة</label>
                                <input type="text" name="name" value="{{old('name')}}" required class="form-control">
                            </div>
                            @error('name')
                                <p>{{ $message }}</p>
                            @enderror
                            <div class="col-md-3">
                                <label>السعر</label>
                                <input type="number" name="price" value="{{old('name')}}" min="1" required class="form-control">
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-success" type="submit">حفظ</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">جدول اصناف التحاليل</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="user-table" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th class="border-bottom-0">الاسم</th>
                                    <th class="border-bottom-0">لوصف</th>
                                    <th>المجموعة</th>
                                    <th class="border-bottom-0">الوحدة</th>
                                    <th>المعدل الطبيعي</th>
                                    <th class="border-bottom-0">التحكم</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($LabTests as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->descripe }}</td>
                                        <td>{{ $item->group->name }}</td>
                                        <td>{{ $item->unit }}</td>
                                        <td>{{ $item->normal_form }} - {{ $item->normal_to }}</td>
                                        <td class="d-flex">

                                            <a href="{{ route('lab_tests.edit', $item->id) }}"
                                                class="btn btn-warning text-white">
                                                <i class="fa fa-edit"></i></a>

                                            <form action="{{ route('lab_tests.destroy', $item->id) }}" method="post"
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
@endsection
@section('script')
    <script>
        $("#user-table").DataTable();
    </script>
@endsection
