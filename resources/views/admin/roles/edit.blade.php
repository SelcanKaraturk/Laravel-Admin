@extends('admin.layouts.master')
@section('content')
    <div class="content">
        <div class="row">


            <div class="col-6 mx-auto">
                @include('admin.error.alerts-back')
                <form action="{{route('admin.roles.update',$role->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" value="{{toWord($role->name)}}"
                               aria-describedby="emailHelp">

                    </div>

                    <div class="mb-3">
                        <select class="form-select form-control" name="is_see_admin" aria-label="Default select example">
                            <option {{$role->is_see_admin === 0 ? 'selected': ''}} value="0">0</option>
                            <option {{$role->is_see_admin === 1 ? 'selected': ''}} value="1">1</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

    </div>
@endsection


