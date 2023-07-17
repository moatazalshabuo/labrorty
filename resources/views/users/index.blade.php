@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">جدول المستخدمين</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="user-table" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th class="border-bottom-0">الاسم</th>
                                    <th class="border-bottom-0">اسم المستخدم</th>
                                    <th class="border-bottom-0">التحكم</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->username }}</td>
                                        <td>
                                            @if ($item->hasRole('المسؤول') && Auth::user()->hasRole('المسؤول'))
                                                <a href="{{ route('users.edit', $item->id) }}"
                                                    class="btn btn-warning text-white">
                                                    <i class="fa fa-edit"></i></a>
                                                <button class="btn btn-danger text-white delete"
                                                    data-id="{{ $item->id }}"><i class="fa fa-trash"></i></button>
                                                <form action="{{ route('users.destroy', $item->id) }}" method="post"
                                                    id="delete-user-{{ $item->id }}">
                                                    @method('DELETE')
                                                    @csrf
                                                </form>
                                            @endif
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
