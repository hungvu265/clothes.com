<!DOCTYPE html>
<html>
<head>
	<title>Quản lí cửa hàng</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<base href="{{ asset('') }}">
	<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
	<link rel="stylesheet" type="text/css" href="css/index1.css">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<style type="text/css">
		.box-content{
			position: relative;
			box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
			height: 120px;
			width: 250px;
		}
		.box-content::after{
			position: absolute;
			bottom: 10;
			width: 20%;
			height: 5px;
			border-radius: 50px;
			content: '';
			background-color: lightgray;
			left: 50%;
			transform: translateX(-50%);
		}
		.box-icon{
			position: absolute;
			top: -30px;
			left: 10px;
			width: 80px;
			height: 80px;
			display: flex;
			justify-content: center;
			align-items: center;
			color: white;
		}
		h5, p{
			font-weight: 600;
		}
		.box-content a{
			position: absolute;
			bottom: 0;
			left: 8px;
		}
		.box-content a:hover{
			text-decoration: none;
		}
	</style>
</head>
<body>
	@extends('admin.index')

	@section('content')
		<div class="row mt-5">
			<div class="col-md-3">
				<div class="box-content">
					<div class="box-icon" style="background: orange;">
						<i class="fab fa-shopify fa-3x"></i>
					</div>
					<div class="box-title ml-5" style="text-align: right;">
						<h5 class="text-center">Sản phẩm</h5>
						<p class="text-center">88</p>
					</div>
					<a href="">Thông tin...</a>
				</div>				
			</div>

			<div class="col-md-3">
				<div class="box-content">
					<div class="box-icon" style="background: green;">
						<i class="fas fa-coins fa-3x"></i>
					</div>
					<div class="box-title ml-5" style="text-align: right;">
						<h5 class="text-center">Doanh thu</h5>
						<p class="text-center">800.256 VND</p>
					</div>
					<a href="">Thông tin...</a>
				</div>				
			</div>

			<div class="col-md-3">
				<div class="box-content">
					<div class="box-icon bg-danger">
						<i class="fas fa-exclamation fa-3x"></i>
					</div>
					<div class="box-title ml-5" style="text-align: right;">
						<h5 class="text-center pl-3">Sắp hết hàng</h5>
						<p class="text-center">8</p>
					</div>
					<a href="">Thông tin...</a>
				</div>				
			</div>

			<div class="col-md-3">
				<div class="box-content">
					<div class="box-icon" style="background: hsl(187deg 98% 42%);">
						<i class="fab fa-twitter fa-3x"></i>
					</div>
					<div class="box-title ml-5" style="text-align: right;">
						<h5 class="text-center">Theo dõi</h5>
						<p class="text-center">1535</p>
					</div>
					<a href="">Thông tin...</a>
				</div>				
			</div>
		</div>

		<div class="row mt-5">			
			<div class="col-md-4" id="chart-pie">
				<p class="text-center">Thông tin số lượng sản phẩm</p>
			</div>
			
			
			
		</div>

		<script type="text/javascript">
			$.get('admin/sanpham/soluong', function(data) {
				var options = {
					series: [data.soluong[1], data.soluong[2], data.soluong[3], data.soluong[4]],
					chart: {
						width: 380,
						type: 'pie',
					},
					labels: [data.theloai[0].ten, data.theloai[1].ten, data.theloai[2].ten, data.theloai[3].ten],
					responsive: [{
						breakpoint: 480,
						options: {
							chart: {
								width: 200
							},
							legend: {
								position: 'bottom'
							}
						}
					}]
				};

				var chart = new ApexCharts(document.querySelector("#chart-pie"), options);
				chart.render();
			});
			
		</script>
	@endsection
</body>
</html>