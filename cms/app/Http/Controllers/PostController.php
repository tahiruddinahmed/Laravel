<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $category_id = request('category_id');

        $categories = Category::all();

        $posts = Post::when($category_id, function($query) use ($category_id) {
            $query->where('categories_id', $category_id);
        })->latest()->get();


        return view('home', compact('posts', 'categories'));
    }

    /**
     * Show method - for individual post 
     */
    public function show(Post $post) {
        return view('post', ['post' => $post]);
    }

    public function create() {
        
        return view('posts.create', [
            'categories' => Category::all()
        ]);
    }

    public function store(Request $request) {
        // validation 
        $data = $request->validate([
            'title' => ['required', 'min:6', 'max:200'],
            'content' => 'required',
            'categories_id' => 'required'
        ]);

        // store the data into the database table called 'posts'
        Post::create([
            ...$data,
            'user_id' => $request->user()->id
        ]);

        return redirect()->route('index');

    }
}
