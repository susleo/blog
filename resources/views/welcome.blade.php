@extends('frontend.layouts.app')

@section('body')
    <div class="site-section bg-light">
        <div class="container">
{{--            <div class="row mb-5">--}}
{{--                <div class="col-12">--}}
{{--                    <h2>Random Posts</h2>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="row align-items-stretch retro-layout-2">

                @forelse($RandomPost1 as $post)
                    <div class="col-md-4">
                        <a href="{{route('post.show',$post->id)}}" class="h-entry mb-30 v-height gradient"
                           style="background-image: url({{asset('storage/'.$post->image)}});">
                            <div class="text">
                                <div class="post-categories mb-3">
                                    <span class="post-category bg-danger">{{$post->category->name}}</span>
                                </div>
                                <h2>{{$post->title}}</h2>
                                <span class="date">
                                    @php $date=date_create($post->published_at); @endphp
                                    {{date_format($date,"d/F/Y")}}</span>
                            </div>
                        </a>
                    </div>
                @empty

                    <h3>No Post Found As Per The Search</h3>

                @endforelse

            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12">
                    <h2>Recent Posts</h2>
                </div>
            </div>
            <div class="row">
                @foreach($posts as $post)
                <div class="col-lg-4 mb-4">
                    <div class="entry2">
                        <a href="{{route('post.show',$post->id)}}"><img src="{{asset('storage/'.$post->image)}}" alt="Image" class="img-fluid rounded"></a>
                        <div class="excerpt">
                            <span class="post-category text-white bg-success mb-3">{{$post->category->name}}</span>

                            <h2><a href="{{route('post.show',$post->id)}}">{{$post->title}}</a></h2>
                            <div class="post-meta align-items-center text-left clearfix">
                                <figure class="author-figure mb-0 mr-3 float-left">
                                    <img src="{{asset('assets/images/avatars/avatar4.jpg')}}" alt="Image" class="img-fluid"></figure>
                                <span class="d-inline-block mt-1">
                                    By <a href="#">{{$post->user->name}}</a></span>
                                <span>&nbsp;-&nbsp;    @php $date=date_create($post->published_at); @endphp
                                    {{date_format($date,"d/F/Y")}}</span>
                            </div>

                            <p>{{$post->description}}</p>
                            <p><a href="{{route('post.show',$post->id)}}">Read More</a></p>
                        </div>
                    </div>
                </div>


                @endforeach
            </div>

            <div class="row text-center pt-5 border-top">
                <div class="col-md-12">
                    <div class="custom-pagination">
                        {{$posts->appends(['search'=>request()->query('search')])->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="site-section bg-lightx">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-md-5">
                    <div class="subscribe-1 ">
                        <h2>Subscribe to our newsletter</h2>
                        <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit nesciunt error illum a explicabo, ipsam nostrum.</p>
                        <form action="#" class="d-flex">
                            <input type="text" class="form-control" placeholder="Enter your email address">
                            <input type="submit" class="btn btn-primary" value="Subscribe">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


  @endsection