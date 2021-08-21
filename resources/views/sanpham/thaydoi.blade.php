@extends('admin.index')

@section('content')
<div style="display: flex; justify-content: flex-start;">
	<h3 class="text-primary">SẢN PHẨM</h3>
	<p class="ml-2 font-weight-bold">
		@if($sanpham)
			{{ $sanpham->ten }}
		@endif
	</p>
</div>
<hr class="w-25" style="border-bottom: 2px solid">
<div class="alert-success">
	@if(Session::get('success'))
		{{ session('success') }}
	@endif
</div>
<form action="admin/sanpham/thaydoi" method="post" enctype="multipart/form-data">
	@csrf
	@if($sanpham)
	<input type="hidden" name="id" value="{{ $sanpham->id }}">
	<div class="form-group w-25">
		<label class="font-weight-bold">Hình ảnh</label>
		<img src="images/800x800/{{ $sanpham->hinhanh }}" class="img-thumbnail">
		<input type="file" name="hinhanh" class="form-control">
	</div>
	<div class="form-group w-25">
		<label class="font-weight-bold">Tên sản phẩm</label>
		<input type="text" name="ten" value="{{ $sanpham->ten }}" class="form-control">
		<div class="alert-danger">@error('ten') {{ $message }} @enderror</div>
		<div class="alert-danger">
			@if(Session::get('false'))
				{{ session('false') }}
			@endif	
		</div>
	</div>
	<div class="form-group w-25">
		<label class="font-weight-bold">Số lượng</label>
		<input type="number" name="soluong" value="{{ $sanpham->soluong }}" class="form-control">
		<div class="alert-danger">@error('soluong') {{ $message }} @enderror</div>
	</div>
	<div class="form-group w-25">
		<label class="font-weight-bold">Đơn giá</label>
		<input type="number" name="dongia" value="{{ $sanpham->dongia }}" class="form-control">
		<div class="alert-danger">@error('dongia') {{ $message }} @enderror</div>
	</div>
	@if($theloai)
	<div class="form-group w-25">
		<label class="font-weight-bold">Thể loại</label>
		<select name="theloai" class="p-1" id="theloai1">
			@foreach($theloai as $tl)
			<option 
			@if($sanpham->loaisanpham->theloai->id == $tl->id)
				{{ 'selected' }}
			@endif
			value="{{ $tl->id }}">{{ $tl->ten }}</option>
				
			@endforeach
		</select>
	</div>
	@endif
	@if($loaisp)
	<div class="form-group w-25">
		<label class="font-weight-bold">Loại sản phẩm</label>
		<select name="loaisp" class="p-1" id="loaisp">
			@foreach($loaisp as $lsp => $value)
			<option 
			@if($sanpham->id_loaisanpham == $value->id)
				{{ 'selected' }}
			@endif
			value="{{ $value->id }}">{{ $value->ten }}</option>
			@endforeach
		</select>
	</div>
	@endif
	@endif
	<div class="mt-2">
		<span>
			<button class="btn btn-success" id="save">Thay đổi</button>
			<a href="admin/trangchu" class="btn btn-secondary">Quay lại</a>
		</span>
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
