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
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($permissions as $permission)

                <tr>
                    <td>{{toWord($permission->name)}}</td>
                    <td>{{$permission->is_main}}</td>
                    <td>
                        <a href="{{route('admin.permissions.edit',$permission)}}"
                           class="btn btn-info btn-circle btn-sm">
                            <i class="fas fa-pen"></i>
                        </a>
                        @if($permission->is_main !== 1)
                            <form action="{{route('admin.permissions.destroy',$permission->id)}}" class="d-inline"
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
