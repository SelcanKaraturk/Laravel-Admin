@extends('admin.layouts.master')
@section('content')

    <div class="table-responsive">
        <table class="table table-hover"  id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>Id</th>
                <th>User</th>
                <th>Post id</th>
                <th>Body</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($comments as $comment)

                    <tr>
                        <td>{{$comment->id}}</td>
                        <td>{{$comment->name}}</td>
                        <td>{{$comment->post_id}}</td>
                        <td>{{$comment->body}}</td>
                        <td>
                            <form action="{{route('admin.comment.destroy',$comment->id)}}" method="post" class="d-inline">
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
<script>
    const form = $("#contactForm");
    form.submit(function(e){
        e.preventDefault();
        const formData = form.serializeArray();
        let language = document.getElementsByTagName("html")[0].getAttribute("lang");
        $("#inputName").empty();
        $("#inputLastname").empty();
        $("#inputTel").empty();
        $("#inputEmail").empty();
        $("#inputMessage").empty();
        $("#inputCheck").empty();
        $.ajax({
            type:'POST',
            url:'/iletisim',
            data:formData
        }).done(function (response){
            if(language === 'tr'){
                Swal.fire(
                    'Teşekkürler',
                    response.message,
                    'success'
                )
            }else{
                Swal.fire(
                    'Thank You',
                    'Your message has been sent',
                    'success'
                )
            }
        }).fail(function (data) {
            if (data.responseText !== '') {
                let err = JSON.parse(data.responseText);
                if(err.errors.name){
                    $("#inputName").append( '<p class="text-danger">'+err.errors.name[0]+'</p>')
                }
                if(err.errors.lastName){
                    $("#inputLastname").append( '<p class="text-danger">'+err.errors.lastName[0]+'</p>')
                }
                if(err.errors.phone){
                    $("#inputTel").append( '<p class="text-danger">'+err.errors.phone[0]+'</p>')
                }
                if(err.errors.email){
                    $("#inputEmail").append( '<p class="text-danger">'+err.errors.email[0]+'</p>')
                }
                if(err.errors.message){
                    $("#inputMessage").append( '<p class="text-danger">'+err.errors.message[0]+'</p>')
                }
                if(err.errors.check){
                    $("#inputCheck").append( '<p class="text-danger">'+err.errors.check[0]+'</p>')
                }
            }
        })
    });
</script>
