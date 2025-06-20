<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts = Post::where('login_id', auth()->id())->get();  //an array of all the posts created
        return response()
            ->view('posts.index', compact('posts'))
            ->header('Cache-Control', 'no-cache, no-store, must-revalidate')
            ->header('Pragma', 'no-cache')
            ->header('Expires', '0');           //show index blade with contents(compact in)'posts'->which has all the posts from above statement
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',          //validation process 
            'body' => 'required',
        ]);

        POST::create([
            'title' => $request->title,
            'body' => $request->body,
            'login_id' => auth()->id()
        ]);

        return redirect()->route('posts.index')->with('success','Post Created Succesfully');       //finally redirects to the index() in this with success msg if created successfully
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $post = POST::findOrFail($id);  //find the post
        return view ('posts.edit',compact('post'));     //show edit blade with contents(compact in)'post'->which has found the respective post as above
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $post = POST::findOrFail($id);  //find the post
        $post->update($validated);      //update the post with validated content

        return redirect()->route('posts.index')->with('success','Post Updated Succesfully');    //finally redirects to the index() in this with success msg if updated successfully
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = POST::findOrFail($id);  //find the post
        $post->delete();                //delete the post

        return redirect()->route('posts.index')->with('success','Post Deleted Succesfully');    //finally redirects to the index blade in routes with success msg if deleted successfully
    }
}
