@extends('admin.layouts.master')
@section('content')
    <div class="table-responsive">
        <table class="table table-hover"  id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)

                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>@foreach($user->roles as $role)
                            {{$role->name}}
                            @endforeach
                        </td>
                        <td>
                            <a href="{{route('admin.users.edit',$user->id)}}" class="btn btn-info btn-circle btn-sm">
                                <i class="fas fa-pen"></i>
                            </a>

                            <form action="{{route('admin.users.destroy',$user)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-circle btn-sm">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            </form>

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
