@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('create') }}" class="btn btn-primary"> + Create New</a>

    @if (count($blogs)==0)
    No blogs Available
    
    @endif
    
    <div class="row justify-content-center">
      
      
      @foreach ($blogs as $blog)
      <div class="col-6 col-md-3">
            <div class="card" style="width: 18rem;">
                <img src="{{$blog->image ? 'storage/' .$blog->image : '/assets/images/car1.jpg'}}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{$blog->title}}</h5>
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">{{$blog->category}}</li>
                  <li class="list-group-item">{{$blog->user->name}}</li>
                  
                </ul>
                <div class="card-body">
                    <a href="/edit/{{$blog->id}}" class="card-link">Edit</a>
                </div>
                <a href="/view/{{$blog->id}}" class="btn btn-primary">View</a>

              </div>
            </div>
            @endforeach
    </div>
    {{$blogs->links()}}

</div>
@endsection
