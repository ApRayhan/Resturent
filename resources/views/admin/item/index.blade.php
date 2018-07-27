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
        	<a href="{{ route('item.create') }}" class="btn btn-primary">Add Item</a>
			<div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Item Table</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="table" class="table" style="width:100%">
                      <thead class=" text-primary">
                        <th>Name</th>
                        <th>image</th>
                        <th>price</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>Action</th>
                      </thead>
                      @foreach ($items as $key=>$item)
                      	<tbody>
                        <tr>
                          <td>{{ $item->name }}</td>
                          <td><img class="img-responsive img-thumbnail" src="{{ asset('uploads/item/'.$item->image) }}"></td>
                          <td>{{ $item->price }}</td>
                          <td>{{ $item->category->name }}</td>
                          <td>{{ $item->description }}</td>
                          <td>{{ $item->created_at }}</td>
                          <td>{{ $item->updated_at }}</td>
                          <td>
                          	<a href="{{ route('item.edit',$item->id) }}" class="">Edit</a>
							! <a href="{{ route('item.destroy', $item->id) }}" onclick="if(confirm('Are You Sure To Delete This')){
								event.preventDefault();
								document.getElementById('delete-{{ $item->id }}').submit();
							}else{
								event.preventDefault();
							}">Delete</a>
							<form action="{{ route('item.destroy',$item->id) }}" method="post" id="delete-{{ $item->id }}" style="display: none">
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