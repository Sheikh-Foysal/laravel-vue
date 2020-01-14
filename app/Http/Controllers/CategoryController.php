<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function add_category(Request $request){
        $category = new Category();
        $category->cat_name = $request->cat_name;
        $category->save();
        return "saved";
    }
}
