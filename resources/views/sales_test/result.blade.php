@extends('layouts.app')

@section('content')
<div class="row row-sm">
    <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12">
        <div class="card  box-shadow-0" dir="rtl">
            <div class="card-header">
                <h4 class="card-title mb-1">تعديل مجموعة التحاليل</h4>
            </div>
            <div class="card-body pt-0">

                <form method="POST" action="{{ route('cll.update.result',$clientGroupTest) }}">
                    @csrf
                    @foreach ($test as $item)
                    <div class="row m-3">
                        <div class="col-md-4">
                            <label for="">{{ $item->client_tests->name }}</label>
                        </div>
                        <div class="col-md-6">
                            <input type="number" step="any" required name="{{$item->id}}" value="{{old($item->id,$item->result)}}" class="form-control">
                        </div>
                    </div>
                    @endforeach
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
