@extends('dashboard.layouts.app')

@section('title')
    {{trans('dashboard.categories')}}
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
                        <a href="categoryAdd" class="btn btn-success btn-flat text-white">Add New Category</a>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Parent</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{$category->title}}</td>
                                    <td>
                                        @if($category->parent > 0)
                                            {{$category->getParent->title}}
                                        @else
                                            قسم رئيسي
                                        @endif
                                    </td>
                                    <td>
                                        <img src="{{asset($category->image)}}" class="img img-thumbnail" width="100px">

                                    </td>
                                    <td>
                                        <a href="{{route('editCategory', $category->id)}}" class="btn btn-primary btn-flat text-white">Edit</a>
                                        <a href="{{route('categoryDelete', $category->id)}}" class="btn btn-danger btn-flat text-white">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
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
