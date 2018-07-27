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
        <h4 class="card-title ">Edit Category</h4>
      </div>
      <div class="card-body">
        <form action="{{ route('category.update', $category->id) }}" method="post">
          @csrf
          @method('PUT')
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                  <label class="bmd-label-floating">Name</label>
                  <input type="text" name="name" class="form-control" value="{{ $category-> name }}">
              </div>
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