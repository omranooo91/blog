@extends('frontend.layout')

@section('title')
    {{$settings->title}}
@endsection


@section('body')




    <div class="slide-one-item home-slider owl-carousel">

    @foreach($sliders as $slider)
        <div class="site-cover site-cover-sm same-height overlay" style="background-image: url({{asset($slider->image)}});">
            <div class="container">
                <div class="row same-height align-items-center">
                    <div class="col-md-12 col-lg-6">
                        <div class="post-entry">
                            <span class="post-category text-white bg-success mb-3">{{$slider->category->title}}</span>
                            <h2 class="mb-4"><a href="#">{{$slider->title}}</a></h2>
                            <div class="post-meta align-items-center text-left">
                                <span>&nbsp;{{$slider->created_at}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


    </div>


@foreach($allCategories as $singleCategory)
    @if( count($singleCategory->posts) > 0)
    <div class="site-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 section-heading"><h2>{{$singleCategory->title}}</h2></div>
            </div>
            <div class="row">
                @foreach($singleCategory->posts as $post)
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <div class="entry2">
                        <a href=""><img src="{{asset($post->image)}}" alt="Image" class="img-fluid rounded"></a>
                        <h2><a href="single.html">{{$post->title}}</a></h2>
                        <div class="post-meta align-items-center text-left clearfix">
                            <span>&nbsp;{{$post->created_at}}
                        </div>
                        <p>{!! $post->excerpt !!}</p>
                    </div>
                </div>

                @endforeach

            </div>
        </div>
    </div>
    @endif
@endforeach




@endsection
