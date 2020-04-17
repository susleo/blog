@extends('frontend.layouts.app')

@section('body')
       <div class="site-cover site-cover-sm same-height overlay single-page" style="background-image:url({{asset('storage/'.$post->image)}});">
        <div class="container">
            <div class="row same-height justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="post-entry text-center">
                        <span class="post-category text-white bg-success mb-3">{{$post->category->name}}</span>
                        <h1 class="mb-4"><a href="#">{{$post->title}}</a></h1>
                        <div class="post-meta align-items-center text-center">
                            <figure class="author-figure mb-0 mr-3 d-inline-block">
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
                            <span class="d-inline-block mt-1">By {{$post->user->name}}</span>
                            <span>&nbsp;-&nbsp;   @php $date=date_create($post->published_at); @endphp
                                {{date_format($date,"d/F/Y")}}</span>
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
                        {!! $post->contents !!}
                      </div>


                    <div class="pt-5">
                        <p>Categories:   <a href="{{route('category',$post->category->id)}}">{{$post->category->name}}</a></p>
                    </div>


                    <div class="pt-5">
                        <h3 class="mb-5"> Comments</h3>
                        <div id="disqus_thread"></div>
                        <script>

                            /**
                             *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                             *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/

                            var disqus_config = function () {
                            this.page.url = "{{config('app.url')}}/post/{{$post->id}}";  // Replace PAGE_URL with your page's canonical URL variable
                            this.page.identifier ="{{$post->id}}"; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                            };

                            (function() { // DON'T EDIT BELOW THIS LINE
                                var d = document, s = d.createElement('script');
                                s.src = 'https://susleo-blog.disqus.com/embed.js';
                                s.setAttribute('data-timestamp', +new Date());
                                (d.head || d.body).appendChild(s);
                            })();
                        </script>
                        <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

                        <!-- END comment-list -->

                    </div>

                </div>

                <!-- END main-content -->

                <div class="col-md-12 col-lg-4 sidebar">
                    <div class="sidebar-box search-form-wrap">
                        <form action="#" class="search-form">
                            <div class="form-group">
                                <span class="icon fa fa-search"></span>
                                <input type="text" class="form-control" id="s" placeholder="Type a keyword and hit enter">
                            </div>
                        </form>
                    </div>
                    <!-- END sidebar-box -->
                    <div class="sidebar-box">
                        <div class="bio text-center">
                            @if($post->user->image == 'blank')
                                @if($post->user->role == 'admin')
                                    <img src="{{asset('assets/images/avatars/avatar4.jpg')}}" class="rounded-circle img-fluid mb-5">
                                @else
                                    <img src="{{asset('assets/images/avatars/avatar3.png')}}" class="rounded-circle img-fluid mb-5">
                                @endif
                            @else
                                <img src="{{asset('storage/'.$post->user->image)}}" class="rounded-circle img-fluid mb-5">
                            @endif
                            <div class="bio-body">
                                <h2>{{$post->user->name}}</h2>
                                <p class="mb-4">{{$post->user->about}}</p>
                                <p><a href="#" class="btn btn-primary btn-sm rounded px-4 py-2">Read my bio</a></p>
                            </div>
                        </div>
                    </div>
                    <!-- END sidebar-box -->
                    <div class="sidebar-box">
                        <h3 class="heading">Popular Posts</h3>
                        <div class="post-entry-sidebar">
                            <ul>
                                @foreach($popular_post as $pop)
                                <li>
                                    <a href="{{route('post.show',$pop->id)}}">
                                        <img src="{{asset('storage/'.$pop->image)}}" alt="Image placeholder" class="mr-4">
                                        <div class="text">
                                            <h4>{{$pop->title}}</h4>
                                            <div class="post-meta">
                                                <span class="mr-2">
                                                @php $date=date_create($post->published_at); @endphp
                                                    {{date_format($date,"d/F/Y")}}
                                                </span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- END sidebar-box -->

                    <div class="sidebar-box">
                        <h3 class="heading">Categories</h3>
                        <ul class="categories">
                            @foreach($categories as $cat)
                            <li>
                               <a href="{{route('category',$cat->id)}}">{{$cat->name}}
                                    <span>({{$cat->posts->count()}})</span>
                                </a>
                            </li>
                                @endforeach
                        </ul>
                    </div>
                    <!-- END sidebar-box -->

                    <div class="sidebar-box">
                        <h3 class="heading">Tags</h3>
                        <ul class="tags">
                            @foreach($tags as $tag)
                                <li>
                                    <a href="{{route('tag',$tag->id)}}"> {{$tag->name}}
                                    </a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- END sidebar -->

            </div>
        </div>
    </section>

    <div class="site-section bg-light">
        <div class="container">

            <div class="row mb-5">
                <div class="col-12">
                    <h2>More Related Posts</h2>
                </div>
            </div>

            <div class="row align-items-stretch retro-layout">

                <div class="col-md-5 order-md-2">
                    @foreach($relatedWithCat as $post)
                    <a href="{{route('post.show',$post->id)}}" class="hentry img-1 h-100 gradient"
                       style="background-image: url({{asset('storage/'.$post->image)}});">
                        <span class="post-category text-white bg-danger">{{$post->category->name}}</span>
                        <div class="text">
                            <h2>{{$post->title}}</h2>
                            <span>
                            @php $date = date_create($post->published_at); @endphp
                                    {{date_format($date,"d/F/Y")}}
                            </span>
                            </span>
                        </div>
                    </a>
                        @endforeach
                </div>

                <div class="col-md-7">
                    @foreach($relatedWithTag as $post)
                        <a href="{{route('post.show',$post->id)}}" class="hentry img-2 v-height mb30 gradient"
                       style="background-image:url({{asset('storage/'.$post->image)}});">
                        <span class="post-category text-white bg-success">{{$post->category->name}}</span>
                        <div class="text text-sm">
                            <h2>{{$post->title}}</h2>
                            <span>@php $date = date_create($post->published_at); @endphp
                                {{date_format($date,"d/F/Y")}}
                            </span>
                        </div>
                    </a>
                    @endforeach
{{--                    <div class="two-col d-block d-md-flex">--}}
{{--                        <a href="single.html" class="hentry v-height img-2 gradient" style="background-image: url('images/img_2.jpg');">--}}
{{--                            <span class="post-category text-white bg-primary">Sports</span>--}}
{{--                            <div class="text text-sm">--}}
{{--                                <h2>The 20 Biggest Fintech Companies In America 2019</h2>--}}
{{--                                <span>February 12, 2019</span>--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                        <a href="single.html" class="hentry v-height img-2 ml-auto gradient" style="background-image: url('images/img_3.jpg');">--}}
{{--                            <span class="post-category text-white bg-warning">Lifestyle</span>--}}
{{--                            <div class="text text-sm">--}}
{{--                                <h2>The 20 Biggest Fintech Companies In America 2019</h2>--}}
{{--                                <span>February 12, 2019</span>--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                    </div>--}}

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