@extends('layouts.app')

@section('content')
<div class="container">
  @if(auth()->user()->role == 0)
    <a href="{{ route('create') }}" class="btn btn-primary"> + Create New</a>
  @endif
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
                  <li class="list-group-item"><b>{{$blog->category->category}}</b></li>
                  <li class="list-group-item">by: <b>{{$blog->user->name}}</b></li>
                  
                </ul>
                <div class="card-body">
                  <a href="/view/{{$blog->id}}" class="card-link" style="color:black;">View</a>
                  @if(auth()->user()->role == 0)
                  <a href="/edit/{{$blog->id}}" class="card-link">Edit</a>
                  @elseif(auth()->user()->role == 1)
                  <form action="/delete/{{$blog->id}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="card-link underline" style="color:red;">Delete</button>
                  </form>
                  @endif
                </div>

              </div>
            </div>
            @endforeach
    </div>
    

</div>
@endsection
