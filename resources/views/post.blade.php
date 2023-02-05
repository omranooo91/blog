@extends('frontend.layout')



@foreach($post as $row)

    @section('title')
        {{$row->title}}
    @endsection


    @section('body')
        <div class="site-cover site-cover-sm same-height overlay single-page" style="background-image: url('{{asset($row->image)}}');">
            <div class="container">
                <div class="row same-height justify-content-center">
                    <div class="col-md-12 col-lg-10">
                        <div class="post-entry text-center">
                            <span class="post-category text-white bg-success mb-3">{{$row->category->title}}</span>
                            <h1 class="mb-4"><a href="#">{{$row->title}}</a></h1>
                            <div class="post-meta align-items-center text-center">
                                <span>&nbsp;{{$row->created_at}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="site-section py-lg">
            <div class="container">

                <div class="row blog-entries element-animate">

                    <div class="col-md-12 col-lg-8 main-content">

                        <div class="post-content-body">
                            {!! $row->content !!}
                        </div>


                        <div class="pt-5">
                            <p>Categories:  {{$row->tags}}</p>
                        </div>



                    </div>



                </div>
            </div>
        </section>

    @endsection
@endforeach
