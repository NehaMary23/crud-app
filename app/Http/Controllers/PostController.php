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

    public function index(Request $request)
    {
        $query = Post::where('login_id', auth()->id());    //an array of all the posts created

        if ($request->has('search') && $request->search !== '') {
            $query->where('title', 'like', $request->search . '%');
        }

        $posts = $query->latest()->paginate(6);

        return view('posts.index', compact('posts')) ;                    //show index blade with contents(compact in)'posts'->which has all the posts from above statement
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
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('uploads'), $imageName);
        
        POST::create([
            'title' => $request->title,
            'body' => $request->body,
            'login_id' => auth()->id(),
            'image' => $imageName,
        ]);

        
        return redirect(route('posts.index'))->with('success', 'Post Created Succesfully');       //finally redirects to the index() in this with success msg if created successfully
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
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $post = POST::findOrFail($id);  //find the post

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('uploads'), $imageName);

         $post->update([
            'title' => $validated['title'],
            'body' => $validated['body'],
            'image' => $imageName,
        ]);
        return redirect(route('posts.index'))->with('success', 'Post Updated Succesfully');    //finally redirects to the index() in this with success msg if updated successfully
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = POST::findOrFail($id);  //find the post
        $post->delete();                //delete the post

        return redirect(route('posts.index'))->with('success', 'Post Deleted Succesfully');     //finally redirects to the index blade in routes with success msg if deleted successfully
    }
}
