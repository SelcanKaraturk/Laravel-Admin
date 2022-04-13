<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with(['category', 'user', 'tag', 'comment'])->get();
        //dd($posts->user->name);
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        //$tags = Tag::pluck('name','name')->all();
        $tags = Tag::all();

        return view('admin.post.create',compact('tags','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required|min:3|string',
            'body' => 'required|min:3|string',
            'category_id' => 'required|min:1|string',
            "tags"    => "required|array|min:1",
            "tags.*"  => "required|string|distinct|min:1",
        ]);
        $data = $request->only('title','body','category_id');
        $post = Post::create($data);
        $post->tag()->attach($request->tags);

        return redirect()->route('admin.post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //return $post;
        $post = $post->with(['category', 'user', 'tag', 'comment'])->first();
        //return $post->title;
        return view('admin.post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
