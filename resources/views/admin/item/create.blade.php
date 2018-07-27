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
        <h4 class="card-title ">Create Item</h4>
      </div>
      <div class="card-body">
        <form action="{{ route('item.store') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                  <label class="bmd-label-floating">Name</label>
                  <input type="text" name="name" class="form-control">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                  <label class="bmd-label-floating">Category</label>
                  <select class="form-control" name="category">
                    @foreach ($categorys as $category)
                      <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                  </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                  <label class="bmd-label-floating">Price</label>
                  <input type="number" name="price" class="form-control">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                  <label class="bmd-label-floating">Description</label>
                  <textarea class="form-control" name="description"></textarea>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
                  <label>image</label>
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