@extends('layouts.app')

@section('content')
<div class="row row-sm">
    <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12">
        <div class="card  box-shadow-0">
            <div class="card-header">
                <h4 class="card-title mb-1">تعديل مجموعة التحاليل</h4>
            </div>
            <div class="card-body pt-0">

                <form method="POST" action="{{ route('group-test.update',$group->id) }}">
                    @method("PUT")
                    @csrf

                    <div class="form-group">
                        <label for="name" class="col-form-label text-md-end">اسم </label>

                        <div class="">
                            <input id="name" type="text"
                                class="form-control @error('name') is-invalid @enderror" name="name"
                                placeholder="اسم التحليل" value="{{ old('name',$group->name) }}" required autocomplete="name"
                                autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-form-label text-md-end">السعر </label>

                        <div class="">
                            <input id="price" type="text"
                                class="form-control @error('price') is-invalid @enderror" name="price"
                                placeholder="السعر" value="{{ old('price',$group->price) }}" required autocomplete="price"
                                autofocus>

                            @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
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
