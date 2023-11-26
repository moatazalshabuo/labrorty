@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-12">
		من
		<input type="date" id='start' class="form-control">
		الى
		<input type="date" id='end' class="form-control">
		<button class="btn btn-primary" id='send'>بحث</button>
	</div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <div class="card-title">التحاليل التي تم انجازها خلال فترة<span class='date'></span> </div>
            </div>
            <div class="card-body">
                <div class="chart-container">
                    <canvas id="barChart"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <div class="card-title"> نسبة ارباح اكثر تحليل تم انجازه خلال فترة<span class='date'></span> </div>
            </div>
            <div class="card-body">
                <div class="chart-container">
                    <canvas id="barChart1"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    barChart = document.getElementById('barChart').getContext('2d')
    function get_2($start=null,$end=null){
	
	let data = []
    axios.get("{{ route('data_charts') }}",{params:{'start':$start,'end':$end}}).then((res)=>{
        data = res.data.data
		$('.date').text(' من '+ res.data.start + " الى "+res.data.end)
        console.log(res.data.data)
        var myBarChart = new Chart(barChart, {
			type: 'bar',
			data: {
				labels: data.map(row => row.name),
				datasets : [{
					label: "Sales",
					backgroundColor: 'rgb(23, 125, 255)',
					borderColor: 'rgb(23, 125, 255)',
					data: data.map(row => row.total_analysis),
				}],
			},
			options: {
				responsive: true, 
				maintainAspectRatio: false,
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true,
                            stepSize: 1
        
						}
					}]
				},
			}
		});
    })
}
    barChart2 = document.getElementById('barChart1').getContext('2d')
    
	function get_1($start=null,$end=null){
		let data1 = []
		axios.get("{{ route('data_chart') }}",{params:{'start':$start,'end':$end}}).then((res)=>{
        data1 = res.data
        console.log(res.data)
        var myBarChart2 = new Chart(barChart2, {
			type: 'bar',
			data: {
				labels: data1.map(row => row.name),
				datasets : [{
					label: "Sales",
					backgroundColor: 'rgb(23, 125, 255)',
					borderColor: 'rgb(23, 125, 255)',
					data: data1.map(row => row.total_analysis),
				}],
			},
			options: {
				responsive: true, 
				maintainAspectRatio: false,
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true,
                            
        
						}
					}]
				},
			}
		});
    })

	}
    get_1()
	get_2()

	$("#send").click(function(){
		get_1($('#start').val(),$('#end').val())
		get_2($('#start').val(),$('#end').val())
	})
</script>
@endsection
