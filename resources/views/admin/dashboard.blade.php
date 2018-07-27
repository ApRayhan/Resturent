@extends('layouts.app')
@push('css')
	{{-- expr --}}
@endpush
@section('content')
	<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">content_copy</i>
                  </div>
                  <p class="card-category">Slider</p>
                  <h3 class="card-title">{{ $sliderCount }}</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons text-danger">warning</i>
                    <a href="#pablo">Get More Space...</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">store</i>
                  </div>
                  <p class="card-category">Category/Item</p>
                  <h3 class="card-title">{{ $categoryCount }} / {{ $itemCount }}</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">date_range</i> Last 24 Hours
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">info_outline</i>
                  </div>
                  <p class="card-category">Status</p>
                  <h3 class="card-title">{{ $reservations->count() }}</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">local_offer</i> Tracked from Github
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-twitter"></i>
                  </div>
                  <p class="card-category">Message</p>
                  <h3 class="card-title">{{ $messageCount }}</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">update</i> Just Updated
                  </div>
                </div>
              </div>
            </div>
          </div>
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
@endsection
@push('js')
	{{-- expr --}}
@endpush