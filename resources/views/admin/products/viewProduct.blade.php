@extends('admin.layout.master')


@section('broadcrumbs')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Products</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/admin">Home</a></li>
          <li class="breadcrumb-item active">view product</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
@endsection

@section('content')
<section class="section">
      <div class="row">
        <div class="col-1"></div>
        <div class="col-10">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">products table</h5>

              <!-- Table with stripped rows -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Discount</th>
                    <th scope="col">Color</th>
                    <th scope="col">Size</th>
                    <th scope="col">Category</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Tag</th>
                    <th scope="col">operations</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($products as $product)
                  <tr>
                    <th scope="row">{{$product->id}}</th>
                    <td>{{$product->name}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->discount_price}}</td>
                    <td>{{$product->color}}</td>
                    <td>{{$product->size}}</td>
                    <td>{{$product->category_name}}</td>
                    <td>{{$product->Brand_name}}</td>
                    <td>{{$product->tag_name}}</td>
                    <td>
                        
                        
                        <form method="post" action="{{ route('shop.destroy',$product->id) }}">
                          @method('delete')
                          @csrf 
                          <a href="{{ route('shop.edit',$product->id) }}">
                          <button type="button" class="btn btn-info btn-sm"><i class="bi bi-info-circle"></i></button>
                        </a>
                        <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-exclamation-octagon"></i></button>
                      </form>
                      
                  </td>
                  </tr>
                  @endforeach
                  <!-- <tr>
                    <th scope="row">2</th>
                    <td>Bridie Kessler</td>
                    <td>Developer</td>
                    <td>35</td>
                    <td>2014-12-05</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Ashleigh Langosh</td>
                    <td>Finance</td>
                    <td>45</td>
                    <td>2011-08-12</td>
                  </tr>
                  <tr>
                    <th scope="row">4</th>
                    <td>Angus Grady</td>
                    <td>HR</td>
                    <td>34</td>
                    <td>2012-06-11</td>
                  </tr>
                  <tr>
                    <th scope="row">5</th>
                    <td>Raheem Lehner</td>
                    <td>Dynamic Division Officer</td>
                    <td>47</td>
                    <td>2011-04-19</td>
                  </tr> -->
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>
        </div>
    </div>
</section>

@endsection