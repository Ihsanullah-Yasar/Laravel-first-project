@extends('admin.layout.master')


@section('broadcrumbs')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Users</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/admin">Home</a></li>
          <li class="breadcrumb-item active">edit Users</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

@endsection

@section('content')

<section class="section">
      <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-10">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">users from</h5>

              <!-- Horizontal Form -->
              <form method="POST" action="{{route('register.update',$user->id)}}">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                  <label for="name"  class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" value="{{$user->name}}" name="name" class="form-control" id="name">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="email" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" value="{{$user->email}}" name="email" class="form-control" id="emial">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="password" class="col-sm-2 col-form-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" value="{{$user->password}}" name="password" class="form-control" id="password">
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label for="role" class="col-sm-2 col-form-label">role</label>
                  <div class="col-sm-10">
                    <input type="text" value="{{$user->role}}" name="role" class="form-control" id="role">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="image" class="col-sm-2 col-form-label">select image</label>
                  <div class="col-sm-10">
                  <input class="form-control" value="{{$user->image}}" name="image" type="file" id="formFile">
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- End Horizontal Form -->

            </div>
          </div>

        </div>
      </div>
    </section>

@endsection