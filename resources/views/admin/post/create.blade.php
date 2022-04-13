@extends('admin.layouts.master')
@section('content')
  <div class="content">
      <div class="row">


          <div class="col-6 mx-auto">

              <form action="{{route('admin.post.store')}}" method="post">
                  @csrf
                  <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Title</label>
                      <input type="text" class="form-control" name="title">
                      @error('title')
                      <label  class="form-label">{{$message}}</label>
                      @enderror

                  </div>
                  <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Content</label>
                      <input type="text" class="form-control" name="body">
                      @error('body')
                      <label  class="form-label">{{$message}}</label>
                      @enderror
                  </div>
                  <div class="mb-3">
                      <label for="">Category Names</label>
                      <select class="form-select form-control" name="category_id" aria-label="Default select example">
                          @foreach($categories as $category)
                              <option value="{{$category->id}}">{{$category->name}}</option>
                          @endforeach
                      </select>
                      @error('category')
                      <label  class="form-label">{{$message}}</label>
                      @enderror
                  </div>
                  <div class="mb-3">
                      <label for="">Tag Names</label>
                      <select class="form-select form-control" multiple name="tags[]" aria-label="Default select example">
                          @foreach($tags as $tag)
                              <option value="{{$tag->id}}">{{$tag->name}}</option>
                          @endforeach
                      </select>
                      @error('tags')
                      <label  class="form-label">{{$message}}</label>
                      @enderror
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
              </form>
          </div>
      </div>

  </div>
@endsection


