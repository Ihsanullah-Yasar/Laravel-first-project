<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
    use HasFactory;
    use SoftDeletes;
    
    public function categories(){
        return $this->hasMany(Categories::class);
    }
    public function brand(){
        return $this->hasMany(Brand::class);
    }
    public function tags(){
        return $this->hasMany(Tags::class);
    }
    public function departments(){
        return $this->belongsToMany(Department::class,'product_departments');
    }
}
