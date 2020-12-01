@extends('layouts.app')

@section('content')

<div class="container">
   @include('components.alert')
<div class="card" >

    <div class="card-body">
        <div class= "d-flex justify-content-between">
            <div>
                <h5 class="card-title">Comments</h5>
        <h6 class="card-subtitle mb-2 text-muted">Lists of All Comments</h6>
            </div>
            <div>
            <a class="btn btn-primary" href="{{--route('comments.create')--}}" >Create</a>

            </div>
        </div>

            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Comment</th>
                    <th scope="col">Post</th>
                    <th scope="col">User Name</th>
                    <th scope="col">Created at</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($comments as $comment)
                  <tr>
                    <th scope="row">{{$comment->id}}</th>
                    <td>{{$comment->body}}</td>
                    <td>{{$comment->post_title}}</td>
                    <td>{{$comment->user_name}}</td>
                    <td>{{$comment->created_at}}</td>
                    <td>
                    <!-- Example single danger button -->
                    <div class="btn-group">
                        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Action
                        </button>
                        <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{--route('comments.edit',$category->id)--}}">Edit</a>



                        <form method="post" action="{{--route('comments.destroy',$category->id)--}}">
                            @csrf
                            @method('delete')
                            <div class="row">
                              <div class="col">
                                <button class="dropdown-item" type="submit">Delete</a>
                              </div>
                            </div>
                          </form>


                        <a class="dropdown-item" href="{{--route('comments.show',$category->id)--}}">Views</a>
                        </div>
                    </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              {{$comments->links('pagination::bootstrap-4')}}
    </div>
  </div>

</div>
  @endsection
