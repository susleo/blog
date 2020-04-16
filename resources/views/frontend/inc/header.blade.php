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
                            <li>
                                <a href="{{route('category',$cat->id)}}">{{ucfirst($cat->name)}}</a>
                            </li>
                        @endforeach
                        <li class="d-none d-lg-inline-block">
                            <form action="{{route('welcome')}}" method="get">
                                <input type="text" class="form-control" name="search" placeholder="Search this website" value="{{request()->query('search')}}">
                            </form>
                        </li>
                    </ul>
                </nav>
                <a href="#" class="site-menu-toggle js-menu-toggle text-black d-inline-block d-lg-none"><span class="icon-menu h3"></span></a></div>
        </div>

    </div>
</header>
