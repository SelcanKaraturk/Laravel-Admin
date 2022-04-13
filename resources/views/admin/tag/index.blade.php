@extends('admin.layouts.master')
@section('content')
    <a href="{{route('admin.tag.create')}}" class="btn btn-info btn-sm">
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
            @foreach($tags as $tag)

                    <tr>
                        <td>{{$tag->name}}</td>
                        <td>
                            <a href="{{route('admin.tag.edit',$tag->id)}}" class="btn btn-info btn-circle btn-sm">
                                <i class="fas fa-pen"></i>
                            </a>

                            <form action="{{route('admin.tag.destroy',$tag->id)}}" method="post" class="d-inline">
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
