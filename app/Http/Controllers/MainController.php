<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Product;

class MainController extends Controller
{
    //
    public function index(){
        //selecting womens product from database
        $womenProducts=Product::join('categories','products.category_id','=','categories.id')
        ->join('brands','products.brand_id','=','brands.id')
        ->join('tags','products.Tag_id','=','tags.id')
        ->select('products.id','name','price','discount_price','color','size','products.image','products.created_at','category_name','Brand_name','tag_name')->where('category_name','=',"women's")->limit(5)->get();
        // selecting mens products fromm database
        $menProducts=Product::join('categories','products.category_id','=','categories.id')
        ->join('brands','products.brand_id','=','brands.id')
        ->join('tags','products.Tag_id','=','tags.id')
        ->select('products.id','name','price','discount_price','color','size','image','products.created_at','category_name','Brand_name','tag_name')->where('category_name','=',"men's")->limit(5)->get();

        $blogs=Blog::limit(3)->get();
        // $blogs->skip(0)->take(3);
        
        return view('index',compact('blogs','womenProducts','menProducts'));
    }
}
