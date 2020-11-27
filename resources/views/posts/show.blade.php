@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{$post->title}} [{{$post->status}}]</h5>
            <h6 class="card-subtitle mb-2 text-muted">{{$post->created_at}}</h6>
            <table class="table">
                <tbody>
                    <tr>
                        <th>Author</th>
                        <td>{{$post->user->name}}</td>
                    </tr>
                    <tr>
                        <th>Category</th>
                        <td>{{$post->category->name}}</td>
                    </tr>
                    <tr>
                        <th>Type</th>
                        <td>{{$post->type}}</td>
                    </tr>
                    <tr>
                        <th>Slug</th>
                        <td>{{$post->slug}}</td>
                    </tr>
                </tbody>
            </table>
            <hr>
        <p class="text-muted">{{$post->body}}</p>
        </div>
    </div>
</div>

    
@endsection