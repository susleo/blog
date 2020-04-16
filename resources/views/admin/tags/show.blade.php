@extends('frontend.layouts.app')

@section('body')
        <div class="py-5 bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <span>Tags</span>
                        <h3>{{ucfirst($tag->name)}}</h3>
{{--                        <p> {{ucfirst($category->description)}}</p>--}}
                        <p>Some Text about TAgs will be awesome here!!</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="site-section bg-white">
            <div class="container">
                <div class="row">
                    @forelse($posts as $post)
                    <div class="col-lg-4 mb-4">
                        <div class="entry2">
                            <a href="{{route('post.show',$post->id)}}"><img src="{{asset('storage/'.$post->image)}}" alt="Image" class="img-fluid rounded"></a>
                            <div class="excerpt">
                                <span class="post-category text-white bg-secondary mb-3">{{ucfirst($tag->name)}}</span>

                                <h2><a href="{{route('post.show',$post->id)}}">{{$post->title}}</a></h2>
                                <div class="post-meta align-items-center text-left clearfix">
                                    <figure class="author-figure mb-0 mr-3 float-left">
                                        @if($post->user->image == 'blank')
                                            @if($post->user->role == 'admin')
                                                <img src="{{asset('assets/images/avatars/avatar4.jpg')}}" class="img-fluid">
                                            @else
                                                <img src="{{asset('assets/images/avatars/avatar3.png')}}" class="img-fluid">
                                            @endif
                                        @else
                                            <img src="{{asset('storage/'.$post->user->image)}}" class="img-fluid">
                                        @endif

                                    </figure>
                                    <span class="d-inline-block mt-1">By <a href="#">{{$post->user->name}}</a></span>
                                    <span>&nbsp;-&nbsp;
                                        July 19, 2019</span>
                                </div>

                                <p>{{$post->description}}</p>
                                <p><a href="{{route('post.show',$post->id)}}">Read More</a></p>
                            </div>
                        </div>
                    </div>
                        @empty
                    <h3>This Tags Don't Have Any Post</h3>

                        @endforelse
                </div>
                <div class="row text-center pt-5 border-top">
                    <div class="col-md-12">
                        <div class="custom-pagination">
                           {{$posts->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection

