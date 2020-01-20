<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;


class PostController extends Controller
{
    public function all_posts(){
        $posts = Post::with('category','user')->get();
        // return $category = Category::with('posts')->get();

        // return $posts;
        return response()->json([
            'posts' => $posts
        ],200);
    }

    public function edit_post($id){
        $post = Post::find($id);
        return response()->json([
            'post' => $post
        ],200);
    }
}
