@extends('layouts.app')

@section('content')
    <div class="row text-right" dir="rtl" >
        <div class="col-md-12">
            <div class="card" >
                <div class="card-header">
                    <h4 class="card-title">اضافة تحليل لعميل<h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('cl.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="client_id" class="col-form-label text-md-end">العملاء</label>

                                    <div class="">
                                        <select class="form-control" name="client_id" required id="client_id">
                                            <option value="">اختر العميل</option>
                                            @foreach ($client as $item)
                                                <option @selected($item->id == old('client_id')) value="{{$item->id}}">{{$item->name}}</option>
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
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="group_id" class="col-form-label text-md-end">اختر التحاليل </label>

                                    <div class="">
                                        <select class="form-control" id="group_id" multiple required name="group_id[]">
                                            @foreach ($group as $item)
                                                <option @selected($item->id == old('group_id')) value="{{$item->id}}">{{$item->name}}</option>
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
@endsection
@section('script')
    <script>
        $(function(){
            $("#group_id").select2()
        $("#client_id").select2()
        $("#user-table").DataTable();
        })
    </script>
@endsection
