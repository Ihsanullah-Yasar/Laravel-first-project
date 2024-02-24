
@extends('admin.layout.master')


@section('broadcrumbs')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Products</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/admin">Home</a></li>
          <li class="breadcrumb-item active">create product</li>
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
              <h5 class="card-title">create Products</h5>
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
              <!-- Multi Columns Form -->
              <form  class="row g-3" method="POST" action="/shop" enctype="multipart/form-data">
                @csrf
                <div class="col-md-12">
                  <label for="title" class="form-label">Name</label>
                  <input type="text" name="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror">
                </div>
                <div class="col-md-12">
                  <label for="price" class="form-label">price</label>
                  <input type="text" value="{{ old('price') }}" class="form-control  @error('title') is-invalid @enderror" name="price" id="price">
                </div>
                <div class="col-md-12">
                  <label for="discount_price" class="form-label">discount price</label>
                  <input type="text" value="{{ old('discount_price') }}" class="form-control  @error('title') is-invalid @enderror" name="discount_price" id="discount_price">
                </div>
                <div class="col-12">
                  <label for="color" class="form-label">color</label>
                  <input type="text" value="{{ old('color') }}" class="form-control  @error('title') is-invalid @enderror" name="color" id="color">
                </div>
                <div class="col-12">
                  <label for="size" class="form-label">size</label>
                  <input type="text" value="{{ old('size') }}" class="form-control  @error('title') is-invalid @enderror" name="size" id="size">
                </div>
                <div class="col-sm-10">
                    <input class="form-control" value="{{ old('image') }}" name="image" type="file" id="formFile">
                </div>
                <div class="col-12">
                  <label for="inputState" class="form-label">category</label>
                  <select id="inputState" name="category"  class="form-select  @error('title') is-invalid @enderror">
                    <option selected>Choose...</option>

                    @foreach($categories as $category)

                    <option value="{{$category->id}}">{{$category->category_name}}</option>

                    @endforeach
                  </select>
                </div>
                
                <div class="col-md-4">
                  <label for="inputState" class="form-label">brand</label>
                  <select id="inputState" name="brand" class="form-select  @error('title') is-invalid @enderror">
                    <option selected>Choose...</option>
                    @foreach($brands as $brand)

                    <option value="{{$brand->id}}">{{$brand->Brand_name}}</option>

                    @endforeach
                  </select>
                </div>
                <div class="col-md-4">
                  <label for="inputState" class="form-label">Tags</label>
                  <select id="inputState" name="tag" class="form-select  @error('title') is-invalid @enderror">
                    <option selected>Choose...</option>
                    @foreach($tags as $tag)

                    <option value="{{$tag->id}}">{{$tag->tag_name}}</option>

                    @endforeach
                  </select>
                </div>
                <div class="col-md-4">
                  <label for="inputState" class="form-label">Departments</label>
                  <select id="inputState" name="department" class="form-select">
                    <option selected>Choose...</option>
                    @foreach($departments as $department)

                    <option value="{{$department->id}}">{{$department->name}}</option>

                    @endforeach
                  </select>
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