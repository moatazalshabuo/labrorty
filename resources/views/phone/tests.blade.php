@extends('layouts.mobile')

@section('content')
    <div class="row text-right" dir="rtl">
        <div class="col-md-12">
            @foreach ($tests as $item)
                <a href="@if ($item->status == 1) {{ route('mobile.test', $item->id) }} @endif">
                    <div class="card card-stats card-round p-2">
                        <div class="card-body">
                            <div class="row align-items-center">
                                @if ($item->status == 1)
                                    <div class="col-icon">
                                        <div class="icon-big text-center icon-success bubble-shadow-small">
                                            <i class="far fa-chart-bar"></i>
                                            <small class="text-white">جاهز</small>
                                        </div>
                                    </div>
                                @else
                                    <div class="col-icon">
                                        <div class="icon-big text-center icon-danger bubble-shadow-small">
                                            <i class="far fa-chart-bar"></i>
                                            <small class="text-white">غير جاهز</small>
                                        </div>
                                    </div>
                                @endif
                                <div class="col col-stats ml-3 ml-sm-0">
                                    <div class="numbers">
                                        <p class="card-category">{{ $item->group->name }}</p>
                                        <h4 class="card-title">{{ $item->created_at }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection
@section('script')
    <script>
        $("#user-table").DataTable();
    </script>
@endsection
