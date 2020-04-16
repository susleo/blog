<!DOCTYPE html>
<html lang="en">
<head>
    <title>Mini Blog</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700|Playfair+Display:400,700,900" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('fonts/icomoon/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('fonts/flaticon/font/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/aos.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/style_frontend.css')}}">
</head>
<body>

<div class="site-wrap">

    <div class="site-mobile-menu">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>

    <header class="site-navbar" role="banner">
        <div class="container-fluid">
            <div class="row align-items-center">

                <div class="col-12 search-form-wrap js-search-form">
                    <form method="get" action="#">
                        <input type="text" id="s" class="form-control" placeholder="Search...">
                        <button class="search-btn" type="submit"><span class="icon-search"></span></button>
                    </form>
                </div>

                <div class="col-4 site-logo">
                    <a href="{{route('welcome')}}" class="text-black h2 mb-0">Susleo Blog</a>
                </div>

                <div class="col-8 text-right">
                    <nav class="site-navigation" role="navigation">
                        <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block mb-0">
                            <li><a href="{{route('welcome')}}">Home</a></li>
                           @foreach($categories as $cat)
                                <li><a href="">{{ucfirst($cat->name)}}</a></li>
                               @endforeach
                            <li class="d-none d-lg-inline-block"><a href="#" class="js-search-toggle"><span class="icon-search"></span></a></li>
                        </ul>
                    </nav>
                    <a href="#" class="site-menu-toggle js-menu-toggle text-black d-inline-block d-lg-none"><span class="icon-menu h3"></span></a></div>
            </div>

        </div>
    </header>



    <div class="site-section bg-light">
        <div class="container">
{{--            <div class="row mb-5">--}}
{{--                <div class="col-12">--}}
{{--                    <h2>Random Posts</h2>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="row align-items-stretch retro-layout-2">

                @foreach($RandomPost1 as $post)
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
                @endforeach

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
                        <a href="single.html"><img src="{{asset('storage/'.$post->image)}}" alt="Image" class="img-fluid rounded"></a>
                        <div class="excerpt">
                            <span class="post-category text-white bg-success mb-3">{{$post->category->name}}</span>

                            <h2><a href="single.html">{{$post->title}}</a></h2>
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
                        {{$posts->links()}}
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


    <div class="site-footer">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-4">
                    <h3 class="footer-heading mb-4">About Us</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat reprehenderit magnam deleniti quasi saepe, consequatur atque sequi delectus dolore veritatis obcaecati quae, repellat eveniet omnis, voluptatem in. Soluta, eligendi, architecto.</p>
                </div>
                <div class="col-md-3 ml-auto">
                    <!-- <h3 class="footer-heading mb-4">Navigation</h3> -->
                    <ul class="list-unstyled float-left mr-5">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Advertise</a></li>
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">Subscribes</a></li>
                    </ul>
                    <ul class="list-unstyled float-left">
                        <li><a href="#">Travel</a></li>
                        <li><a href="#">Lifestyle</a></li>
                        <li><a href="#">Sports</a></li>
                        <li><a href="#">Nature</a></li>
                    </ul>
                </div>
                <div class="col-md-4">


                    <div>
                        <h3 class="footer-heading mb-4">Connect With Us</h3>
                        <p>
                            <a href="#"><span class="icon-facebook pt-2 pr-2 pb-2 pl-0"></span></a>
                            <a href="#"><span class="icon-twitter p-2"></span></a>
                            <a href="#"><span class="icon-instagram p-2"></span></a>
                            <a href="#"><span class="icon-rss p-2"></span></a>
                            <a href="#"><span class="icon-envelope p-2"></span></a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy; <script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="{{asset('assets/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('assets/js/jquery-migrate-3.0.1.min.js')}}"></script>
<script src="{{asset('assets/js/jquery-ui.js')}}"></script>
<script src="{{asset('assets/js/popper.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.stellar.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.countdown.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('assets/js/aos.js')}}"></script>

<script src="{{asset('assets/js/main.js')}}"></script>


</body>
</html>