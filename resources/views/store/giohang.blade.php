<!DOCTYPE html>
<html>
<head>
	<title>Giỏ hàng</title>
	<base href="{{ asset('') }}">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/icon/fontawesome-free-5.15.3-web/css/all.css">
	<link rel="stylesheet" type="text/css" href="css/store/backup.css">
	<script language="javascript" src="css/store/js.js"></script>
</head>
<body>
	@include('store.body.navbar')

	<!-- Content -->
	<div class="container mt-3">
		<div class="row">
			<div class="col-md-8">
				<?php $tong = 0; ?>
				@if(Session('giohang'))	
				@foreach(Session('giohang') as $key => $value)
				<?php $tong += $value['tong']; ?>
				<div class="row danh-muc" id="danh-muc{{ $key }}">
					<hr style="width: 100%;">
					<div class="col-md-3">
						<img src="images/800x800/{{ $value['hinhanh'] }}" class="img-thumbnail">
					</div>
					<div class="col-md-6">
						<div class="infor-gio">
							<h5>{{ $value['ten'] }}</h5>
							<p>Giá: {{ number_format($value['dongia'],0,'.','.').' VND' }}</p>
							<div class="mau-sanpham">
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
										<span class="giam" onclick="giam({{ $key }})">-</span>
										<input type="number" name="" class="soluong-sanpham" value="{{ $value['soluong'] }}" readonly>
										<span class="tang" onclick="tang({{ $key }})">+</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-3" id="row{{ $key }}">
						<div class="giohang-sub">
							<h5><span class="price"></span></h5>
							<p>Còn hàng</p>
							<button class="btn btn-light">Thích</button>
							<button class="btn btn-dark" onclick="xoa({{ $key }})">Xóa</button>
						</div>	
					</div>
				</div>
				@endforeach
				@endif
				

				<!-- Bottem -->
				<hr style="width: 100%; height: 4px; background-color: black;">
				<div style="display: flex; justify-content: space-around;">
					<button class="btn btn-dark" onclick="xoahet()">XÓA HẾT</button>
					<a href="store" class="btn btn-dark">QUAY LẠI MUA HÀNG</a>
				</div>
			</div>
			<div class="col-md-4">
				<div class="giohang-left">
					<h5>ĐƠN HÀNG</h5>
					<hr>
					<div class="form-group">
						<label>NHẬP MÃ KHUYẾN MÃI</label>
						<input type="text" name=""><span><button class="btn btn-warning">ÁP DỤNG</button></span>
					</div>
					<hr>
					<div class="don-gia">
						<div>
							<p>Đơn hàng</p>
							<p>Giảm</p>
						</div>
						<div style="text-align: right;">
							<p><span id="price-don">{{ number_format($tong,0,'.','.').' VND'}}</span></p>
							<p>0 VND</p>
						</div>
					</div>
					<hr class="mt-2">
					<div class="thanhtoan">
						<div>
							<p>TỔNG: </p>
							<p id="price-tong">
							{{ number_format($tong,0,'.','.').' VND' }}</p>
							</p>
						</div>
						<button class="btn btn-warning">THANH TOÁN</button>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		$.get('store/ttgiohang', function(data) {
			if(data){
				var i = 0;
				$(".price").each(function(index, el) {
					$(this).text(String(data[i++]).replace(/(.)(?=(\d{3})+$)/g,'$1.') + ' VND');
				});
			}
		});

		$(".soluong-sanpham").each(function(index, el) {
			if(Number($(this).val()) >= 2){
				$(this).closest('.slg-sanpham').find('.giam').css({
					cursor: 'pointer',
					color: 'red'
				});
			}
		});

		function tang(id){
			$.get('store/tang/'+id, function(data) {
				if(data){
					$('#row'+id).find('.price').text(String(data[0]).replace(/(.)(?=(\d{3})+$)/g,'$1.') + ' VND');
					$("#price-don").text(String(data[1]).replace(/(.)(?=(\d{3})+$)/g,'$1.') + ' VND');
					$("#price-tong").text(String(data[1]).replace(/(.)(?=(\d{3})+$)/g,'$1.') + ' VND');
				}
			});
		}

		function giam(id){
			$.get('store/giam/'+id, function(data) {
				console.log(data);
				if(data){
					$('#row'+id).find('.price').text(String(data[0]).replace(/(.)(?=(\d{3})+$)/g,'$1.') + ' VND');
					$("#price-don").text(String(data[1]).replace(/(.)(?=(\d{3})+$)/g,'$1.') + ' VND');
					$("#price-tong").text(String(data[1]).replace(/(.)(?=(\d{3})+$)/g,'$1.') + ' VND');
				}
			});
		}

		function xoa(id){
			$.get('store/xoa/'+id, function(data) {
				if(data){
					$('#danh-muc'+id).remove();
					$("#price-don").text(String(data).replace(/(.)(?=(\d{3})+$)/g,'$1.') + ' VND');
					$("#price-tong").text(String(data).replace(/(.)(?=(\d{3})+$)/g,'$1.') + ' VND');
				}
			});
		}

		function xoahet(){
			$.get('store/xoahet', function(data) {
				if(data){
					$(".danh-muc").remove();
					$("#price-don").text('0 VND');
					$("#price-tong").text('0 VND');
				}
			});
		}
	</script>

	@include('store.body.footer')
</body>
</html>

