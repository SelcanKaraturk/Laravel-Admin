@extends('admin.layouts.master')
@section('content')
  <div class="content">
      <div class="row">


          <div class="col-6 mx-auto">
              @include('admin.error.alerts-back')
              <form action="{{route('admin.permissions.store')}}" method="post">
                  @csrf
                  <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Name</label>
                      <input type="text" class="form-control" name="name" aria-describedby="emailHelp">
                      @error('name')
                      <label  class="form-label">{{$message}}</label>
                      @enderror

                  </div>

                  <div class="mb-3">
                      <label for="" class="form-label">Is Main</label>
                      <select class="form-select form-control" name="is_main" aria-label="Default select example">
                              <option value="0">0</option>
                              <option selected value="1">1</option>
                      </select>
                  </div>


                  <button type="submit" class="btn btn-primary">Submit</button>
              </form>
          </div>
      </div>

  </div>
@endsection


