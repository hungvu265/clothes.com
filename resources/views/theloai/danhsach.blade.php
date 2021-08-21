@extends('admin.index')

@section('content')
<div style="display: flex; justify-content: flex-start;">
	<h3 class="text-primary">THỂ LOẠI</h3>
	<p class="ml-2 font-weight-bold">Danh sách</p>
</div>
<hr class="w-25" style="border-bottom: 2px solid">
<table class="table table-bordered">
	<thead>
		<tr>
			<th>Id</th>
			<th>Thể loại</th>
			<th colspan="2"></th>
		</tr>
	</thead>
	<tbody>
		@if($theloai)
			@foreach($theloai as $tl)
			<tr id="row{{ $tl->id }}">
				<td>{{ $tl->id }}</td>
				<td>{{ $tl->ten }}</td>
				<td><a href="javascript:void(0)" class="btn btn-primary" onclick="thaydoi( {{ $tl->id }} )">Thay đổi</a></td>
				<td><a href="javascript:void(0)" class="btn btn-danger" onclick="xoa({{ $tl->id }})">Xóa</a></td>
			</tr>
			@endforeach
		@endif		
	</tbody>
</table>

<!-- Change Modal -->
<div class="modal fade" id="ChangeModal" tabindex="-1" role="dialog" aria-labelledby="AddModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">THAY ĐỔI THỂ LOẠI</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="ChangeModalForm">
					@csrf
					<input type="hidden" name="id" id="id" value="">
					<input type="hidden" name="checkname" id="checkname" value="">
					<div class="form-group">
						<label>Tên thể loại</label>
						<input type="text" name="theloai2" id="theloai2" class="form-control pr-3" placeholder="Nhập thể loại" autocomplete="off">
					</div>
					<div class="form-group">
						<button class="btn btn-success" id="save2" data-dismiss="modal">Lưu</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>


<script type="text/javascript">
	//Thay đổi
	function thaydoi(id){
		$.get('admin/theloai/thaydoi/'+id, function(data) {
			$("#id").val(data.id);
			$("#checkname").val(data.ten);
			$("#theloai2").val(data.ten);
			$("#ChangeModal").modal('toggle');
		});
	}

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	$("#save2").click(function(event) {
		event.preventDefault();
		
		$.ajax({
			url: 'admin/theloai/thaydoi',
			type: 'post',
			data: $("form").serialize(),
			success: function(a){
				if(a.vali == 'false'){
					alert(a.noti.theloai2);
				}
				else{
					$('#row' + a.id + ' td:nth-child(2)').text(a.ten);
				}
			}
		});
			
	});
</script>

<script type="text/javascript">
	//Xóa
	function xoa(id){
		if (confirm("Bạn có đồng ý xóa không ?")){
			$.get('admin/theloai/xoa/'+id, function(data) {
				if(data == 'false'){
					alert("Xóa thất bại\nHãy chắc chắn rằng 'loại sản phẩm', 'sản phẩm' không chứa thể loại này");
				}else{
					$('#row' + id).text('');
				}
			});
		}
		
	}
</script>

@endsection

