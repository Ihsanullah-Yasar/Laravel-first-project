@extends('admin.layout.master')


@section('broadcrumbs')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>View Blogs Category</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/admin">Home</a></li>
          <li class="breadcrumb-item active">view blogs category</li>
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
              <h5 class="card-title">blogs category table</h5>

              <!-- Table with stripped rows -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">name</th>
                    <th scope="col">operations</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($tags as $tag)
                  <tr>
                    <th scope="row">{{$tag->id}}</th>
                    <td>{{$tag->tag_name}}</td>
                    <td>
                    <form method="post" action="{{ route('tags.destroy',$tag->id) }}">
                          @method('delete')
                          @csrf 
                          <a href="{{ route('tags.edit',$tag->id) }}">
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