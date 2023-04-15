@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('create') }}" class="btn btn-primary"> + Create New</a>

    <div class="row justify-content-center">
        <div class="col-6 col-md-4">
            <div class="card" style="width: 18rem;">
                <img src="/assets/images/car1.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Title</h5>
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">Category</li>
                  <li class="list-group-item">Author</li>
                  
                </ul>
                <div class="card-body">
                    <a href="{{ route('edit') }}" class="card-link">Edit</a>
                </div>
                <a href="#" class="btn btn-primary">View</a>

              </div>
        </div>
    </div>
</div>
@endsection
