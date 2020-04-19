<!DOCTYPE html>
<html lang="en">
@include('frontend.inc.top')

<body>
<div class="site-wrap">
    @if(session()->has('success'))
        <h3>
        <div class="badge badge-primary " role="alert">
            {{session()->get('success')}}
        </div>
        </h3>
    @endif

            @if($errors->any())
                    <div class="alert alert-danger" role="alert">
                            @foreach($errors->all() as $error)
                                    {{$error}}
                            @endforeach
                    </div>
            @endif
    @include('frontend.inc.header')
@yield('body')

    @include('frontend.inc.footer_about')
</div>
</body>

@include('frontend.inc.footer')

</html>