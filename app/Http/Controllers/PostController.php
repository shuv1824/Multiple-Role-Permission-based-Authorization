<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Post $post)
    {
        $this->authorize('view', $post);
        $posts = Post::all();

        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Post $post)
    {
        $this->authorize('create', $post);
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post $post)
    {
        $this->authorize('create', $post);

        $post = new Post;

        
        $user = Auth::user();

        $data = $this->validate($request, [
            'title' => 'required|string|max:255',
            'body' => 'required|string'
        ]);

        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = $user->id;

        $post->save();

        return redirect('/posts')->with('success', 'New post has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $this->authorize('view', $post);
        return view('post.post', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $this->authorize('update', $post);
        return view('post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $this->authorize('update', $post);

        $data = $this->validate($request, [
            'title' => 'required|string|max:255',
            'body' => 'required|string'
        ]);

        $post->title = $request->input('title');
        $post->body = $request->input('body');

        $post->save();

        return redirect('/posts/'.$post->id)->with('success', 'The post has been successfully edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);        
        $this->authorize('delete', $post);
        $post->delete();
        return redirect('/posts')->with('success', 'Post Removed');
    }
}
