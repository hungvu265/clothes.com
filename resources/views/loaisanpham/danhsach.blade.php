@extends('admin.index')

@section('content')
<div style="display: flex; justify-content: flex-start;">
	<h3 class="text-primary">LOẠI SẢN PHẨM</h3>
	<p class="ml-2 font-weight-bold">Danh sách</p>
</div>
<hr class="w-25" style="border-bottom: 2px solid">
<form action="" method="">
	@csrf
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Id</th>
				<th>Loại sản phẩm</th>
				<th>Thể loại</th>
				<th colspan="2"></th>
			</tr>
		</thead>
		<tbody>
			@if($loaisp)
			@foreach($loaisp as $lsp)
			<tr id="row{{ $lsp->id }}">
				<td>{{ $lsp->id }}</td>
				<td>{{ $lsp->ten }}</td>
				<td>{{ $lsp->theloai->ten }}</td>
				<td><a href="javascript:void(0)" class="btn btn-primary" onclick="thaydoi({{ $lsp->id }})">Thay đổi</a></td>
				<td><a href="javascript:void(0)" class="btn btn-danger" onclick="xoa({{ $lsp->id }})">Xóa</a></td>
			</tr>
			@endforeach
			@endif
		</tbody>
	</table>
</form>

<!-- Change Modal -->
<div class="modal fade" id="ChangeModal" tabindex="-1" role="dialog" aria-labelledby="AddModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">THAY ĐỔI LOẠI SẢN PHẨM</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="ChangeModalForm" method="post" action="admin/loaisanpham/thaydoi">
					@csrf
					<input type="hidden" name="id" id="id" value="">
					<div class="form-group">
						<label>Tên loại sản phẩm</label>
						<input type="text" name="loaisp" id="loaisp" class="form-control pr-3" placeholder="Nhập thể loại" autocomplete="off">
					</div>
					<div class="form-group">
						<label>Thể loại</label>
						<select class="pt-1 pb-1" name="theloai">
							@if($theloai)
								@foreach($theloai as $tl)
								<option id="option{{ $tl->id }}" value="{{ $tl->id }}">{{ $tl->ten }}</option>
								@endforeach
							@endif
						</select>
					</div>
					<div class="form-group">
						<button class="btn btn-success" id="save" data-dismiss="modal">Lưu</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>


<script type="text/javascript">
	function thaydoi(id){
		$.get('admin/loaisanpham/thaydoi/'+id, function(data) {
			$("#loaisp").val(data.ten);
			$("#id").val(data.id);
			$('#option'+data.id_theloai).prop('selected', 'true');
			$("#ChangeModal").modal('toggle');
		});

		$("#save").click(function(event) {
			event.preventDefault();

			if(! $("#loaisp").val()){
				alert("Thay đổi thất bại\n Không được để trống")
			}
			else{
				$.ajax({
					url: 'admin/loaisanpham/thaydoi',
					type: 'post',
					data: $("form").serialize(),
					success: function(a){
						if(a){
							$('#row' + a.id + ' td:nth-child(2)').text(a.ten);
							$('#row' + a.id + ' td:nth-child(3)').text(a.theloai);
							$(window).reset();
						}
					}
				});
			}
		});	
	}
</script>

<script type="text/javascript">
	function xoa(id){
		if(confirm("Bạn có chắc chắn muốn xóa không?")){
			$.get('admin/loaisanpham/xoa/'+id, function(data) {
				if(data == 'false'){
					alert("Xóa thất bại\nHãy chắc chắn rằng 'sản phẩm' không chứa loại sản phẩm này");
				}else{
					$('#row' + id).text('');
				}
			});
		}
		
	}
</script>
@endsection
