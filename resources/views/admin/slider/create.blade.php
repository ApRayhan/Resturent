@extends('layouts.app')

@push('css')
	
@endpush

@section('content')
	<div class="content">
    <div class="container-fluid">
      @if ($errors->any())
                    @foreach ($errors->all() as $error)
                     <div class="alert alert-danger">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="material-icons">close</i>
                      </button>
                      <span>
                        <b> Danger - </b> {{ $error  }}</span>
                    </div>
                    @endforeach
        @endif
      <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title ">Create Slider</h4>
      </div>
      <div class="card-body">
        <form action="{{ route('slider.store') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                  <label class="bmd-label-floating">Title</label>
                  <input type="text" name="title" class="form-control">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                  <label class="bmd-label-floating">Sub Title</label>
                  <input type="text" name="sub_title" class="form-control">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <input type="file" name="image">
            </div>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
    </div>
    </div>
    </div>
  </div>
@endsection

@push('js')
	
@endpush