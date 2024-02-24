<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::all();
        return view('admin.Users.viewUser',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Users.createUsers');
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
    
            $uploadname='users_'.time().'_profile'.'.'.$extension;
            $image=$request->file('image')->storeAs('public/users',$uploadname);
            $fileNameToStore='storage/users/'.$uploadname;
            

            
        }
        else{
            $fileNameToStore='/storage/products/default.PNG';
        }
        $register_user=new User;
        $register_user->name=$request->name;
        $register_user->email=$request->email;
        $register_user->password=Hash::make($request->password);
        $register_user->role=$request->role;
        $register_user->image=$fileNameToStore;
        $register_user->save();
        return redirect('admin/register');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Register  $register
     * @return \Illuminate\Http\Response
     */
    public function show(Register $register)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Register  $register
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::where('id',$id)->first();
        return view('admin.Users.editUsers',compact('user'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Register  $register
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validate=$request->validate([
            'name'=> 'required',
            'email'=>'required',
            'password'=>'required',
            'role'=>'required',
            'image'=>'required',  
        ]);
        $register_user=User::find($id);
        if($request->hasFile('image')){
            
            $filenameWithExt=$request->file('image')->getClientOriginalName();
            $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
            $extension=$request->file('image')->getClientOriginalExtension();
    
            $uploadname='users_'.time().'_profile'.'.'.$extension;
            $image=$request->file('image')->storeAs('public/users',$uploadname);
            $fileNameToStore='storage/users/'.$uploadname;
            

            
        }
        else{
            $fileNameToStore='/storage/products/default.PNG';
        }
        $register_user->name=$request->name;
        $register_user->email=$request->email;
        $register_user->password=Hash::make($request->password);
        $register_user->role=$request->role;
        $register_user->image=$fileNameToStore;
        $register_user->save();
        return redirect('admin/register');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Register  $register
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        User::where('id',$id)->delete();
        return redirect('/admin/register');
    }
}
