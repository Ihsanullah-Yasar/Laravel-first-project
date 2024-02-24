@extends('admin.layout.master')


@section('broadcrumbs')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Users</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/admin">Home</a></li>
          <li class="breadcrumb-item active">view Users</li>
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
              <h5 class="card-title">users table</h5>

              <!-- Table with stripped rows -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">email</th>
                    <th scope="col">password</th>
                    <th scope="col">role</th>
                    <th scope="col">operations</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($users as $user)
                  <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->username}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{Str::limit($user->password,20,' ...')}}</td>
                    <td>{{$user->role}}</td>
                    <td>
                        
                        
                        <form method="post" action="{{ route('register.destroy',$user->id) }}">
                          @method('delete')
                          @csrf  
                          <a href="{{ route('register.edit',$user->id) }}">
                        <button type="button" class="btn btn-outline-info btn-sm">update</button>
                        </a>
                          <button type="submit" class="btn btn-outline-danger btn-sm">delete</button>
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