@extends('dashboard.layouts.app')

@section('title')
    {{trans('dashboard.categories')}}
@endsection

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Information </h3>
                    </div>
                    <!-- /.card-header -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if(Session::has('success'))
                        <div class="alert alert-success">
                            <ul>
                                <li>{{ Session::get('success') }}</li>
                            </ul>
                        </div>
                    @endif
                    @if(Session::has('fail'))
                        <div class="alert alert-danger">
                            <ul>
                                <li>{{ Session::get('fail') }}</li>
                            </ul>
                        </div>
                    @endif
                    @foreach($rows as $row)
                    <!-- form start -->
                    <form role="form"  action="{{route('updateCategory',$row->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Parent</label>
                                <select class="form-control" name="parent">
                                    <option value="0">قسم رئيسي</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" @if($category->id == $row->parent) selected @endif>{{$category->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Image</label>
                                <img src="{{asset($row->image)}}" class="img img-thumbnail" width="100px">
                                <input type="file" class="form-control"  name="image" >
                            </div>
                            @foreach (config('app.languages') as $key => $lang)
                                <h3>{{$lang}}</h3>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Title</label>
                                    <input type="text" name="{{$key}}[title]" class="form-control" value="{{$row->translate($key)->title}}">
                                </div>

                            @endforeach


                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-success btn-flat">Submit</button>
                        </div>
                    </form>
                    @endforeach
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

@endsection
