@extends('layouts.app')

@section('content')
<div class="container">
<div class="card" >

    <div class="card-body">
        <h5 class="card-title">Details of Category</h5>
        <h6 class="card-subtitle mb-2 text-muted">Show Single Category</h6>

        <table class="table">
            <tbody>
              <tr>
                <th scope="row">Name</th>
                <td>{{$category->name}}</td>
              </tr>
              <tr>
                <th scope="row">Slug</th>
                <td>{{$category->slug}}</td>
              </tr>
              <tr>
                <th scope="row">Created at</th>
                <td>{{$category->created_at}}</td>
              </tr>

              <tr>
                <th scope="row">Updated at</th>
                <td>{{$category->updated_at}}</td>
              </tr>
            </tbody>
          </table>
    </div>
  </div>

</div>
  @endsection
