@extends('store.body.layout')

@section('content')
	<!-- Carousel -->
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img src="{{ asset('css/store/images/slideshow_3.jpg') }}" class="d-block w-100" alt="anh">
			</div>
			<div class="carousel-item">
				<img src="{{ asset('css/store/images/shot_kurta_banner_x800.jpg') }}" class="d-block w-100" alt="anh">
			</div>
			<div class="carousel-item">
				<img src="{{ asset('css/store/images/unnamed.jpg') }}" class="d-block w-100" alt="anh">
			</div>
		</div>
		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			
			
		</a>
		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>

	<hr>

	<!-- Sản phẩm nổi bật -->
	<div class="container">
		<div class="row mt-5">
			<div class="col-md-12">
				<h2 class="text-center">Sản phẩm nổi bật</h2>
			</div>
		</div>
		<div class="row mt-3">
			@if($noibat)
			@foreach($noibat as $key => $value)
			<div class="col-md-3">
				<div class="border-product">
					<img src="images/800x800/{{ $value->hinhanh }}" class="img-thumbnail">	
					<div class="pt-3"><strong>{{ $value->ten }}</strong></div>
					<p>While/Black</p>
					<div><strong>{{ number_format($value->dongia,0,".",".")." VND"}}</strong></div>
					<a href="store/sp/{{ $value->id }}"><button class="btn btn-danger">Mua ngay</button></a>
					<div class="add-cart">
						<a href="javascript:void(0)" onclick="cart( {{ $value->id }} )"><button class="btn btn-success insert-cart">Thêm vào giỏ</button></a>						
					</div>
				</div>
			</div>
			@endforeach
			@endif
		</div>
	</div>

	<hr>

	<!-- Sản phẩm bán chạy -->
	<div class="container">
		<div class="row mt-5">
			<div class="col-md-12">
				<h2 class="text-center">Sản phẩm bán chạy</h2>
			</div>
		</div>
		<div class="row mt-3">
			@if($banchay)
			@foreach($banchay as $key => $value)
			<div class="col-md-3">
				<div class="border-product">
					<img src="images/800x800/{{ $value->hinhanh }}" class="img-thumbnail">
					<div class="pt-3"><strong>{{ $value->ten }}</strong></div>
					<p>While/Black</p>
					<div><strong>{{ number_format($value->dongia,0,'.','.').' VND' }}</strong></div>
					<a href="store/sp/{{ $value->id }}"><button class="btn btn-danger">Mua ngay</button></a>					
					<div class="add-cart">
						<a href="javascript:void(0)" onclick="cart( {{ $value->id }} )"><button class="btn btn-success insert-cart">Thêm vào giỏ</button></a>
					</div>
				</div>
			</div>
			@endforeach
			@endif
		</div>
	</div>

	<hr>

	<!-- Sản phẩm mới -->
	<div class="new-product mt-5">
		<img src="{{ asset('css/store/images/dfa4c658f5dc35afb30e1166a9ba4574.jpg') }}" class="img-fluid">
		<div>
			<h3>Nike Hypervemon</h3>
			<p>Up to sale 70%</p>
			<button class="btn btn-danger">Mua ngay</button>
		</div>
	</div>

	<!-- Taskbar left -->
	<div class="taskbar-left">
		<div class="giohang">

			<p id="soluong"></p>
			<button class="btn"><i class="fas fa-shopping-cart"></i></button>
			<div class="dropdown-giohang">
				<div id="scroll-giohang">
					<!--				
					<div class="row">
						<div class="col-md-5">
							<img src="">
						</div>
						<div class="col-md-7">
							<strong></strong>
							<div class="product-giohang">
								<div style="font-weight: 600;">
									<p>Giá: </p>
									<p></p>
								</div>
								<div style="font-weight: 600;">
									<p>Đơn:</p>
									<p></p>
								</div>
								<div style="font-weight: 600;">
									<p>Số lượng: </p>
									<p></p>
								</div>
							</div>
						</div>
						<hr>
					</div>
					-->
				</div>
				<div class="row mt-2">
					<div class="col-md-12" id="tong-giohang">
						<b>Tổng:</b>
						<p style="font-weight: 600;"></p>		
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<a href="store/giohang" class="btn btn-danger w-75">Thanh toán</a>
					</div>

				</div>
			</div>
		</div>

		<div id="fb">
			<a href="#" style="background: blue;"><i class="fab fa-facebook-square"></i></a>
			<a href="#" style="background: #d71839;"><i class="fab fa-instagram-square"></i></a>
			<a href="#" style="background: rgb(29 161 242);"><i class="fab fa-twitter-square"></i></a>
		</div>
	</div>

	<!-- Scroll-top-->
	<div id="scroll-top">
		<button class="fas fa-arrow-alt-circle-up fa-small bg-light"></button>
	</div>	

	<!-- Thêm vào giỏ -->
	<div id="add-cart-effect" style="position: fixed; top: 0; right: 0;">
		<p>Đã thêm vào giỏ</p>
	</div>

	<script type="text/javascript">
		
		$.get('store/taskleft', function(data) {
			var tong = 0;
			var soluong = 0;
			$.each(data, function(index, val) {
				console.log(val.soluong);
				tong += Number(val.tong);
				soluong += Number(val.soluong);
				$("#scroll-giohang").append('<div class="row"><div class="col-md-5"><img src="images/800x800/'+ val.hinhanh +'"></div><div class="col-md-7"><strong></strong><div class="product-giohang"><div style="font-weight: 600;"><p>Giá: </p><p>'+ String(val.tong).replace(/(.)(?=(\d{3})+$)/g,'$1.') + ' VND' +'</p></div><div style="font-weight: 600;"><p>Đơn:</p><p>'+ String(val.dongia).replace(/(.)(?=(\d{3})+$)/g,'$1.') + ' VND' + '</p></div><div style="font-weight: 600;"><p>Số lượng: </p><p>'+ val.soluong +'</p></div></div></div><hr></div>');
			});
			$("#tong-giohang p").text(String(tong).replace(/(.)(?=(\d{3})+$)/g,'$1.') + ' VND');
			$("#soluong").text(soluong);
		});
		

		function cart(id){
			$.get('store/addgiohang/'+id, function(data) {
				$("#scroll-giohang").empty();
				var tong = 0;
				var soluong = 0;
				$.each(data, function(index, val) {
					tong += Number(val.tong);
					soluong += Number(val.soluong);
					$("#scroll-giohang").append('<div class="row"><div class="col-md-5"><img src="images/800x800/'+ val.hinhanh +'"></div><div class="col-md-7"><strong></strong><div class="product-giohang"><div style="font-weight: 600;"><p>Giá: </p><p>'+ String(val.tong).replace(/(.)(?=(\d{3})+$)/g,'$1.') + ' VND' +'</p></div><div style="font-weight: 600;"><p>Đơn:</p><p>'+ String(val.dongia).replace(/(.)(?=(\d{3})+$)/g,'$1.') + ' VND' + '</p></div><div style="font-weight: 600;"><p>Số lượng: </p><p>'+ val.soluong +'</p></div></div></div><hr></div>');
				});
				$("#tong-giohang p").text(String(tong).replace(/(.)(?=(\d{3})+$)/g,'$1.') + ' VND');
				$("#soluong").text(soluong);
			});
		}
	</script>
@endsection