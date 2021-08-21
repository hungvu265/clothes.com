@extends('admin.index')

@section('content')
<!-- Link -->
<div style="display: flex; justify-content: flex-start;">
	<h3 class="text-primary">SẢN PHẨM</h3>
	<p class="ml-2 font-weight-bold">Thêm mới</p>
</div>
<hr class="w-25" style="border-bottom: 2px solid">
<div class="alert-success">
	@if(Session::get('success'))
	{{ session('success') }}
	@endif
</div>

<form action="admin/sanpham/them" method="post" enctype="multipart/form-data">
	@csrf
	<div class="form-group">
		<label>Hình ảnh</label>
		<input type="file" name="hinhanh">
		<div class="alert-danger w-25">
			@error('hinhanh') {{ $message }} @enderror
		</div>
	</div>
	<div class="form-group">
		<label>Tên sản phẩm</label>
		<input type="text" name="ten" class="form-control p-1 w-25" placeholder="Nhập tên sản phẩm" value="{{ old('ten') }}">
		<div class="alert-danger w-25">
			@error('ten') {{ $message }} @enderror
			@if(Session::get('false'))
				{{ session('false') }}
			@endif
		</div>
	</div>
	<div class="form-group">
		<label>Số lượng</label>
		<input type="number" name="soluong" class="form-control p-1" placeholder="Nhập số lượng" style="width: 10%;" value="{{ old('soluong') }}">
		<div class="alert-danger w-25">
			@error('soluong') {{ $message }} @enderror
		</div>
	</div>
	<div class="form-group">
		<label>Đơn giá</label>
		<input type="number" name="dongia" class="form-control p-1" placeholder="Nhập đơn giá" style="width: 10%;" value="{{ old('dongia') }}">
		<div class="alert-danger w-25">
			@error('dongia') {{ $message }} @enderror
		</div>
	</div>
	<div class="form-group">
		<label>Thể loại</label>
		<select name="theloai" class="p-1" id="theloai1">
			@if($theloai)
			@foreach($theloai as $tl)
			<option value="{{ $tl->id }}">{{ $tl->ten }}</option>
			@endforeach
			@endif
		</select>
	</div>
	<div class="form-group">
		<label>Loại sản phẩm</label>
		<select name="loaisp" class="p-1" id="loaisp">
			@if($loaisanpham)
			@foreach($loaisanpham as $lsp => $value)
			<option value="{{ $value->id }}">{{ $value->ten }}</option>
			@endforeach
			@endif
		</select>
	</div>
	<div class="mt-2">
		<span>
			<button class="btn btn-success" id="save">Thêm</button>
			<a href="admin/trangchu" class="btn btn-secondary">Quay lại</a>
		</span>
	</div>
</div>
</form>

<script type="text/javascript">
	$(document).ready(function() {
		$("#theloai1").change(function() {
			var id = $(this).val();
			
			$.get('admin/sanpham/getloaisp/'+id, function(data) {
				var string = '';
				$.each(data, function(index, val) {
					string += '<option value="'+ val.id +'">'+ val.ten +'</option>';
				});
				$("#loaisp").html(string);
			});		
		});
	});
</script>


@endsection
