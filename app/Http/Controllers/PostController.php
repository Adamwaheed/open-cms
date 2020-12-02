<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->with(['category'])->paginate(10);

        return view('posts.index')->with(['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('posts.create')->with('categories',$categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post $post)
    {
     $post = new Post();
     $post->title = $request->title;
     $post->body = $request->body;
     $post->slug = $request->slug;
     $post->category_id = $request->category_id;
     $post->user_id = auth()->user()->id;
     $post->type = $request->type;
     $post->slug = Str::of($request->title)->slug('-');
     if($request->status !=="")
     {
         $post->status = "published";
     } else {
         $post->status = "draft";
     }

     $post->save();
     return redirect("/posts");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view("posts.show")->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('posts.edit')->with(['categories'=>$categories,'post'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        
        $post->title = $request->title;
        $post->body = $request->body;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;
        $post->user_id = auth()->user()->id;
        $post->type = $request->type;
        $post->slug = Str::of($request->title)->slug('-');
        if($request->status !=="")
        {
            $post->status = "published";
        } else {
            $post->status = "draft";
        }

        
        if ($post->save()){
            if($request->has("image")){
                $file =$request->file("image");
                $fileName = time().'_'.$file->getClientOriginalName();
                $request->file("image")->storeAs("uploads", $fileName, "public");
            }
        }
        return redirect("/posts");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect("/posts");
    }
}
