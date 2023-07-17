@extends('layouts.mobile')

@section('css')
    <style>
        #chat2 .form-control {
            border-color: transparent;
        }

        #chat2 .form-control:focus {
            border-color: transparent;
            box-shadow: inset 0px 0px 0px 1px transparent;
        }

        .divider:after,
        .divider:before {
            content: "";
            flex: 1;
            height: 1px;
            background: #eee;
        }
    </style>
@endsection
@section('content')
    <section style="background-color: #eee;">
        <div class="container">

            <div class="row d-flex justify-content-center">
                <div class="col-md-12">

                    <div class="card" id="chat2">
                        <div class="card-header d-flex justify-content-between align-items-center ">
                            <h5 class="mb-0">الدعم الفني</h5>
                        </div>
                        <div class="card-body" data-mdb-perfect-scrollbar="true"
                            style="position: relative; height: 400px;overflow-y:scroll">
                            @foreach ($message as $item)
                                @if ($item->receiver_id)
                                    <div class="d-flex flex-row justify-content-start">
                                        <i class="fa fa-user" style="font-size:30px"></i>
                                        <div>
                                            <p class="small p-2 ms-3 mb-1 rounded-3" style="background-color: #f5f6f7;">
                                                {{ $item->message }}</p>
                                            <p class="small me-3 mb-3 rounded-3 text-muted d-flex justify-content-end">
                                                {{ explode(' ', $item->created_at)[1] }}</p>
                                        </div>
                                    </div>
                                @else
                                    <div class="d-flex flex-row justify-content-end mb-4 pt-1">
                                        <div>
                                            <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary">
                                                {{ $item->message }}</p>

                                            <p class="small me-3 mb-3 rounded-3 text-muted d-flex justify-content-end">
                                                {{ explode(' ', $item->created_at)[1] }}</p>
                                        </div>

                                        <i class="fa fa-users" style="font-size:30px"></i>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="card-footer text-muted d-flex justify-content-start align-items-center p-3">
                            <i class="fa fa-users" style="font-size:30px"></i>
                            <form method="post" action="{{ route('message.send') }}"
                                class="d-flex justify-content-start align-items-center">
                                <div>
                                    @csrf
                                    <input type="hidden" name="client_id" value="{{ session()->get('client')->id }}">

                                    <input type="text" class="form-control form-control-lg" name="message"
                                        id="exampleFormControlInput1" placeholder="Type message">
                                </div>
                                <button class="btn" type="submit"><i class="fa fa-paper-plane"></i></button>
                            </form>

                            {{-- <a class="ms-1 text-muted" href="#!"><i class="fa fa-paperclip"></i></a> --}}

                            {{-- <a class="ms-3" href="#!"><i class="fas fa-paper-plane"></i></a> --}}
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>
@endsection
