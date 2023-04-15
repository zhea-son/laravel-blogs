@extends('layouts.app')
@section('content')
<div class="container text-center">
    <form class="row" method="POST" action="{{ route('add') }}" enctype="multipart/form-data">
        @csrf
        <div class="col-12">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control" name="title">
        </div>
        <div class="col-12">
            <label for="category" class="form-label">Category</label>
            <input type="text" class="form-control" name="category">
        </div>
        <div class="col-12">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" name="description" rows="10"></textarea>
        </div>
        {{-- <div class="col-12">
            <label for="category">Category</label>
            <select class="form-select" name="categoryy">
              <option selected>Choose...</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
          </div> --}}
          <div class="col-12">
            <label for="inputGroupFile02">Upload</label>
            <input type="file" class="form-control" name="image">
          </div> 
          <br/>
          <div class="col-12">
            <button type="submit" class="btn btn-primary">Create</button>
          </div>
</div>
    
@endsection