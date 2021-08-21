@extends('admin.index')

@section('content')
<!-- Link -->
<div style="display: flex; justify-content: flex-start;">
	<h3 class="text-primary">THỂ LOẠI</h3>
	<p class="ml-2 font-weight-bold">Thêm mới</p>
</div>
<hr class="w-25" style="border-bottom: 2px solid">
<form id="form">
	@csrf
	<div class="form-group">
		<label>Tên thể loại</label>
		<input type="text" name="theloai" id="add-theloai" class="form-control pr-3 w-25" placeholder="Nhập thể loại">
		<div class="alert-danger w-25 mt-2">Không được để trống</div>
		<div class="alert-success w-25 mt-2">Thêm thành công</div>
		
	</div>
	<div class="form-group">
		<button type="submit" id="them" class="btn btn-success">Thêm</button>
		<a href="admin/trangchu" class="btn btn-secondary">Quay lại</a>
	</div>
</form>
	
<script type="text/javascript">
	$(document).ready(function() {
		$(".alert-danger").hide();
		$(".alert-success").hide();

		$("#them").click(function(event) {
			event.preventDefault();

			if(! $("#add-theloai").val()){
				$(".alert-danger").show();
				$(".alert-success").hide();
			}
			else{
				$.ajax({
					url: 'admin/theloai/them',
					type: 'post',
					data: $("form").serialize(),
					success: function(a){
						if(a){
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
