<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    public function blog_category(){
        return $this->hasMany(BlogCategory::class);
    }
    
    public function ourUser(){
        return $this->hasMany(OurUser::class);
    }
    public function comments(){
        return $this->belongsTo(Comment::class);
    }
    
    
}
