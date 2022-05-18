@extends('layouts.index')
   
@section('content')
<table class="table table-striped">
        <tr>
            <th>id</th>
            <th>name</th>
            <th>phone</th>
            <th>address</th>
            <th>image</th>
            <th>status</th>
            <th>action</th>
        </tr>
        @foreach($allBloger as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->post_title}}</td>
            <td>{{$user->post_content}}</td>
            <td>{{$user->post_place}}</td>
            <td><img src="{{ asset('images/'.$user->blog_image)}}" style="height: 76px;" alt=""></td>

            
            <td>
               
                @if($user->blog_status == 0)
                    <span style="color:green; font-weight:bold;">Active</span>
                @else
                <span style="color:red; font-weight:bold;">InActive</span> 
                @endif

            </td>
            <td>
                <a class="btn btn-primary" href="{{ url('/edit',$user->id)}}">edit</a>
                <a class="btn btn-warning" href="{{ url('statusCheck',$user->id)}}">status</a>
                <a class="btn btn-danger" href="{{ url('/delete',$user->id)}}">Delete</a>
                
            </td>
            
        </tr>
        @endforeach
    </table> 
@endsection