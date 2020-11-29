@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">New Post</h5>
            <h6 class="card-subtitle mb-2 text-muted">Create a New post</h6>

        <form action="{{route('posts.store')}}" method="POST">
            @csrf
            @method("POST")
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" class="form-control" name="title">
            </div>
        
            <div class="form-group">
                <label for="">Body</label>
                <textarea name="body" id="" cols="30" rows="10" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label for="">Type</label>
                <select name="type" id="" class="custom-select">
                    <option value="0">Page</option>
                    <option value="1">Post</option>
                </select>
            </div>

            <div class="form-group">
                <label for="">Category</label>
                <select name="category_id" id="" class="custom-select">
                    @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                  Save as draft
                </label>
              </div>
              <div class="form-group">
                  <input type="submit" value="Submit" class="btn btn-primary" id="submit">
              </div>

        </form>
        </div>
    </div>
</div>

@endsection