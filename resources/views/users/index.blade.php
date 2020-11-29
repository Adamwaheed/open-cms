@extends('layouts.app')

@section('content')
<div class="container">
<div class="card" >

    <div class="card-body">
        <h5 class="card-title">Users</h5>
        <h6 class="card-subtitle mb-2 text-muted">Lists of All Users</h6>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col"></th>
    
                  </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                  <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    @if(auth()->user()->id == $user->id)
                    <td class="text-success">Currently logged in</td>
                    @endif
                  </tr>
                  @endforeach
                </tbody>
              </table>
    </div>
  </div>

</div>
  @endsection
