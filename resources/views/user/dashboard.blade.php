@extends('layouts.app')

@section('content')
<!-- navbar open -->
<nav class="navbar navbar-expand-sm bg-primary" style="margin-top:-20px;">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="{{route('user.dashboard')}}" style="color:white;">Home</a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="{{route('home')}}" style="color:white;">Create Blog</a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="#" style="color:white;">Booke Hotel</a>
    </li>
  </ul>
</nav>
<!-- navbar close -->
<div class="container mt-5">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- message open -->
            <div class="col-sm-12">
        @if(session()->get('success'))
          <div class="alert alert-success">
            {{ session()->get('success') }}
          </div>
        @endif
      </div>


    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
    
            <!-- message close -->
       <h1> @foreach($postBlogers as $post)</h1>
            <div class="container">
                <h2>Blogs Details</h2>
                <div class="card" style="width:800px">
                <img class="card-img-top" src="{{ asset('images/'.$post->blog_image) }}" alt="Card image" style="width:30%">
                    <div class="card-body">
                        <h4 class="card-title">{{$post->post_title}}</h4>
                        <p class="card-text">{{$post->post_content}}</p>
                        <p class="card-text">{{$post->post_place}}</p>
                        <div class="offset-md-8 col-md-4">
                            <a href="#" class="btn btn-primary">See Profile</a>
                            <span><a href="{{ url('edit_blog',$post->id)}}" class="btn btn-primary">Edit</a></span> 
                            <span><a href="{{ url('delete',$post->id)}}" class="btn btn-danger">Delete</a></span> 
                          
                        </div>
                    </div>
                
                </div>
            </div>
       @endforeach

 @endsection           