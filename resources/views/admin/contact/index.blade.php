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
			<div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">All Messages</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="table" class="table" style="width:100%">
                      <thead class=" text-primary">
                        <th>Name</th>
                        <th>Subject</th>
                        <th>Send at</th>
                        <th>Action</th>
                      </thead>
                      @foreach ($messages as $key=>$message)
                      	<tbody>
                        <tr>
                          <td>{{ $message->name }}</td>
                          <td>{{ $message->subject }}</td>
                          <td>{{ $message->created_at }}</td>
                          <td>
                          	<a href="{{ route('message.show', $message->id ) }}" class="btn btn-info btn-sm">Details</a>
							<button type="button" onclick="if(confirm('Are You Sure To Delete This')){
								event.preventDefault();
								document.getElementById('delete-{{ $message->id }}').submit();
							}else{
								event.preventDefault();
							}" class="btn btn-danger btn-sm">Delete</button>
							<form action="{{ route('message.delete', $message->id) }}" method="post" id="delete-{{ $message->id }}" style="display: none">
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