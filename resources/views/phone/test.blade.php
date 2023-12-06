@extends('layouts.mobile')
<style>
    .signature-space {
                height: 100px;
                page-break-after: always;
                text-align: left;
            }
    @media print {
    #sidebar {
        display: none;
        
    }

    .print-button {
        display: none;
    }

}
</style>
@section('content')
    <div class="row text-right" dir="rtl">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    

                    {{-- <div class="card-title">نتائج تحليل {{ $group->name }}</div> --}}
                </div>
                <div class="card-body">
                    <div style="float: right; text-align: right;">
                        <h4><strong>الاسم</strong>  {{ session()->get('client')->name }} </h4>
                        <p> <strong>العمر</strong>  {{ session()->get('client')->address }} </p>
                    </div>
                
                    <div style="float: left; text-align: left;">
                        @foreach ($test as $item)
                            <p> <strong>التاريخ</strong>{{ $item->created_at }}</p>
                        @endforeach
                    </div>
                        <br>
                        <br>
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
                        <div style=" text-align: center;width:100%" class="card-title">نتائج التحاليل </div>
                        <br>
                        <thead>
                            <div style=" text-align: right;width:100%;" ><strong>نتيجة التحليل</strong> {{ $group->name }}</div>
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
                    <div  class="signature-space">التوقيع<br>...............</div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $("#user-table").DataTable();
    </script>
    <script>
        function printPage() {
            window.print();
        }
    </script>
@endsection
