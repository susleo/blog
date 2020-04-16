<div class="page-sidebar">
    <div class="page-sidebar-inner">
        <div class="page-sidebar-profile">
            <div class="sidebar-profile-image">
                @if(auth()->user()->isAdmin())
                    <img src="{{asset('assets/images/avatars/avatar4.jpg')}}" class="rounded-circle" >
                @else
                    <img src="{{asset('assets/images/avatars/avatar1.png')}}" class="rounded-circle">
                @endif

            </div>
            <div class="sidebar-profile-info">
                <a href="javascript:void(0);" class="account-settings-link">
                    <p>{{auth()->user()->name}}</p>
                    <span>{{auth()->user()->email}}<i class="material-icons float-right">arrow_drop_down</i></span>
                </a>
            </div>
        </div>
        <div class="page-sidebar-menu">
            <div class="page-sidebar-settings hidden">
                <ul class="sidebar-menu list-unstyled">
                    <li><a href="{{route('user.edit',auth()->user()->id)}}" class="waves-effect waves-grey"><i class="material-icons">edit</i>Edit Profile</a></li>
                    <li class="divider"></li>
                    <li>

                        <a href="{{route('logout')}}" class="waves-effect waves-grey"
                               onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                            <i class="material-icons">logout</i>logout</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
            <div class="sidebar-accordion-menu">
                <ul class="sidebar-menu list-unstyled">
                    <li>
                        <a href="{{route('home')}}" class="waves-effect waves-grey">
                            <i class="material-icons">settings_input_svideo</i>Dashboard
                        </a>
                    </li>

                    @if(auth()->user()->isAdmin())
                    <li>
                        <a href="{{route('user.index')}}" class="waves-effect waves-grey">
                            <i class="material-icons">settings_input_svideo</i>Users
                        </a>
                    </li>
                    @endif

                    <li>
                        <a href="{{route('post.index')}}" class="waves-effect waves-grey">
                            <i class="material-icons">create</i>Post<i class="material-icons sub-arrow">keyboard_arrow_right</i>
                        </a>
                        <ul class="accordion-submenu list-unstyled">
                            <li><a href="{{route('post.index')}}"> All Posts</a></li>
                            <li><a href="{{route('post.create')}}"> Create New Post</a></li>
                            <li><a href="{{route('post.trashed')}}">Trash</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="{{route('categories.index')}}" class="waves-effect waves-grey">
                            <i class="material-icons">grid_on</i>Categories
                        </a>
                        <ul class="accordion-submenu list-unstyled">
                            <li><a href="{{route('categories.index')}}"> All Categories</a></li>
                            <li><a href="{{route('categories.trashed')}}">Trash</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="{{route('tags.index')}}" class="waves-effect waves-grey">
                            <i class="material-icons">tags</i>Tags
                        </a>
                    </li>
                    <li>
                        <a href="charts.html" class="waves-effect waves-grey">
                            <i class="material-icons">trending_up</i>Charts
                        </a>
                    </li>
                    <li>
                        <a href="#" class="waves-effect waves-grey">
                            <i class="material-icons">tag_faces</i>Extra Pages<i class="material-icons sub-arrow">keyboard_arrow_right</i>
                        </a>
                        <ul class="accordion-submenu list-unstyled">
                            <li><a href="pages-404.html">404</a></li>
                            <li><a href="pages-500.html">500</a></li>
                            <li><a href="pages-sign-in.html">Sign In</a></li>
                            <li><a href="pages-sign-up.html">Sign Up</a></li>
                            <li><a href="pages-lock-screen.html">Lock Screen</a></li>
                            <li><a href="pages-coming-soon.html">Coming Soon</a></li>
                            <li><a href="pages-invoice.html">Invoice</a></li>
                            <li><a href="pages-pricing-tables.html">Pricing Tables</a></li>
                            <li><a href="pages-help-center.html">Help Center</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="sidebar-footer">
            <p class="copyright">Stacks ©</p>
            <a href="#!">Privacy</a> &amp; <a href="#!">Terms</a>
        </div>
    </div>
</div><!-- Left Sidebar -->