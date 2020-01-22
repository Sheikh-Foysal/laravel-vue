<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function get_all_blog_post(){
        $posts = Post::with('category','user')->orderBy('id','desc')->get();
        // return $category = Category::with('posts')->get();

        // return $posts;
        return response()->json([
            'posts' => $posts
        ],200);
    }

}
