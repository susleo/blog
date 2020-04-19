@extends('frontend.layouts.app')
@section('css')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endsection
@section('body')
    @foreach($about_intro as $a)
    <div class="site-cover site-cover-sm same-height overlay single-page"
         style="background-image: url({{asset('storage/'.$a->image)}});">
        <div class="container">
            <div class="row same-height justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="post-entry text-center">

                        <h1 class="">{{ucfirst($a->title)}}</h1>
                            <p class="lead mb-4 text-white">
                                {{ucfirst($a->short_intro)}}
                            </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <div class="site-section bg-light">
        <div class="container">
            @foreach($abouts1 as $about)
            <div class="row">

                <div class="col-md-6 order-md-2">
                    <img src="{{asset('storage/'.$about->image)}}" alt="Image" class="img-fluid">
                </div>
                <div class="col-md-5 mr-auto order-md-1">
                    <h2>{{ucfirst($about->title)}}</h2>
                    <p>{!! ucfirst($about->description) !!}</p>
                </div>

            </div>
            @endforeach
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row mb-5 justify-content-center">
                <div class="col-md-5 text-center">
                    @foreach($team_intro as $a)
                    <h1 class="">{{ucfirst($a->title)}}</h1>
                    <p class="lead mb-4 text-white">
                        {{ucfirst($a->short_intro)}}
                    </p>
                        @endforeach

                </div>
            </div>
            <div class="row">
                @foreach($teams as $team)
                <div class="col-md-6 col-lg-4 mb-5 text-center">
                    <img src="{{asset('storage/').$team->image}}" alt="Image" class="img-fluid w-50 rounded-circle mb-4">
                    <h2 class="mb-3 h5">{{ucfirst($team->name)}}</h2>
                    <p>{{$team->short_intro}}</p>
                    <p class="mt-5">
                        <a href="{{'https://www.facebook.com/'.$team->facebook}}" class="p-3"><span class="icon-facebook"></span></a>
                        <a href="{{'https://www.instagram.com@'.$team->instagram}}" class="p-3"><span class="icon-instagram"></span></a>
                        <a href="{{'https://www.twitter.com@'.$team->instagram}}" class="p-3"><span class="icon-twitter"></span></a>
                    </p>
                </div>
                    @endforeach
            </div>
        </div>
    </div>

    <div class="site-section bg-light">
        <div class="container">
            @foreach($abouts2 as $about)
            <div class="row">
                <div class="col-md-6">
                    <img src="{{asset('storage/'.$about->image)}}" alt="Image" class="img-fluid">
                </div>
                <div class="col-md-5 ml-auto">
                    <h2>{{ucfirst($about->title)}}</h2>
                    <p>{!! ucfirst($about->description) !!}</p>
                </div>
            </div>
                @endforeach
        </div>
    </div>
@endsection

@section('script')

    @endsection