<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    public function all_posts(){
        $posts = Post::with('category','user')->orderBy('id','desc')->get();
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

    public function save_post(Request $request){

        $this->validate($request,[
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'photo' => 'required'
        ]);

        $strpos = strpos($request->photo,';');
        $sub = substr($request->photo,0,$strpos);
        $ex = explode('/',$sub)[1];
        $name = 'post_'.time().".".$ex;
        $img = Image::make($request->photo)->resize(300, 200);
        $upload_path = public_path()."/uploadimage/";
        $img->save($upload_path.$name);

        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->cat_id = $request->category_id;
        $post->user_id = Auth::user()->id;
        $post->photo = $name;
        $post->save();
    }


    public function delete_post($id){
        $post = Post::find($id);
        $image_path = public_path()."/uploadimage/";
        $image = $image_path . $post->photo;
        if(file_exists($image)){
            @unlink($image);
        }
        $post->delete();
    }
}
