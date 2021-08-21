<!DOCTYPE html>
<html>
<head>
	<title>Sản phẩm</title>
	<base href="{{ asset('') }}">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
	<link rel="stylesheet" type="text/css" href="css/icon/fontawesome-free-5.15.3-web/css/all.css">
	<link rel="stylesheet" type="text/css" href="css/store/backup.css">
	<script language="javascript" src="css/store/js.js"></script>
</head>
<body>
	@include('store.body.navbar')
	<!-- Content -->
	<div class="container mt-5">
		<div class="row">
			<div class="col-md-12">
				<p>
					<span><a href="" style="color: black">Thể loại | </a></span>
					<span><a href="" style="color: black">Thể loại | </a></span>
					<span><b>Tên sản phẩm</b></span>
				</p>
			</div>
		</div>

		<hr style="width: 100%; margin-top: 8px; height: 4px;">

		@if($sanpham)
		<div class="row mt-5" id="sanpham">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-6">
						<img src="images/800x800/{{ $sanpham->hinhanh }}" class="img-thumbnail">
					</div>
					<div class="col-md-6">
						
						<div>
							<ul style="list-style: none;">
								<li><h3>{{ $sanpham->ten }}</h3></li>
								<li>
									<span>Mã sản phẩm: </span>
									<span><b>{{ $sanpham->id }}</b></span>
								</li>
								<li><h3>{{ number_format($sanpham->dongia,0,'.','.').' VND' }}</h3></li>
								<hr>
								<li><p>ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
								cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
								proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p></li>
								<hr>
								<li style="display: flex;">
									<div class="color" style="background-color: red;"></div>
									<div class="color" style="background-color: blue;"></div>
									<div class="color" style="background-color: gray;"></div>
								</li>
								<hr>
								<li class="mau-sanpham">
									<div style="width: 30%;">
										<h4>SIZE</h4>
										<select>
											<option>36</option>
											<option>37</option>
											<option>38</option>
										</select>
									</div>
									<div>
										<h4>SỐ LƯỢNG</h4>
										<div class="slg-sanpham">
											<span class="giam">-</span>
											<input type="number" name="" class="soluong-sanpham" value="1" readonly>
											<span class="tang">+</span>
										</div>
									</div>
								</li>
								<li class="add" style="background-color: black;">
									<a href="javascript:void(0)" style="display: block;" onclick="cart({{ $sanpham->id }})">THÊM VÀO GIỎ HÀNG</a>
								</li>
								<li class="add" style="background-color: #f15e2c;">
									<a href="store/giohang" style="display: block;">THANH TOÁN</a>
								</li>
							</ul>							
						</div>
					</div>
				</div>
			</div>
		</div>			
		@endif
	</div>

	<hr>

	<!-- Sản phẩm liên quan -->
	<div class="container">
		<div class="row mt-5">
			<div class="col-md-12 mb-5">
				<h2 class="text-center">Sản phẩm liên quan</h2>
			</div>
		</div>

		<div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">
			<!--Slides-->
			<div class="carousel-inner" role="listbox">

				<!--First slide-->
				<div class="carousel-item active">
					<div class="row">
						@if($danhsach)
						@for($i=0; $i<=3; $i++)
						<div class="col-md-3">
							<div class="border-product">
								<img src="images/800x800/{{ $danhsach[$i]->hinhanh }}" class="img-thumbnail">
								<div class="pt-3"><strong>{{ $danhsach[$i]->ten }}</strong></div>
								<p>While/Black</p>
								<div><strong>{{ number_format($danhsach[$i]->dongia,0,'.','.').' VND' }}</strong></div>
								<button class="btn btn-danger">Mua ngay</button>
								<div class="add-cart">
									<button class="btn btn-success">Thêm vào giỏ</button>
								</div>
							</div>
						</div>
						@endfor
						@endif
					</div>

				</div>
				<!--/.First slide-->

				<!--Second slide-->
				<div class="carousel-item">

					<div class="row">
						@if($danhsach)
						@for($i=4; $i<=7; $i++)
						<div class="col-md-3">
							<div class="border-product">
								<img src="images/800x800/{{ $danhsach[$i]->hinhanh }}" class="img-thumbnail">
								<div class="pt-3"><strong>{{ $danhsach[$i]->ten }}</strong></div>
								<p>While/Black</p>
								<div><strong>{{ number_format($danhsach[$i]->dongia,0,'.','.').' VND' }}</strong></div>
								<button class="btn btn-danger">Mua ngay</button>
								<div class="add-cart">
									<button class="btn btn-success">Thêm vào giỏ</button>
								</div>
							</div>
						</div>
						@endfor
						@endif
					</div>

				</div>
				<!--/.Second slide-->

				<a class="carousel-control-prev" href="#multi-item-example" role="button" data-slide="prev" style="position: absolute; left: -70px;">
					<span class="carousel-control-prev-icon bg-success" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#multi-item-example" role="button" data-slide="next" style="position: absolute; right: -70px;">
					<span class="carousel-control-next-icon bg-success" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
			<!--/.Slides-->

		</div>
	</div>

	<hr>

	<!-- Phụ kiện -->
	<div class="container mt-5">
		<div class="row">
			<div class="col-md-12 mb-5">
				<h2 class="text-center">Phụ kiện</h2>
			</div>	
		</div>

		<div id="multi-item" class="carousel slide carousel-multi-item" data-ride="carousel">
			<!--Slides-->
			<div class="carousel-inner" role="listbox">

				<!--First slide-->
				<div class="carousel-item active">

					<div class="row">
						@if($danhsach)
						@for($i=7; $i>=4; $i--)
						<div class="col-md-3">
							<div class="border-product">
								<img src="images/800x800/{{ $danhsach[$i]->hinhanh }}" class="img-thumbnail">
								<div class="pt-3"><strong>{{ $danhsach[$i]->ten }}</strong></div>
								<p>While/Black</p>
								<div><strong>{{ number_format($danhsach[$i]->dongia,0,'.','.').' VND' }}</strong></div>
								<button class="btn btn-danger">Mua ngay</button>
								<div class="add-cart">
									<button class="btn btn-success">Thêm vào giỏ</button>
								</div>
							</div>
						</div>
						@endfor
						@endif
					</div>

				</div>
				<!--/.First slide-->

				<!--Second slide-->
				<div class="carousel-item">

					<div class="row">
						@if($danhsach)
						@for($i=3; $i>=0; $i--)
						<div class="col-md-3">
							<div class="border-product">
								<img src="images/800x800/{{ $danhsach[$i]->hinhanh }}" class="img-thumbnail">
								<div class="pt-3"><strong>{{ $danhsach[$i]->ten }}</strong></div>
								<p>While/Black</p>
								<div><strong>{{ number_format($danhsach[$i]->dongia,0,'.','.').' VND' }}</strong></div>
								<button class="btn btn-danger">Mua ngay</button>
								<div class="add-cart">
									<button class="btn btn-success">Thêm vào giỏ</button>
								</div>
							</div>
						</div>
						@endfor
						@endif
					</div>

				</div>
				<!--/.Second slide-->

			
				<a class="carousel-control-prev" href="#multi-item" role="button" data-slide="prev" style="position: absolute; left: -70px;">
					<span class="carousel-control-prev-icon bg-success" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#multi-item" role="button" data-slide="next" style="position: absolute; right: -70px;">
					<span class="carousel-control-next-icon bg-success" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
			<!--/.Slides-->

		</div>
	</div>

	<!-- Thêm vào giỏ -->
	<div id="add-cart-effect" style="position: fixed; top: 0; right: 0;">
		<p>Đã thêm vào giỏ</p>
	</div>

	<script type="text/javascript">
		function cart(id){
			var sl = Number($(".soluong-sanpham").val());
			$.get('store/add/'+id+'/'+sl, function(data) {
				if(data){
					alert("Đã thêm vào giỏ");
				}				
			});
		}
	</script>

	@include('store.body.footer')	
</body>
</html>