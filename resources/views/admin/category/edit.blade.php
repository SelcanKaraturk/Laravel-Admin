@extends('admin.layouts.master')
@section('content')
  <div class="content">
      <div class="row">


          <div class="col-6 mx-auto">
              @include('admin.error.alerts-back')
              <form action="{{route('admin.category.update',$category->id)}}" method="post">
                  @csrf
                  @method('PUT')
                  <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Name</label>
                      <input type="text" class="form-control" name="name" value="{{$category->name}}" aria-describedby="emailHelp">

                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
              </form>
          </div>
      </div>

  </div>
@endsection


