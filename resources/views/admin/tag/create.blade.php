@extends('admin.layouts.master')
@section('content')
  <div class="content">
      <div class="row">


          <div class="col-6 mx-auto">

              <form action="{{route('admin.tag.store')}}" method="post">
                  @csrf
                  <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Name</label>
                      <input type="text" class="form-control" name="name">
                      @error('name')
                      <label  class="form-label">{{$message}}</label>
                      @enderror

                  </div>

                  <button type="submit" class="btn btn-primary">Submit</button>
              </form>
          </div>
      </div>

  </div>
@endsection


