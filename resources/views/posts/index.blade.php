@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Posts</h5>
            <h6 class="card-subtitle mb-2 text-muted">Lists of All Posts</h6>
            <table class="table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Author</th>
                        <th>Category</th>
                        <th>Type</th>
                        <th>Created at</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($posts) <= 0)
                        <tr colspan='8' class='text-center'>
                           <td> no posts available</td>
                        </tr>
                    @else
                       @foreach ($posts as $post)
                       <tr>
                        <td>{{$post->title}}</td>
                        <td>{{$post->slug}}</td>
                        <td>{{$post->user->name}}</td>
                        <td>{{$post->category->name}}</td>
                        <td>{{$post->type}}</td>
                        <td>{{$post->created_at}}</td>
                        <td>{{$post->status}}</td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action
                                </button>
                                <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{route('posts.edit',$post->id)}}">Edit</a>
                                <a class="dropdown-item" href="#">Publish</a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete-{{$post->id}}">Delete</a>
                                <a class="dropdown-item" href="{{route('posts.show',$post->id)}}">View</a>
                                </div>
                            </div>
                        </td>
                       </tr>
                       @include('posts.delete')
                       @endforeach
                       {{$posts->links('pagination::bootstrap-4')}}
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
