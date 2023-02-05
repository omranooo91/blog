@extends('dashboard.layouts.app')

@section('title')
    {{trans('dashboard.settings')}}
@endsection

@section('content')


    <div class="container-fluid">
        <div class="row">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title" style="float: right">{{trans('dashboard.settings')}}</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="{{Route('settings.update', $settings)}}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <img src="{{asset($settings->logo)}}" class="img img-thumbnail" width="100px">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Logo</label>
                                <input type="file" name="logo" class="form-control" >
                            </div>
                            <div class="form-group">
                                <img src="{{asset($settings->favicon)}}" class="img img-thumbnail" width="100px">

                                <label for="exampleInputEmail1">Favicon</label>
                                <input type="file" name="favicon" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">facebook</label>
                                <input type="text" name="facebook" class="form-control" value="{{$settings->facebook}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Instagram</label>
                                <input type="text" name="instagram" class="form-control" value="{{$settings->instagram}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" name="email" class="form-control" value="{{$settings->email}}">
                            </div>


                            <hr>


                            @foreach($settings->trans as $trans)
                                <h3>{{$trans->locale}}</h3>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Title {{$trans->locale}}</label>
                                    <input type="text" name="{{$trans->locale}}[title]" class="form-control" value="{{$trans->title}}">
                                </div>
                                <div class="form-group">

                                    <label for="exampleInputEmail1">Content {{$trans->locale}}</label>
                                    <textarea name="{{$trans->locale}}[content]" class="form-control">{{$trans->content}}</textarea>
                                </div>

                            @endforeach

                        </div>

                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>


            </div>

        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->

@endsection
