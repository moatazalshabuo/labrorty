@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-6">
                        <div class="card card-stats p-1 card-round mx-auto" style="width: 75%;">
                            <div class="card-body">
                                <a href="{{ route('cl.index') }}">
                                    <div class=" text-center">
                                        <div class="icon-big text-center icon-secondary bubble-shadow-small">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        </div>
                                    </div>

                                    <p class="card-category text-center" style="font-size: 10px">الاستقبال</p>
                                    {{-- <h4 class="card-title">{{ $cusers }}</h4> --}}

                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card card-stats card-round p-1 mx-auto" style="width: 75%;">
                            <div class="card-body p-1">
                                <div class="" data-toggle="modal" data-target="#employee">
                                    <div class=" text-center">
                                        <div class="icon-big text-center icon-secondary bubble-shadow-small">
                                            <i class="fa fa-users"></i>
                                        </div>
                                    </div>

                                    <p class="card-category text-center" style="font-size: 10px">الموظفين</p>
                                    {{-- <h4 class="card-title">{{ $cclient }}</h4> --}}

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card card-stats card-round p-1 mx-auto" style="width: 75%;">
                            <div class="card-body p-1">
                                <a href="#" data-toggle="modal" data-target="#analysis">
                                    <div class="text-center">
                                        <div class="icon-big text-center icon-secondary bubble-shadow-small">
                                            <i class="fa fa-flask"></i>
                                        </div>
                                    </div>
                                    <p class="card-category text-center" style="font-size: 10px"> بيانات التحاليل</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card card-stats card-round p-1 mx-auto" style="width: 75%;">
                            <div class="card-body p-1">
                                <a href="{{ route('cl.finish') }}">
                                    <div class=" text-center">
                                        <div class="icon-big text-center icon-secondary bubble-shadow-small">
                                            <i class="fa fa-check-square-o" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <p class="card-category text-center" style="font-size: 10px"> التحاليل مكتملة</p>
                                    {{-- <h4 class="card-title">{{ $cfinish }}</h4> --}}
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card card-stats card-round p-1 mx-auto" style="width: 75%;">
                            <div class="card-body p-1">
                                <a href="{{ route('cl.notfinish') }}">
                                    <div class=" text-center">
                                        <div class="icon-big text-center icon-secondary bubble-shadow-small">
                                            <i class="fa fa-retweet" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <p class="card-category text-center" style="font-size: 10px"> التحاليل غير مكتملة</p>
                                    {{-- <h4 class="card-title">{{ $cfinish }}</h4> --}}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="card-head-row">
                            <div class="card-title">اخر التحاليل التي قام بها المختبر</div>

                        </div>
                    </div>
                    <div class="card-body">
                        @foreach ($client_group as $item)
                            <div class="d-flex">
                                <div class="avatar avatar-online">
                                    <span class="avatar-title rounded-circle border border-white bg-info"><i
                                            class="fa fa-user"></i></span>
                                </div>
                                <div class="flex-1 ml-3 pt-1">
                                    <h5 class="text-uppercase fw-bold mb-1">{{ $item->client->name }}<span
                                            class="text-warning pl-3">
                                            @if ($item->status == 1)
                                                مكتملة
                                            @else
                                                غير مكتملة
                                            @endif
                                        </span>
                                    </h5>
                                    <span class="text-muted">التحليل : {{ $item->group->name }}</span>
                                </div>
                                <div class="float-right pt-1">
                                    <small class="text-muted">8:40 PM</small>
                                </div>
                            </div>
                            <div class="separator-dashed"></div>
                        @endforeach
                    </div>
                </div>
            </div> --}}
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="employee" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">الموظفين</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                    @if(Auth::user()->hasRole('المسؤول'))
                        <div class="row">
                            <div class="col-6">
                                <div class="card card-stats card-round p-1">
                                    <div class="card-body p-1">
                                        <a href="{{ route('users.create') }}">
                                            <div class=" text-center">
                                                <div class="icon-big text-center icon-secondary bubble-shadow-small">
                                                    <i class="fa fa-user-plus"></i>
                                                </div>
                                            </div>

                                            <p class="card-category text-center" style="font-size: 10px">اضافة</p>
                                            {{-- <h4 class="card-title">{{ $cclient }}</h4> --}}

                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card card-stats card-round p-1">
                                    <div class="card-body p-1">
                                        <a href="{{ route('users.index') }}">
                                            <div class=" text-center">
                                                <div class="icon-big text-center icon-secondary bubble-shadow-small">
                                                    <i class="fa fa-users"></i>
                                                </div>
                                            </div>
                                            <p class="card-category text-center" style="font-size: 10px">ادارة</p>
                                            {{-- <h4 class="card-title">{{ $cclient }}</h4> --}}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <p>لاتملك الصلاحيات</p>
                    @endif

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">العودة</button>

                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="analysis" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">التحاليل</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if(Auth::user()->hasRole('المسؤول'))
                        <div class="row">
                            <div class="col-6">
                                <div class="card card-stats card-round p-1">
                                    <div class="card-body p-1">
                                        <a href="{{ route('group-test.index') }}">
                                            <div class=" text-center">
                                                <div class="icon-big text-center icon-secondary bubble-shadow-small">
                                                    <i class="fa fa-flask" aria-hidden="true"></i>
                                                </div>
                                            </div>

                                            <p class="card-category text-center" style="font-size: 10px">مجموعات التحاليل</p>
                                            {{-- <h4 class="card-title">{{ $cclient }}</h4> --}}

                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card card-stats card-round p-1">
                                    <div class="card-body p-1">
                                        <a href="{{ route('lab_tests.index') }}">
                                            <div class=" text-center">
                                                <div class="icon-big text-center icon-secondary bubble-shadow-small">
                                                    <i class="fa fa-flask" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                            <p class="card-category text-center" style="font-size: 10px">بيانات التحاليل</p>
                                            {{-- <h4 class="card-title">{{ $cclient }}</h4> --}}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <p>لا تملك الصلاحيات</p>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">العودة</button>

                </div>
            </div>
        </div>
    </div>
@endsection
