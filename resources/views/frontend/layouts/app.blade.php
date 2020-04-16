<!DOCTYPE html>
<html lang="en">
@include('frontend.inc.top')

<body>
<div class="site-wrap">
    @include('frontend.inc.header')
@yield('body')

    @include('frontend.inc.footer_about')
</div>
</body>

@include('frontend.inc.footer')

</html>