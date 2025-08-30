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
            $query->where('category_id', $category_id);
        })->latest()->get();


        return view('home', compact('posts', 'categories'));
    }

    /**
     * Show method - for individual post 
     */
    public function show(Post $post) {
        return view('post', ['post' => $post]);
    }
}
