@extends('layouts.app')

@section('content')
    <div class="row text-right" dir="rtl">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"></h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="user-table" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th class="border-bottom-0">العميل</th>
                                    <th class="border-bottom-0">التحاليل</th>
                                    <th class="border-bottom-0">السعر</th>
                                    <th class="border-bottom-0">تاريخ التحليل</th>
                                    <th>حالة التحليل</th>
                                    <th>النتائج</th>
                                    <th>التحكم</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($client_group as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item->client->name }}</td>
                                        <td>{{ $item->group->name }}</td>
                                        <td>{{ $item->group->price }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>@if($item->status) مكتمل @else قيد العمل @endif</td>
                                        <td><a href="{{ route('cl.show',$item->id) }}" class="btn btn-primary">عرض نتيجة</a></td>
                                        <td class="d-flex">
                                            <form action="{{ route('cl.destroy', $item->id) }}" method="post"
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
