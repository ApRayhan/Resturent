@extends('layouts.app')

@push('css')
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css"/>

@endpush

@section('content')
	<div class="content">
        <div class="container-fluid">
        	@if (session('successMsg'))
				<div class="alert alert-success">
	                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                      <i class="material-icons">close</i>
	                    </button>
	                    <span>
	                      <b> Success - </b>{{ session('successMsg') }}</span>
                  	</div>
        	@endif
        	<a href="{{ route('category.create') }}" class="btn btn-primary">Add Category</a>
			<div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Category Table</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="table" class="table" style="width:100%">
                      <thead class=" text-primary">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>Action</th>
                      </thead>
                      @foreach ($categorys as $key=>$category)
                      	<tbody>
                        <tr>
                          <td>{{ $key+1 }}</td>
                          <td>{{ $category->name }}</td>
                          <td>{{ $category->slug }}</td>
                          <td>{{ $category->created_at }}</td>
                          <td>{{ $category->updated_at }}</td>
                          <td>
                          	<a href="{{ route('category.edit',$category->id) }}" class="">Edit</a>
							! <a href="" onclick="if(confirm('Are You Sure To Delete This')){
								event.preventDefault();
								document.getElementById('delete-{{ $category->id }}').submit();
							}else{
								event.preventDefault();
							}">Delete</a>
							<form action="{{ route('category.destroy',$category->id) }}" method="post" id="delete-{{ $category->id }}" style="display: none">
								@csrf
								@method('DELETE')	
							</form>
                          </td>
                          <td class="text-primary"</td>
                        </tr>
                      </tbody>
                      @endforeach
                    </table>
                  </div>
                </div>
              </div>
     </div>
    </div>
@endsection

@push('js')
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
	<script>
	$(document).ready(function() {
    $('#table').DataTable();
} );
	</script>
@endpush