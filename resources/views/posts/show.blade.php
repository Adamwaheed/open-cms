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
    <div class="card mt-3">
        <div class="card-body">
            <h5 class="card-title">Comments ({{count($comments)}})</h5>
            @if (count($comments)>0)
            @foreach ($comments as $key => $comment)
            <div class="media">
                <img src="https://picsum.photos/100" class="mr-3" alt="...">
                <div class="media-body">
                <h5 class="mt-0">
                    <div>{{$comment->user->name}}</div>
                    <div>
                        <small>
                        {{$comment->created_at->diffForHumans()}}
                        </small>
                    </div>
                </h5>
                  {!!nl2br($comment->body)!!}
                </div>
              </div>
            @if (array_key_last($comments->toArray()) != $key)
                <hr/>
            @endif
              
            @endforeach 
            @else
                <span class="text-muted">No Comments to display.</span>
            @endif
            
            
        </div>
    </div>
    @if (auth()->check())
    <div class="card mt-3">
        
        <div class="card-body">
        
            <div class="media">
                <img src="https://picsum.photos/50" class="rounded-circle mr-3" alt="...">
                <div class="media-body">
                  <h5 class="mt-0">{{auth()->user()->name}}</h5>
                    <form action="{{route('comments.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Comment</label>
                            <textarea placeholder="Tell us something interesting ..." name="body" id="body" cols="30" rows="10" class="form-control"></textarea>
                        </div>

                            <input type="text" hidden="hidden" name="post_id" value={{$post->id}}>

                        <div class="form-group">
                            <input type="submit" value="Submit" class="btn btn-primary" id="submit">
                        </div>
                    </form>
                </div>
              </div>
        </div>
    </div>
    @else
    
    <div class="text-center alert alert-secondary mt-3 "><a href="{{route('login')}}">Login</a> to comment.</div>
    @endif
</div>

    
@endsection