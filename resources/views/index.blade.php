@extends('layouts.app')
@section('content')


    <h1>Hello This is Home Page</h1>
    <div class="container text-center">
      @if(count($blogs)==0)
        No blogs available!
      @endif
        <div class="row">
          @foreach ($blogs as $blog)
              
            <div class="col-6 col-md-4">
                <div class="card" style="width: 18rem;">
                    <img src="{{$blog->image ? 'storage/' .$blog->image : '/assets/images/car1.jpg'}}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">{{$blog->title}}</h5>
                    </div>
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item"><b>{{$blog->category->category}}</b></li>
                      <li class="list-group-item">by: <b>{{$blog->user->name}}</b></li>
                      
                    </ul>
                    <a href="/view/{{ $blog->id }}" class="btn btn-primary">View</a>

                  </div>
            </div>
          @endforeach

        </div>
        {{$blogs->links()}}
    </div>
    

    
@endsection