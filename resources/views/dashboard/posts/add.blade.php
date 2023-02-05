@extends('dashboard.layouts.app')

@section('title')
    {{trans('dashboard.users')}}
@endsection

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add New Post</h3>
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

                    <!-- form start -->
                    <form role="form" action="{{route('postStore')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Parent</label>
                                <select class="form-control" required name="category_id">
                                    <option value="">إختيار القسم</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Image</label>
                                <input type="file" class="form-control"  name="image" >
                            </div>
                            @foreach (config('app.languages') as $key => $lang)
                                <h3>{{$lang}}</h3>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Title</label>
                                    <input type="text" name="{{$key}}[title]" class="form-control" value="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Content</label>
                                    <textarea name="{{$key}}[content]"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Excerpt</label>
                                    <textarea name="{{$key}}[excerpt]"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tags</label>
                                    <input type="text" name="{{$key}}[tags]" class="form-control" value="">
                                </div>

                            @endforeach

                            <script>
                                tinymce.init({
                                    selector: 'textarea',
                                    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
                                    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
                                });
                            </script>

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-success btn-flat">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

@endsection
