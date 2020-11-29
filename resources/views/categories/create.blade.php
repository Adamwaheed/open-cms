@extends('layouts.app')

@section('content')

@if(Session::has('success'))

<p class="alert alert-success">{{Session::get('success') }}</p>

@endif
<div class="container">
    <form action="/categories" method="POST">
        @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Name</label>
          <input type="text" name="name" class="form-control" placeholder="category-name">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>  
</div>
 
@endsection