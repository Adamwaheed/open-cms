@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">

        <div class= "d-flex justify-content-between">
            <div>
                <h5 class="card-title">Categories</h5>
                <h6 class="card-subtitle mb-2 text-muted">Create</h6>
            </div>
        </div>


        <form action="{{route('categories.store')}}" method='post'>
            @csrf
            @method("POST")
            <div class="form-group">
              <label for="name">Category Name</label>
              <input type="text" name="name" class="form-control">
            </div>

            <a class="btn btn-info" href="{{url()->previous()}}" >Back</a>
            <button type="submit" class="btn btn-primary">Save</button>

        </form>
    </div>
    </div>
</div>
@endsection
