@extends('frontend.layout')


@foreach($categoryPage as $row)

@section('title')
    {{$row->title}}
@endsection


 @section('body')

     <div class="site-cover site-cover-sm same-height overlay single-page" style="background-image: url('{{asset($row->image)}}');">
         <div class="container">
             <div class="row same-height justify-content-center">
                 <div class="col-md-12 col-lg-10">
                     <div class="post-entry text-center">
                         <h1 class="mb-4">{{$row->title}}</h1>
                     </div>
                 </div>
             </div>
         </div>
     </div>

     <section class="site-section py-lg">
         <div class="container">

             <div class="row blog-entries element-animate mb-5">

                 <div class="col-md-12 col-lg-12 main-content">
                     @foreach($row->posts as $post)

                     <div class="entry2 mb-5">
                         <a href="{{route('post',$post->id)}}"><img src="{{asset($post->image)}}" alt="Image" class="img-fluid rounded"></a>
                         <h2><a href="{{route('post',$post->id)}}">{{$post->title}}</a></h2>
                         <div class="post-meta align-items-center text-left clearfix">
                             <figure class="author-figure mb-0 mr-3 float-left">
                             <span>&nbsp;{{$post->created_at}}</span>
                         </div>
                         <p>{!! $post->excerpt !!}</p>
                     </div>

                     @endforeach
                 </div>



             </div>
         </div>
     </section>


 @endsection


@endforeach
