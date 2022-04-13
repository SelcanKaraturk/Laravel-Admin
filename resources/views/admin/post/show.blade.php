@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        {{$post->title}} <br>{{$post->user->name}} <br>{{$post->created_at}}
                    </h6>
                </div>
                <div class="card-body">
                    {{$post->body}}
                </div>
                <div class="card-footer">
                   <strong>Category:</strong> {{$post->category->name}} <br>
                   <strong>Tag:</strong> {{$post->tag->implode('name',', ')}}
                </div>
            </div>
        </div>
    </div>
    @endsection
