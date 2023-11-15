@extends('layouts.mobile')

@section('content')
    <div class="row text-right" dir="rtl">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">نتلئج تحليل {{ $group->name }}</div>
                </div>
                <div class="card-body">
                    {{-- <ol class="activity-feed">
                        @foreach ($test as $item)
                        <li class="feed-item feed-item-secondary">
                            <time class="date" datetime="9-25">{{ explode(" ",$item->created_at)[0] }}</time>
                            <span class="text">{{ $item->client_tests->name }} <a href="#">النتيجة : {{ $item->result }}</a></span><br>
                            <span class="text">المستوى الطبيعي من {{ $item->client_tests->normal_form }} الى {{ $item->client_tests->normal_to }}</span>
                        </li>
                        @endforeach
                    </ol> --}}
                    <table class="table">
                        <thead>
                            <tr>
                                <th>التحليل</th>
                                <th>النتيجة</th>
                                <th>المعدل</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($test as $item)
                                <tr>
                                    <td>{{ $item->client_tests->name }}</td>
                                    <td>{{ $item->result }} {{ $item->client_tests->unit }}</td>
                                    <td>{{ $item->client_tests->normal_form }} {{ $item->client_tests->unit }} الى {{ $item->client_tests->normal_to }} {{ $item->client_tests->unit }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
