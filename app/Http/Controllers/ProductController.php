<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Brand;
use App\Models\Categories;
use App\Models\Tags;
use App\Models\Department;
use App\Models\Product_departments;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::join('categories','products.category_id','=','categories.id')
        ->join('brands','products.brand_id','=','brands.id')
        ->join('tags','products.Tag_id','=','tags.id')->select('products.id','products.name','products.image','products.price','products.discount_price','color','size','category_name','Brand_name','tag_name')->paginate(9)->fragment('products');
        
        // $page_id=1;
        return view('shop',compact('products'));
    }
    public function singleProduct()
    {
        return view('product');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate=$request->validate([
            'title'=> 'required',
            'price'=>'required',
            'discount_price'=> 'required',
            'color'=> 'required',
            'size'=> 'required',
            'category'=> 'required',
            'brand'=> 'required',
            'tag'=> 'required',
            'department'=> 'required'
        ]);
        
        $product=new Product;
        $product->name=$request->title;
        $product->price=$request->price;
        $product->discount_price=$request->discount_price;
        $product->color=$request->color;
        $product->size=$request->size;
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
        $product->image=$fileNameToStore;
        $product->category_id=$request->category;
        $product->brand_id=$request->brand;
        $product->tag_id=$request->tag;
        
        
        // $product->save();
        // $prod=Product::where([['name','=',$request->name],['image','=',$fileNameToStore]]);
        // $prod->departments()->attach([$request->department,2]);
        // // // $product->department_id=$request->department;
        // return $product;
        // exit();  
        return redirect('/admin/viewProduct');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $products=Product::where('id',$id)->get();
        return $product;
        return view('shop',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    // public function pagenateMethod($id){
    //     // select post with pagenate id
    //     if($id==-1){
    //         $id=0;
    //     }
        
    //     $countlimit=9;
    //     $countlimit=$countlimit*$id;
    //     $products = $users = Product::paginate(9);
    //     return $products;
    //     $products=Product::skip($countlimit)->limit(10)->get();
    //     $page_id=$id;
    //     return view('shop',compact('products','page_id'));
    // }
    public function edit( $id)
    {
        $product=Product::where('id',$id)->first();
        // foreach($product as $p){
        //     echo $p->name;
        // }
        $brands=Brand::all();
        $categories=Categories::all();
        $tags=Tags::all();
        $departments=Department::all();

        return view('admin.products.editProduct',compact('product','brands','categories','tags','departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product=Product::find($id);
         $product->name=$request->title;
         $product->price=$request->price;
         $product->discount_price=$request->discount_price;
         $product->color=$request->color;
         $product->size=$request->size;
         if($request->hasFile('image')){
            
            $filenameWithExt=$request->file('image')->getClientOriginalName();
            $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
            $extension=$request->file('image')->getClientOriginalExtension();
    
            $uploadname='product_'.time().'_fashion'.'.'.$extension;
            $image=$request->file('image')->storeAs('public/products',$uploadname);
            $fileNameToStore='storage/products/'.$uploadname;
            
            $product->image=$fileNameToStore; 
        }
         $product->category_id=$request->category;
         $product->brand_id=$request->brand;
         $product->Tag_id=$request->tag;
         $product->department_id=$request->department;
         $product->save();

         return redirect('/admin/viewProduct');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Product::destroy($id);
        Product::find($id)->delete();
        return redirect('/admin/viewProduct');
    }
}
