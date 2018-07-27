@extends('layouts.app')

@push('css')
@endpush

@section('content')
	<div class="content">
      <div class="container-fluid">
			   <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">{{ $message->subject }}</h4>
            </div>
            <div class="card-body">
                  <h3>Name : <span>{{ $message->name }}</span></h3>
                  <strong>Email : {{ $message->email }}</strong><hr>
                  <p>{{ $message->message }}</p>
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