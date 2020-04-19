<div class="site-footer">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-4">
                @foreach($about_intro as $about)
                <h3 class="footer-heading mb-4">{{$about->title}}</h3>
               <p>{{$about->short_intro}}</p>
                @endforeach
            </div>
            <div class="col-md-3 ml-auto">
                <!-- <h3 class="footer-heading mb-4">Navigation</h3> -->
                <ul class="list-unstyled float-left mr-5">
                    <li><a href="{{route('about.us')}}">About Us</a></li>
                    <li><a href="#">Advertise</a></li>
                    <li><a href="#">Careers</a></li>
                    <li><a href="{{route('contact.create')}}">Contact</a></li>
                </ul>

                <ul class="list-unstyled float-left">
                    @foreach($categories as $cat)
                    <li><a href="{{route('category',$cat->id)}}">{{$cat->name}}</a></li>
                      @endforeach
                </ul>
            </div>
            <div class="col-md-4">


                <div>
                    <h3 class="footer-heading mb-4">Connect With Us</h3>
                    <p>
                        @foreach($socail as $s)
                        <a href="https://www.facebook.com/{{$s->facebook}}"><span class="icon-facebook pt-2 pr-2 pb-2 pl-0"></span></a>
                        <a href="{{'https://www.instagram.com/@'.$s->instagram}}"><span class="icon-instagram p-2"></span></a>
                            @endforeach
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