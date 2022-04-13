@extends('admin.layouts.master')
@section('content')
    <a href="{{route('admin.category.create')}}" class="btn btn-info btn-sm">
        Add New +
    </a>
    <div class="table-responsive">
        <table class="table table-hover"  id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>Name</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)

                    <tr>
                        <td>{{$category->name}}</td>
                        <td>
                            <a href="{{route('admin.category.edit',$category->id)}}" class="btn btn-info btn-circle btn-sm">
                                <i class="fas fa-pen"></i>
                            </a>

                            <form action="{{route('admin.category.destroy',$category->id)}}" method="post" class="d-inline">
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
