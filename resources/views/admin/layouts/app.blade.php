<!DOCTYPE html>
<html lang="en">
@include('admin.inc.top')
<body>

{{--        <div class="loader">--}}
{{--            <div class="spinner-border text-primary" role="status">--}}
{{--                <span class="sr-only">Loading...</span>--}}
{{--            </div>--}}
{{--        </div>--}}


<div class="alpha-app">
    <div class="page-header">
        <nav class="navbar navbar-expand primary">
            <section class="material-design-hamburger navigation-toggle">
                <a href="javascript:void(0)" data-activates="slide-out" class="button-collapse material-design-hamburger__icon">
                    <span class="material-design-hamburger__layer"></span>
                </a>
            </section>
            <a class="navbar-brand" href="#">Susleo Blog</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <form class="form-inline my-2 my-lg-0 search">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <label for="search" class="active"><i class="material-icons search-icon">search</i></label>
                    <a href="#" id="close-search-input"><i class="material-icons">close</i></a>
                </form>

            </div>
        </nav>
    </div><!-- Page Header -->

@include('admin.inc.sidebar')

    <div class="page-content">
        @if(session()->has('success'))
            <div class="alert alert-primary" role="alert">
                {{session()->get('success')}}
            </div>
            @endif

            @if(session()->has('error'))
            <div class="alert alert-danger" role="alert" style="color: white">
                {{session()->get('error')}}
            </div>
           @endif

        @if($errors->any())
                <div class="alert alert-danger" role="alert">
                   @foreach($errors->all() as $error)
                     {{$error}}
                       @endforeach
                </div>
            @endif
    @yield('content')


</div><!-- App Container -->

@include('admin.inc.footer')


</body>
</html>