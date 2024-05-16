<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Redirect;

class PostCntroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::paginate(10);
        return view('dashboard.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $post = new Post();
        $categories = Category::all();
        return view('dashboard.posts.create', compact('post', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required',
            'category_id' => 'required|exists:categories,id',
            'image' => 'required',
            'content' => 'required'
        ];
        $message = [
            'name.required' => 'Name is required',
            'category_id.required' => 'category is required',
            'image.required' => 'file image is required',
            'content.required' => 'content is required',
        ];
        $this->validate($request, $rules, $message);

        $filePath = Storage::putFile('posts', $request->image);
        Post::create([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'image' => $filePath,
            'content' => $request->content
        ]);

        return Redirect::route('post.index')->with('success', 'Post Created success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        return view('dashboard.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $post = Post::findOrFail($id);
        $rules = [
            'title' => 'required',
            'category_id' => 'required|exists:categories,id',
            'content' => 'required'
        ];
        $message = [
            'title.required' => 'Name is required',
            'category_id.required' => 'category is required',
            'content.required' => 'content is required',
        ];
        $this->validate($request, $rules, $message);


        if($request->has('image')) {
            Storage::delete($post->image); //unlink
            $filePath =Storage::putFile('posts', $request->image);
            $post->image = $filePath;
        }

        $post -> update([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'content' => $request->content
        ]);

        return Redirect::route('post.index')->with('success', 'Post Updated success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        Storage::delete($post->image); //unlink
        $post->delete();
        return Redirect::route('post.index')->with('success', 'Post Deleted success');
    }
}
