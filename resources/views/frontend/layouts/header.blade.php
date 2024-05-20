<!--=====================================-->
<!--=        Header Area Start       	=-->
<!--=====================================-->
<header class="header header1 sticky-on">
    <div id="topbar-wrap">
        <div class="topbar-global color-dark-1-fixed">
            <div class="container">
                <div class="d-flex align-items-center justify-content-between gap-1">
                    <div class="news-feed-wrap">
                        <div class="news-feed-label">BREAKING:</div>
                        <div id="news-feed-slider" class="news-feed-slider initially-none">
                            @foreach ($breaking_posts as $breaking_post)
                                <div class="single-slide">
                                    <a href="{{route('post.details',[$breaking_post->id,$breaking_post->slug])}}" class="link-wrap">{{$breaking_post->title}}</a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-4">
                        <div class="current-date d-lg-block d-none">{{date('M d,Y')}}</div>
                        <div class="d-flex align-items-center gap-2">
                            <div class="d-lg-block d-none">
                                <div class="my_switcher">
                                    <ul>
                                        <li title="Light Mode">
                                            <button type="button" aria-label="Light" class="setColor light" data-theme="light">
                                                <i class="solid-light-mode"></i>
                                            </button>
                                        </li>
                                        <li title="Dark Mode">
                                            <button type="button" aria-label="Dark" class="setColor dark" data-theme="dark">
                                                <i class="solid-half-moon"></i>
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @guest
                            <div class="current-date d-lg-block d-none" style="white-space: nowrap;">
                                <a href="{{ route('login') }}" style="color: white;">Sign In</a>
                            </div>
                            <div class="current-date d-lg-block d-none" style="white-space: nowrap;">
                                <a href="{{ route('register') }}" style="color: white;">Sign Up</a>
                            </div>
                        @else
                            <div class="current-date d-lg-block d-none" style="white-space: nowrap;">
                                <a href="{{ route('user.profile') }}" style="color: white;">Profile</a>
                            </div>
                            <div class="current-date d-lg-block d-none" style="white-space: nowrap;">
                                <a href="{{ route('post.list') }}" style="color: white;">Posts</a>
                            </div>
                            <div class="current-date d-lg-block d-none" style="white-space: nowrap;">
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="color: white;">Sign Out</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="sticky-placeholder"></div>
    <div id="navbar-wrap" class="navbar-wrap">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-md-block d-none">
                    <a href="{{ route('main.index') }}" class="link-wrap desktop-logo img-height-100" aria-label="Site Logo">
                        <img width="131" height="47" src="{{ setting()->logo }}" alt="logo">
                    </a>
                </div>
                <div class="d-md-none d-block">
                    <a href="{{ route('main.index') }}" class="link-wrap mobile-logo img-height-100" aria-label="Site Logo">
                        <img width="86" height="31" src="{{ setting()->logo }}" alt="logo">
                    </a>
                </div>
                <!-- Start Mainmenu Nav -->
                <div id="mobilemenu-popup" class="mobile-menu-wrap">
                    <div class="mobile-logo-wrap d-lg-none d-block">
                        <div class="logo-holder">
                            <a href="{{ route('main.index') }}" class="link-wrap single-logo light-mode img-height-100" aria-label="Site Logo">
                                <img width="131" height="47" src="{{ setting()->logo }}" alt="logo">
                            </a>
                            <a href="{{ route('main.index') }}" class="link-wrap single-logo dark-mode img-height-100" aria-label="Site Logo">
                                <img width="131" height="47" src="{{ setting()->logo }}" alt="logo" aria-label="Site Logo">
                            </a>
                        </div>
                        <button aria-label="Offcanvas" type="button" class="mobile-close" data-bs-dismiss="offcanvas">
                            <i class="regular-multiply-circle"></i>
                        </button>
                    </div>
                    <nav id="dropdown" class="template-main-menu">
                        <ul class="menu">
                            @php
                                $categories = \App\Models\Category::where('parent_id',0)->limit(9)->get();
                            @endphp
                            @foreach ($categories as $category)
                            @php
                                $subcategories = \App\Models\Category::where('parent_id',$category->id)->get()
                            @endphp
                            <li class="menu-item @if($subcategories->count() > 0) menu-item-has-children @endif">
                                @if ($subcategories->count() > 0)
                                    <a href="#">{{ $category->name }}</a>
                                @else
                                    <a href="{{ route('category.posts',$category->slug) }}">{{ $category->name }}</a>
                                @endif
                                <ul class="sub-menu">
                                    @foreach ($subcategories as $subcategory)
                                        <li class="menu-item">
                                            <a href="{{ route('category.posts',$category->slug) }}">{{ $subcategory->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            @endforeach
                            @guest
                                <li class="menu-item d-lg-none d-block">
                                    <a href="{{ route('login') }}">Sign In</a>
                                </li>
                                <li class="menu-item d-lg-none d-block">
                                    <a href="{{ route('register') }}">Sign Up</a>
                                </li>
                            @else
                                <li class="menu-item d-lg-none d-block">
                                    <a href="{{ route('user.profile') }}">Profile</a>
                                </li>
                                <li class="menu-item d-lg-none d-block">
                                    <a href="{{ route('post.list') }}">Posts</a>
                                </li>
                                <li class="menu-item d-lg-none d-block">
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form-mobile').submit();" style="color: white;">Sign Out</a>
                                    <form id="logout-form-mobile" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            @endguest
                        </ul>
                    </nav>
                </div>
                <!-- End Mainmanu Nav -->
                <div class="d-flex align-items-center gap-3">
                    {{-- <div class="d-lg-block d-none">
                        <div class="search-trigger-wrap">
                            <a href="#search-trigger" title="search">
                                <i class="regular-search-02"></i>
                            </a>
                        </div>
                    </div> --}}
                    {{-- @guest
                        <div class="d-lg-block d-none">
                            <a href="{{ route('login') }}" title="Sign in" role="button" class="btn btn-success customBtn">Sign in</a> |
                            <a href="{{ route('register') }}" title="Join Naw" role="button" class="btn btn-success customBtn">Sign Up</a>
                        </div>
                    @else
                        <div class="d-lg-block d-none">
                            <div class="profile-wrap dropdown-item-wrap">
                                <div class="navbar navbar-expand-md">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle text-black" href="#" id="navbarDropdown2" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" aria-label="Profile">
                                            <span class="thumble-holder img-height-100"><img width="40" height="40" src="{{ $profile->image?? asset('default/user.webp') }}" alt="Profile"></span> {{auth()->user()->name}}
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end animate slideIn" aria-labelledby="navbarDropdown2">
                                            <div class="dropdown-menu-inner">
                                                <div class="profile-content with-icon">
                                                    <ul>
                                                        <li>
                                                            <a href="{{ route('user.profile') }}">
                                                                <div class="icon-holder"><i class="regular-user"></i></div>Profile
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('post.list') }}">
                                                                <div class="icon-holder"><i class="regular-activity"></i></div>Posts
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="mt-3">
                                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="w-100 axil-btn axil-btn-ghost btn-color-alter axil-btn-small">Sign Out</a>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                        @csrf
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endguest --}}
                    <div class="d-lg-none d-block">
                        <div class="my_switcher">
                            <ul>
                                <li title="Light Mode">
                                    <button type="button" aria-label="Light" class="setColor light" data-theme="light">
                                        <i class="solid-light-mode"></i>
                                    </button>
                                </li>
                                <li title="Dark Mode">
                                    <button type="button" aria-label="Dark" class="setColor dark" data-theme="dark">
                                        <i class="solid-half-moon"></i>
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="mobile-menu-btn d-lg-none d-block">
                        <button aria-label="Offcanvas" class="btn-wrap" data-bs-toggle="offcanvas" data-bs-target="#mobilemenu-popup">
                            <span></span>
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
