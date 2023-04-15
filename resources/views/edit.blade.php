@extends('layouts.app')
@section('content')
<div class="container text-center">
    <form class="row" method="POST" action="/update/{{$blog->id}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="col-12">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control" name="title" value="{{$blog->title}}">
        </div>
        
        <div class="col-12">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" name="description" rows="10" value="">{{$blog->description}}</textarea>
        </div>
        <div class="col-12">
            <label for="category">Category</label>
            <select class="form-select" name="category">
              <option selected>{{$blog->category->category}}</option>
              @foreach ($blog_categories as $blog_category)
              <option value="{{$blog_category->id}}">{{$blog_category->category}}</option>    
              @endforeach
            </select>
          </div>
          <div class="col-12">
            <label for="inputGroupFile02">Upload</label>
            <input type="file" class="form-control" name="image">
          </div> 
          <br/>
          <div class="col-12">
            <button type="submit" class="btn btn-primary">Edit</button>
          </div>
</div>
    
@endsection