@extends('layouts.app')

@section('content')
<div class="container">
<div class="card" >

    <div class="card-body">
        <div class= "d-flex justify-content-between">
            <div>
                <h5 class="card-title">Categories</h5>
        <h6 class="card-subtitle mb-2 text-muted">Lists of All Post Categories</h6>
            </div>
            <div>
                <button class="btn btn-primary" data-target="#category-create" data-toggle="modal">Create category</button>
                @include('modals.category-create')
            </div>
        </div>
        
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                  <tr>
                    <th scope="row">{{$category->id}}</th>
                    <td>{{$category->name}}</td>
                    <td>{{$category->slug}}</td>
                    <td>{{$category->created_at}}</td>
                    <td>
                    <!-- Example single danger button -->
                    <div class="btn-group">
                        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Action
                        </button>
                        <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Edit</a>
                        <a class="dropdown-item" href="#">Delete</a>
                        <a class="dropdown-item" href="{{route('categories.show',$category->id)}}">Views</a>
                        </div>
                    </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
    </div>
  </div>

</div>
  @endsection
