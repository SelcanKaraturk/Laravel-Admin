@extends('admin.layouts.master')

@section('content')
    <div class="col-lg-12">
        <div class="card shadow">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">
                    Role Permission - {{$role->name}}
                </h6>
            </div>
            <div class="card-body">
                <div class="card-area">
                    <div class="col-12">
                        <h5>Available Permissions</h5>
                        <form action="{{route('admin.manage-permissions-role')}}" method="post">
                            @csrf
                            <div class="row">
                                @foreach($permissions as $per)
                                    <div class="col-md-2">
                                        <input type="checkbox"
                                               @foreach($role->permissions as $rolPerm) @if($rolPerm->name === $per->name) checked
                                               @endif @endforeach name="permissions[{{$per->id}}]" id="id-{{$per->name}}">
                                        <label for="id-{{$per->name}}">{{$per->name}}</label>
                                    </div>
                                @endforeach
                            </div>
                            <input type="hidden" name="id" value="{{$role->id}}">
                            <button class="btn btn-success mt-4 mx-auto" type="submit">
                                Güncelle
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
