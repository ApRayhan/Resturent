@extends('layouts.app')

@push('css')
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css"/>
  <link rel="stylesheet" href="{{ asset('public/frontend/css/toastr.min.css') }}">

@endpush

@section('content')
{!! Toastr::message() !!}
	<div class="content">
        <div class="container-fluid">
			<div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Reservation</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="table" class="table" style="width:100%">
                      <thead class=" text-primary">
                        <th>Name</th>
                        <th>phone</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Status</th>
                        <th>Created at</th>
                        <th>Action</th>
                      </thead>
                      @foreach ($reservations as $key=>$reservation)
                      	<tbody>
                        <tr>
                          <td>{{ $reservation->name }}</td>
                          <td>{{ $reservation->phone }}</td>
                          <td>{{ $reservation->email }}</td>
                          <td>{{ $reservation->message }}</td>
                          <td>
                            @if ($reservation->status == true)
                              <span class="btn btn-success btn-sm">Confirmed</span>
                              @else
                              <span class="btn btn-danger btn-sm">Not Confirmed</span>
                            @endif</td>
                          <td>{{ $reservation->created_at }}</td>
                          <td>
                            @if ($reservation->status == false)
                              <a href="{{ route('reservation.reserve', $reservation->id) }}" onclick="if(confirm('Are You Confirm To Add The Reservation .')){
                              event.preventDefault();
                              document.getElementById('add-{{ $reservation->id }}').submit();
                            }else{
                              event.preventDefault();
                            }" class="btn btn-success btn-sm">
                              <i class="material-icons">done</i>
                            </a>
                            <form action="{{ route('reservation.reserve',$reservation->id) }}" method="post" id="add-{{ $reservation->id }}" style="display: none">
                              @csrf
                            </form>
                            @endif

                            <a href="{{ route('reservation.delete', $reservation->id) }}" onclick="if(confirm('Are You Confirm To Delete The Reservation .')){
                              event.preventDefault();
                              document.getElementById('delete-{{ $reservation->id }}').submit();
                            }else{
                              event.preventDefault();
                            }" class="btn btn-danger btn-sm">
                              <i class="material-icons">delete</i>
                            </a>
                            <form action="{{ route('reservation.reserve',$reservation->id) }}" method="post" id="delete-{{ $reservation->id }}" style="display: none">
                              @csrf
                              @method('delete')
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
    {!! Toastr::message() !!}
@endsection

@push('js')
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
  <script src="{{ asset('public/frontend/js/toastr.min.js') }}"></script>
	<script>
	$(document).ready(function() {
    $('#table').DataTable();
} );
	</script>
@endpush