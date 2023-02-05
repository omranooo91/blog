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
                        <h3 class="card-title">Edit Post Information</h3>
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

                    @foreach($posts as $post)
                    <!-- form start -->
                    <form role="form" action="{{route('updatePost',$post->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Parent</label>
                                <select class="form-control" required name="category_id">
                                    @foreach($categories as $category)
                                        <option @if($category->id == $post->category_id) selected @endif value="{{$category->id}}">{{$category->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Image</label>
                                <img src="{{asset($post->image)}}" class="img img-thumbnail" width="100px">
                                <input type="file" class="form-control"  name="image" >
                            </div>
                            @foreach (config('app.languages') as $key => $lang)
                                <h3>{{$lang}}</h3>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Title</label>
                                    <input type="text" name="{{$key}}[title]" class="form-control" value="{{$post->translate($key)->title}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Content</label>
                                    <textarea name="{{$key}}[content]">{{$post->translate($key)->content}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Excerpt</label>
                                    <textarea name="{{$key}}[excerpt]">{{$post->translate($key)->excerpt}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tags</label>
                                    <input type="text" name="{{$key}}[tags]" class="form-control" value="{{$post->translate($key)->tags}}">
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
                    @endforeach
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

@endsection
