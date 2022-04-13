@extends('admin.layouts.master')
@section('content')
  <div class="content">
      <div class="row">


          <div class="col-6 mx-auto">

              <form action="{{route('admin.users.store')}}" method="post">
                  @csrf
                  <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Name</label>
                      <input type="text" class="form-control" name="name" aria-describedby="emailHelp">
                      @error('name')
                      <label  class="form-label">{{$message}}</label>
                      @enderror

                  </div>
                  <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Email address</label>
                      <input type="email" class="form-control" name="email" aria-describedby="emailHelp">
                      @error('email')
                      <label  class="form-label">{{$message}}</label>
                      @enderror
                  </div>
                  <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Password</label>
                      <input type="password" class="form-control" name="password">
                      @error('password')
                      <label  class="form-label">{{$message}}</label>
                      @enderror
                  </div>
                  <div class="mb-3">
                      <select class="form-select form-control" name="role" aria-label="Default select example">
                          @foreach($roles as $role)
                              <option value="{{$role->id}}">{{$role->name}}</option>
                          @endforeach
                      </select>
                  </div>


                  <button type="submit" class="btn btn-primary">Submit</button>
              </form>
          </div>
      </div>

  </div>
@endsection


