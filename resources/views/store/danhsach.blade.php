@extends('store.body.layout')

@section('content')
<!-- Sản phẩm -->
<div class="container option">
	<div class="row mt-5">
		<div class="col-md-3 mt-5">
			<div>
				<span><a href="">TẤT CẢ</a> |</span>
				@if($id == '1')
				<span><a href="" class="active" style="background-color: lightgray;">NAM</a> |</span>
				@else
				<span><a href="">NAM</a> |</span>
				@endif
				
				@if($id == '2')
				<span><a href="" class="active" style="background-color: lightgray;">Nữ</a> |</span>
				@else
				<span><a href="">NỮ</a></span>
				@endif
				
		
			</div>
			<hr>
			<div>
				<ul>
					@if($sp == 'ao')
					<li><a href="" class="active" style="background-color: lightgray;">Áo</a></li>
					@else
					<li><a href="">Áo</a></li>
					@endif
					@if($sp == 'quan')
					<li><a href="" class="active" style="background-color: lightgray;">Quần</a></li>
					@else
					<li><a href="">Quần</a></li>
					@endif
					@if($sp == 'giay')
					<li><a href="" class="active" style="background-color: lightgray;">Giày</a></li>
					@else
					<li><a href="">Giày</a></li>
					@endif
					@if($sp == 'phu-kien')
					<li><a href="" class="active" style="background-color: lightgray;">Phụ kiện</a></li>
					@else
					<li><a href="">Phụ kiện</a></li>
					@endif
				</ul>					
			</div>
			<hr>
			<div class="dropdown-danhsach">
				<h3>TRẠNG THÁI</h3>
				<ul class="dropdown-content">
					<li><a href="">Sale off</a></li>
					<li><a href="">Best Saler</a></li>
					<li><a href="">New</a></li>
				</ul>
			</div>
			<hr>
			<div class="dropdown-danhsach">
				<h3>DÒNG SẢN PHẨM</h3>
				<ul class="dropdown-content">
					<li><a href="">Loại 1</a></li>
					<li><a href="">Loại 2</a></li>
					<li><a href="">Loại 3</a></li>
				</ul>
			</div>
			<hr>
			<div class="dropdown-danhsach">
				<h3>GIÁ</h3>
				<ul class="dropdown-content">
					<li><a href="">Loại 1</a></li>
					<li><a href="">Loại 2</a></li>
					<li><a href="">Loại 3</a></li>
				</ul>
			</div>
		</div>
		<div class="col-md-9">
			<div class="row">
				<div class="col-md-12">
					<img src="images/800x800/15.jpg" class="img-thumbnail">
				</div>
			</div>
			<div class="row">
				<div class="search-bar">
					<div>
						Tăng dần <input type="radio" name="gia">
						Giảm dần <input type="radio" name="gia" >
					</div>
					<form>
						<input type="search" name="" placeholder="Nhập tên sản phẩm">
						<input type="submit" name="" class="btn btn-success">
					</form>
				</div>
			</div>
			<div class="row mt-5">
				@if($sanpham)
				@foreach($sanpham as $sp)
				<div class="col-md-4">
					<div class="border-product">
						<img src="images/800x800/{{ $sp->hinhanh }}" class="img-thumbnail">
						<div class="pt-3"><strong>{{ $sp->ten }}</strong></div>
						<p>While/Black</p>
						<div><strong>{{ number_format($sp->dongia,0,'.','.').' VND' }}</strong></div>
						<button class="btn btn-danger">Mua ngay</button>
						<div class="add-cart">
							<button class="btn btn-success" onclick="cart({{ $sp->id }})">Thêm vào giỏ</button>
						</div>
					</div>
				</div>
				@endforeach
				@endif
			</div>
			<div style="display: flex; justify-content: center; align-items: center;">{{ $sanpham->links('vendor.pagination.bootstrap-4') }}</div>
		</div>
	</div>
</div>

@endsection

