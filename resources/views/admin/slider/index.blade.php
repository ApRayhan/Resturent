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
        	<a href="{{ route('slider.create') }}" class="btn btn-primary">Add Slider</a>
			<div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Slider Table</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="table" class="table" style="width:100%">
                      <thead class=" text-primary">
                        <th>ID</th>
                        <th>Title</th>
                        <th>Sub Title</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>Image</th>
                        <th>Action</th>
                      </thead>
                      @foreach ($sliders as $key=>$slider)
                      	<tbody>
                        <tr>
                          <td>{{ $key+1 }}</td>
                          <td>{{ $slider->title }}</td>
                          <td>{{ $slider->sub_title }}</td>
                          <td>{{ $slider->created_at }}</td>
                          <td>{{ $slider->updated_at }}</td>
                          <td>{{ $slider->image }}</td>
                          <td>
                          	<a href="{{ route('slider.edit',$slider->id) }}" class="">Edit</a>
							! <button type="button" onclick="if(confirm('Are You Sure To Delete This')){
								event.preventDefault();
								document.getElementById('delete-{{ $slider->id }}').submit();
							}else{
								event.preventDefault();
							}">Delete</button>
							<form action="{{ route('slider.destroy',$slider->id) }}" method="post" id="delete-{{ $slider->id }}" style="display: none">
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