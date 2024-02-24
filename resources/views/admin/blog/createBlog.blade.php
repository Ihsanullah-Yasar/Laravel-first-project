@extends('admin.layout.master')


@section('broadcrumbs')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Blogs</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/admin">Home</a></li>
          <li class="breadcrumb-item active">create blog</li>
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
              <h5 class="card-title">Blog table</h5>
              @if ($errors->any())
                  <div>
                      <ul>
                          @foreach ($errors->all() as $error)
                              
                              <div class="alert alert-danger alert-dismissible fade show"       role="alert">
                                {{ $error }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                          @endforeach
                      </ul>
                  </div>
              @endif
              <!-- Horizontal Form -->
              <form method="POST" action="/blog" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                  <label for="title" class="col-sm-2 col-form-label">title</label>
                  <div class="col-sm-10">
                    <input type="text" name="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror" id="title">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="desc" class="col-sm-2 col-form-label">Description</label>
                  <div class="col-sm-10">
                    <textarea id="editor1" class="form-control @error('title') is-invalid @enderror" name="description" rows="4">{{ old('description') }}</textarea>
                  </div>
                </div>
                

                <div class="row mb-3">
                  <label for="image" class="col-sm-2 col-form-label">select image</label>
                  <div class="col-sm-10">
                  <input class="form-control" name="image" type="file" id="formFile">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="blog_category" class="col-sm-2 col-form-label">select Blog category</label>
                  <div class="col-sm-10">
                  <select id="blog_category" name="blog_category"  class="form-select">
                    <option selected>Choose...</option>

                    @foreach($blogCategories as $category)

                    <option value="{{$category->id}}">{{$category->name}}</option>

                    @endforeach
                  </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="user_id" class="col-sm-2 col-form-label">select user</label>
                  <div class="col-sm-10">
                  <select id="user_id" name="user_id"  class="form-select">
                    <option selected>Choose...</option>

                    @foreach($users as $user)

                    <option value="{{$user->id}}">{{$user->name}}</option>

                    @endforeach
                  </select>
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
    <!-- <script src="https://cdn.ckeditor.com/ckeditor5/37.0.1/classic/ckeditor.js"></script> -->
    <script src="{{ asset('adminAssets/ckeditor/ckeditor.js') }}"></script>

    <script>
    CKEDITOR.replace('editor1');
</script>
@endsection