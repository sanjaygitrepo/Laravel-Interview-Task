<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Sub Category</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link  href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
</head>
<body>
<div class="container mt-2">
	<div class="row">
		<div class="col-lg-12 margin-tb">
			<div class="pull-left">
			<h2>Sub Category Management</h2>
			</div>
			<div class="pull-right mb-2">
			<a class="btn btn-success" onClick="add()" href="javascript:void(0)"> Add Sub Category </a>
			</div>
		</div>
	</div>
		<div class="card-body">
			<table class="table table-bordered" id="category-datatable">
			<thead>
				<tr>
				<th>ID</th>
				<th>Sub Category Name of {{$category->name}}</th>
				<th>Action</th>
				</tr>
			</thead>
			</table>
		</div>
</div>
<!-- boostrap category model -->
<div class="modal fade" id="category-modal" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title" id="CategoryModal"></h4>
</div>
<div class="modal-body">
<form action="javascript:void(0)" autocomplete="off" id="CategoryForm" name="CategoryForm" class="form-horizontal" method="POST" enctype="multipart/form-data">
<input type="hidden" name="id" id="id">
<input type="hidden" name="parent_id" id="parent_id" value="{{$id}}">
<div class="form-group">
<label for="name" class="col-sm-2 control-label">Sub Category Name</label>
<div class="col-sm-12">
<input type="text" class="form-control" id="name" name="name" placeholder="Enter Sub Category Name" maxlength="50" required="">
</div>
</div>  

<div class="col-sm-offset-2 col-sm-10">
<button type="submit" class="btn btn-primary" id="btn-save">Save changes
</button>
</div>
</form>
</div>
<div class="modal-footer">
</div>
</div>
</div>
</div>
<!-- end bootstrap model -->
</body>
<script type="text/javascript">
$(document).ready( function () {
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
$('#category-datatable').DataTable({
processing: true,
serverSide: true,
ajax: "{{ url('categories/subcategories/'.$id) }}",
columns: [
{ data: 'id', name: 'id' },
{ data: 'name', name: 'name' },
{data: 'action', name: 'action', orderable: false},
],
order: [[0, 'desc']]
});
});
function add(){
$('#CategoryForm').trigger("reset");
$('#CategoryModal').html("Add SubCategory Of {{@$category->name}}");
$('#category-modal').modal('show');
$('#id').val('');
}   
function editFunc(id){

        let url = '{{route('categories.edit', ':queryId')}}';
        url = url.replace(':queryId', id);	
		$.ajax({
		type:"GET",
		url: url,
		dataType: 'json',
		success: function(res){
		$('#CategoryModal').html("Edit SubCategory Of {{@$category->name}}");
		$('#category-modal').modal('show');
		$('#id').val(res.id);
		$('#parent_id').val(res.category_id);
		$('#name').val(res.name);
		}
		});
}  
function deleteFunc(id){
if (confirm("Delete Record?") == true) {
	var id = id;
	// ajax
        var token = $("meta[name='csrf-token']").attr("content");
        $.ajax({
           type:'DELETE',
           url:"{{ url('categories') }}"+"/"+id,
            data: {
                "_token": token,
            },
			success: function(res){
			var oTable = $('#category-datatable').dataTable();
			oTable.fnDraw(false);
			}
        });    	
	}
}

	$('#CategoryForm').submit(function(e) {
	e.preventDefault();
		var formData = new FormData(this);
		$.ajax({
		type:'POST',
		url: "{{ url('categories/add-subcategory')}}",
		data: formData,
		cache:false,
		contentType: false,
		processData: false,
		success: (data) => {
		$("#category-modal").modal('hide');
		var oTable = $('#category-datatable').dataTable();
		oTable.fnDraw(false);
		$("#btn-save").html('Submit');
		$("#btn-save"). attr("disabled", false);
		},
		error: function(data){
		console.log(data);
		}
		});
	});
</script>
</html>