@extends('admin.layouts.master')
@section('content')
    <a href="{{route('admin.post.create')}}" class="btn btn-info btn-sm">
        Add New +
    </a>

    <div class="table-responsive">
        <table class="table table-hover"  id="dataTable" width="100%" cellspacing="0">

            <thead>
            <tr>
                <th>Title</th>
                <th>Content</th>
                <th>User Name</th>
                <th>Category Name</th>
                <th>Tag Name</th>
                <th>Published</th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)

                    <tr>
                        <td>{{$post->title}}</td>
                        <td>{{String($post->body,30)}}</td>
                        <td>{{$post->user->name}}</td>
                        <td>{{$post->category->name}}</td>
                        <td>{{$post->tag->implode('name',', ')}}</td>
                        <td>{{$post->published}}</td>
                        <td>
                            <a href="{{route('admin.post.show',$post)}}" class="btn btn-warning btn-circle btn-sm">
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{route('admin.post.edit',$post->id)}}" class="btn btn-info btn-circle btn-sm">
                                <i class="fas fa-pen"></i>
                            </a>

                            <form action="{{route('admin.post.destroy',$post->id)}}" method="post">
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
