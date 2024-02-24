
@extends('admin.layout.master')


@section('broadcrumbs')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Blogs Category</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/admin">Home</a></li>
          <li class="breadcrumb-item active">create blog category</li>
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
              <h5 class="card-title">edit blogs category</h5>

              <!-- Multi Columns Form -->
              <form class="row g-3" method="POST" action="{{ route('blogCategory.update',$blogCategory->id)}}">
                @csrf
                @method('PUT')
                <div class="col-md-12">
                  <label for="category" class="form-label">Category name</label>
                  <input type="text" value="{{ $blogCategory->name }}" name="category" class="form-control">
                </div>
                
                
                
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- End Multi Columns Form -->

            </div>
          </div>

        </div>
        <div class="col-lg-1"></div>
    </div>
    </section>

@endsection