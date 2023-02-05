@extends('dashboard.layouts.app')

@section('title')
    {{trans('dashboard.posts')}}
@endsection

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">


                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            Users List
                        </h3>
                        <a href="postAdd" class="btn btn-success btn-flat text-white">Add New Post</a>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Image</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{$post->title}}</td>
                                    <td>{{$post->category->title}}</td>
                                    <td><img src="{{asset($post->image)}}" class="img img-thumbnail" width="100px"></td>
                                    <td>{{$post->created_at}}</td>
                                    <td>
                                        <a href="{{route('postEdit', $post->id)}}" class="btn btn-primary btn-flat text-white">Edit</a>
                                        <a href="{{route('postDelete', $post->id)}}" class="btn btn-danger btn-flat text-white">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Image</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

@endsection
