<a href="javascript:void(0)" onClick="editFunc({{ $id }})" class="btn btn-success" title="Edit">
Edit
</a>
<a href="{{url('categories/subcategories/'.$id)}}" title="View SubCategory" class="btn btn-primary">
View
</a>
<a href="javascript:void(0);" id="delete-compnay" onClick="deleteFunc({{ $id }})" data-toggle="tooltip" data-original-title="Delete" class="delete btn btn-danger">
Delete
</a>