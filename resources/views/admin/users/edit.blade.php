@extends('admin.layouts.master')
@section('content')
  <div class="content">
      <div class="row">


          <div class="col-6 mx-auto">
              @include('admin.error.alerts-back')
              <form action="{{route('admin.users.update',$user->id)}}" method="post">
                  @csrf
                  @method('PUT')
                  <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Name</label>
                      <input type="text" class="form-control" name="name" value="{{$user->name}}" aria-describedby="emailHelp">

                  </div>
                  <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Email address</label>
                      <input type="email" class="form-control" name="email" value="{{$user->email}}" aria-describedby="emailHelp">

                  </div>
                  <div class="mb-3">
                      <select class="form-select form-control" name="role" aria-label="Default select example">
                          @foreach($roles as $role)
                              <option
                                  @foreach($user->roles as $item)
                                      @if($item->name===$role->name)
                                  {{'selected'}}
                                  @endif
                                      @endforeach
                                  value="{{$role->id}}">{{$role->name}}</option>
                          @endforeach
                      </select>
                  </div>

                  <button type="submit" class="btn btn-primary">Submit</button>
              </form>
          </div>
      </div>

  </div>
@endsection


