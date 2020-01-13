<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
class Post extends Model
{
    public function user(){
        return $this->belongsTo(User::class,'id');
    }
    
    public function category(){
        return $this->hasMany(Category::class,'id','cat_id');
    }
}
