@extends('admin.index')

@section('content')
<!-- Link -->
<div style="display: flex; justify-content: flex-start;">
	<h3 class="text-primary">LOẠI SẢN PHẨM</h3>
	<p class="ml-2 font-weight-bold">Thêm mới</p>
</div>
<hr class="w-25" style="border-bottom: 2px solid">
<form action="admin/loaisanpham/them" method="post">
	@csrf
	<div class="form-group">
		<label>Loại sản phẩm:</label>
		<input type="text" name="loaisp" id="loaisp" placeholder="Nhập loại sản phẩm" class="p-1 form-control w-25" value="{{ old('loaisp') }}">
		<div class="alert-danger w-25">Không được để trống</div>
		<div class="alert-success w-25">Thêm thành công</div>
	</div>
	<div class="form-group">
		<label>Thể loại:</label>
		<select name="theloai" class="p-1">
			@if($theloai)
			@foreach($theloai as $tl)
				<option value="{{ $tl->id }}">{{ $tl->ten }}</option>
			@endforeach
			@endif
		</select>
	</div>
	<div>
		<span>
			<button class="btn btn-success" id="save">Thêm</button>
			<a href="admin/trangchu" class="btn btn-secondary">Quay lại</a>
		</span>
	</div>
</form>

<script type="text/javascript">
	$(document).ready(function() {
		$(".alert-danger").hide();
		$(".alert-success").hide();

		$("#save").click(function(event) {
			event.preventDefault();

			if(! $("#loaisp").val()){
				$(".alert-danger").show();
				$(".alert-success").hide();
			}
			else{								
				$.ajax({
					url: 'admin/loaisanpham/them',
					type: 'post',
					data: $("form").serialize(),
					success: function(a){
						if(a == 'false'){
							$(".alert-danger").show().text('Loại sản phẩm đã tồn tại');
							$(".alert-success").hide();
						}
						else{
							$(".alert-danger").hide();
							$(".alert-success").show();
							$("form")[0].reset();
						}
					}
				});
			}
		});
	});
</script>

@endsection

