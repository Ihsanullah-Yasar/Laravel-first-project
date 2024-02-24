<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Categories;
use App\Models\Tags;
use App\Models\Brand;
use App\Models\Blog;
use App\Models\User;
use App\Models\BlogCategory;
use App\Models\Department;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }
    public function createProduct(){
        $categories= Categories::all();
        $tags=Tags::all();
        $brands=Brand::all();
        $departments=Department::all();

        return view('admin.products.createProduct',compact('categories','tags','brands','departments'));
    }
    public function viewProduct(){

        $products=Product::join('categories','products.category_id','=','categories.id')
        ->join('brands','products.brand_id','=','brands.id')
        ->join('tags','products.Tag_id','=','tags.id')
        ->select('products.id','products.name','products.price','products.discount_price','color','size','category_name','Brand_name','tag_name')->get();
        // $product=Product::with(['categories','brands','tags'])->first();
        // $products=DB::table('products')->join('categories','products.category_id','=','categories.id')
        //  ->join('brands','products.brand_id','=','brands.id')
        //  ->join('tags','products.Tag_id','=','tags.id')->get();
        //     return $products;
        $allDepartment=Department::all();

        return view('admin.products.viewProduct',compact('products','allDepartment'));
    }
    public function viewUsers(){
        $users=User::all();
        return view('admin.Users.viewUser',compact('users'));
    }
    public function createUsers(){
        return view('admin.Users.createUsers');
    }
    public function insertUser(Request $request){
        $validate=$request->validate([
            'name'=> 'required',
            'email'=>'required',
            'password'=>'required',
            'role'=>'required',
            'image'=>'required',  
        ]);
        $user=new User;
        if($request->hasFile('image')){
            
            $filenameWithExt=$request->file('image')->getClientOriginalName();
            $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
            $extension=$request->file('image')->getClientOriginalExtension();
    
            $uploadname='product_'.time().'_fashion'.'.'.$extension;
            $image=$request->file('image')->storeAs('public/products',$uploadname);
            $fileNameToStore='storage/products/'.$uploadname;
            

            
        }
        else{
            $fileNameToStore='/storage/products/default.PNG';
        }
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=$request->password;
        $user->role=$request->role;
        $user->image=$fileNameToStore;
        $user->save();
        
        return $request;
        return view('admin.Users.createUsers');
    }
    public function createBlog(){
        $users=User::all();
        $blogCategories=BlogCategory::all();
        return view('admin.blog.createBlog',compact('users','blogCategories'));
    }
    public function viewBlog(){

        $blogs=Blog::join('blog_categories','blogs.blog_category_id','=','blog_categories.id')
        ->join('users','blogs.user_id','=','users.id')
        ->select('blogs.id','blogs.title','blogs.description','blogs.image','blog_categories.name as category_name','users.name')->get();

        return view('admin.blog.viewBlog',compact('blogs'));

    }
    // public function createBlogCategory(){

    //     return view('admin.BlogCategories.createBlogCategory');
    // }
    public function viewBlogCategory(){
        $blogCategories=BlogCategory::all();
        return view('admin.BlogCategories.viewBlogCategory',compact('blogCategories'));
    }
    // public function createProductCategory(){
    //     return view('admin.productCategory.createProductCategory');
    // }
    // public function viewProductCategory(){
    //     $productCategories=Categories::all();
    //     return view('admin.productCategory.viewProductCategory',compact('productCategories'));
    // }

}
