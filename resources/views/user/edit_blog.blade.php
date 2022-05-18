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
            <div class="card">
                <div class="card-header text-warning">{{ __('Update Blog  page') }}</div>

                <div class="card-body">
                <div class="container">
                    <h2>Blog Post</h2>
                    <form method="post" action="{{ route('blogPostUpdate',$postBloger->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                        <label for="post_title">post_title</label>
                        <input type="post_title" class="form-control" value="{{ $postBloger->post_title }}" name="post_title">
                        </div>
                        <div class="form-group">
                        <label for="post_content">post_content:</label>
                        <input type="post_content" class="form-control" value="{{ $postBloger->post_content }}" name="post_content">
                        </div>
                        <div class="form-group">
                        <label for="post_place">post_place:</label>
                        <input type="post_place" class="form-control" value="{{ $postBloger->post_place }}" name="post_place">
                        </div>
                        <div class="form-group">
                        <label for="blog_image">blog_image:</label>
                        <input type="file" class="form-control" value="{{ $postBloger->blog_image }}" name="blog_image">
                        </div>
                        <br>
                        <input type="hidden"  value="{{(Auth::user()->id)}}"  name="user_id">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button class="btn btn-danger"> <a href="{{route('user.dashboard')}}">Cancle</a></button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
