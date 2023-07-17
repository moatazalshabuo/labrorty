@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-stats p-1 card-round">
                            <div class="card-body ">
                                <div class="row align-items-center">
                                    <div class="col-icon">
                                        <div class="icon-big text-center icon-secondary bubble-shadow-small">
                                            <i class="fa fa-users"></i>
                                        </div>
                                    </div>
                                    <div class="col col-stats ml-3 ml-sm-0">
                                        <div class="numbers">
                                            <p class="card-category">عدد المستخدمين</p>
                                            <h4 class="card-title">{{ $cusers }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-stats card-round p-1">
                            <div class="card-body p-1">
                                <div class="row align-items-center">
                                    <div class="col-icon">
                                        <div class="icon-big text-center icon-secondary bubble-shadow-small">
                                            <i class="fa fa-users"></i>
                                        </div>
                                    </div>
                                    <div class="col col-stats ml-3 ml-sm-0">
                                        <div class="numbers">
                                            <p class="card-category">عدد الزوار</p>
                                            <h4 class="card-title">{{ $cclient }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-stats card-round p-1">
                            <div class="card-body p-1">
                                <div class="row align-items-center">
                                    <div class="col-icon">
                                        <div class="icon-big text-center icon-secondary bubble-shadow-small">
                                            <i class="fa fa-flask"></i>
                                        </div>
                                    </div>
                                    <div class="col col-stats ml-3 ml-sm-0">
                                        <div class="numbers">
                                            <p class="card-category"> عدد التحاليل التي يقدمها المختبر</p>
                                            <h4 class="card-title">{{ $cgroup }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-stats card-round p-1">
                            <div class="card-body p-1">
                                <div class="row align-items-center">
                                    <div class="col-icon">
                                        <div class="icon-big text-center icon-secondary bubble-shadow-small">
                                            <i class="fa fa-flask"></i>
                                        </div>
                                    </div>
                                    <div class="col col-stats ml-3 ml-sm-0">
                                        <div class="numbers">
                                            <p class="card-category">عدد التحاليل مكتملة</p>
                                            <h4 class="card-title">{{ $cfinish }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-stats card-round p-1">
                            <div class="card-body p-1">
                                <div class="row align-items-center">
                                    <div class="col-icon">
                                        <div class="icon-big text-center icon-secondary bubble-shadow-small">
                                            <i class="fa fa-flask"></i>
                                        </div>
                                    </div>
                                    <div class="col col-stats ml-3 ml-sm-0">
                                        <div class="numbers">
                                            <p class="card-category">عدد التحاليل الغير مكتملة</p>
                                            <h4 class="card-title">{{ $cnotfinish }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
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
                                    <h5 class="text-uppercase fw-bold mb-1">{{ $item->client->name }}<span class="text-warning pl-3">
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
            </div>
        </div>
    </div>
@endsection
