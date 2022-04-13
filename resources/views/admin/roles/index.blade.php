@extends('admin.layouts.master')
@section('content')
    @if(session()->has('message'))
        {{session('message')}}
    @endif
    <div class="table-responsive">

        <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>Name</th>
                <th>Is Main</th>
                <th>Is See Admin</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($roles as $role)

                <tr>
                    <td>{{toWord($role->name)}}</td>
                    <td>{{$role->is_main}}</td>
                    <td>{{$role->is_see_admin}}</td>
                    <td>
                        <a href="{{route('admin.roles.edit',$role->id)}}"
                           class="btn btn-info btn-circle btn-sm">
                            <i class="fas fa-pen"></i>
                        </a>
                        <a href="{{route('admin.manage-permissions',$role->id)}}" class="btn btn-info btn-circle btn-sm">
                            <i class="fas fa-plus"></i>
                        </a>
                        @if($role->is_main !== 1)
                            <form action="{{route('admin.roles.destroy',$role->id)}}" class="d-inline"
                                  method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-circle btn-sm">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            </form>
                        @endif
                    </td>
                </tr>

            @endforeach

            </tbody>
        </table>
    </div>
@endsection

@section('page-level-script')
    <script src="{{asset('admins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admins/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('admins/js/demo/datatables-demo.js')}}"></script>
@endsection
