@extends('layouts.app')

@section('content')
    <div class="row row-sm">
        <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12">
            <div class="card  box-shadow-0">
                <div class="card-header">
                    <h4 class="card-title mb-1">تعديل التحاليل</h4>
                </div>
                <div class="card-body pt-0">

                    <form method="POST" action="{{ route('lab_tests.update',$LabTest->id) }}">
                        @method("PUT")
                        @csrf

                        <div class="form-group">
                            <label for="name" class="col-form-label text-md-end">اسم </label>

                            <div class="">
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    placeholder="اسم المستخدم" value="{{ old('name',$LabTest->name) }}" required autocomplete="name"
                                    autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="descripe" class="col-form-label text-md-end">الوصف </label>

                            <div class="">
                                <input id="descripe" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="descripe"
                                    placeholder="اسم المستخدم" value="{{ old('descripe',$LabTest->descripe) }}" autocomplete="descripe"
                                    autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="group_id" class="col-form-label text-md-end">المجوعة </label>
                            <div class="">
                                <select class="form-control" name="group_id">
                                    @foreach ($group as $item)
                                        <option @selected($item->id == old('group_id',$LabTest->group_id)) value="{{ $item->id }}">{{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('group_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="unit" class="col-form-label text-md-end">الوحدة </label>
                            <div class="">
                                <input id="unit" type="text"
                                    class="form-control @error('unit') is-invalid @enderror" name="unit"
                                    placeholder="وحدة القياس" value="{{ old('unit',$LabTest->unit) }}" required autocomplete="unit"
                                    autofocus>

                                @error('unit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="normal_form" class="col-form-label text-md-end">المعدل الطبيعي من </label>

                                    <div class="">
                                        <input id="normal_form" type="text"
                                            class="form-control @error('normal_form') is-invalid @enderror"
                                            name="normal_form" placeholder="المعدل الطبيعي"
                                            value="{{ old('normal_form',$LabTest->normal_form) }}" required autocomplete="normal_form" autofocus>

                                        @error('normal_form')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="normal_to" class="col-form-label text-md-end">المعدل الطبيعي الى </label>

                                    <div class="">
                                        <input id="normal_to" type="text"
                                            class="form-control @error('normal_to') is-invalid @enderror" name="normal_to"
                                            placeholder=">المعدل الطبيعي الى" value="{{ old('normal_to',$LabTest->normal_to) }}" required
                                            autocomplete="normal_to" autofocus>

                                        @error('normal_to')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class=" offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    حفظ
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
