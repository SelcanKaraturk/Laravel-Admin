@extends('admin.layouts.master')

@section('content')
    <div class="table-responsive">
        <table class="table table-dark table-hover"  id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>Uri</th>
                <th>Name</th>
                <th>Type</th>
                <th>Method</th>
            </tr>
            </thead>
            <tbody>
            @foreach($routes as $item)
               @if($item->getPrefix() !== '_debugbar' && $item->getPrefix() !== '_ignition')
                <tr>
                    <td>{{$item->uri()}}</td>
                    <td>{{$item->getName()}}</td>
                    <td>{{$item->getPrefix()}}</td>
                    <td>{{$item->getActionMethod()}}</td>
                </tr>
            @endif
            @endforeach

            </tbody>
        </table>
    </div>

{{--@dump($routes)--}}
@endsection

@section('page-level-script')
    <script src="{{asset('admins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admins/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('admins/js/demo/datatables-demo.js')}}"></script>
@endsection
