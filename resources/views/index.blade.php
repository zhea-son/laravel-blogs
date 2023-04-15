@extends('layouts.app')
@section('content')


    <h1>Hello This is Home Page</h1>
    <div class="container text-center">

        <div class="row">
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
                    <a href="#" class="btn btn-primary">View</a>

                  </div>
            </div>
            <div class="col-6 col-md-4">
                <div class="card" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item">An item</li>
                      
                    </ul>
                    <a href="#" class="btn btn-primary">Go somewhere</a>

                  </div>
            </div>
            <div class="col">
            3 of 3
            </div>
        </div>
    </div>
    

    
@endsection