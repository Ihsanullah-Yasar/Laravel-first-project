<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // just taking 10 posts with limit method
        $blogs=Blog::paginate(4)->fragment('blogs');
        return view('blog',compact('blogs'));
    }
    public function single_blog()
    {
        return view('blog-details');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.createBlog');
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
            'description'=> 'required',
            'blog_category'=> 'required',
            'user_id'=> 'required'
        ]);
        $blog=new Blog;
        $blog->title=$request->title;
        $blog->description=$request->description;
        if($request->hasFile('image')){
            
            $filenameWithExt=$request->file('image')->getClientOriginalName();
            $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
            $extension=$request->file('image')->getClientOriginalExtension();
    
            $uploadname='blog_'.time().'_fashion'.'.'.$extension;
            $image=$request->file('image')->storeAs('public/blogs',$uploadname);
            $fileNameToStore='storage/blogs/'.$uploadname;
            

            
        }
        else{
            $fileNameToStore='/storage/blogs/default.PNG';
        } 
        $blog->image=$fileNameToStore;
        $blog->blog_category_id=$request->blog_category;
        $blog->user_id=$request->user_id;
        $blog->save();
        return redirect('/admin/viewBlog');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $blog=Blog::where('id',$id)->first();
        return view('blog-details',compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {   
        $blog=Blog::where('id',$id)->first();
        $blogCategories=BlogCategory::all();
        $users=User::all();
        return view('admin.blog.editBlog',compact('blog','blogCategories','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $blog=Blog::find($id);
        $blog->title=$request->title;
        $blog->description=$request->description;
        if($request->image){
            $blog->image=$request->image;
        }
        $blog->blog_category_id=$request->blog_category;
        $blog->user_id=$request->user_id;
        $blog->save();
        return redirect('admin/viewBlog');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        Blog::find($id)->delete();
        return redirect('admin/viewBlog');
    }
}
