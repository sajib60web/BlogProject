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
                            <div class="single-slide">
                                <a href="post-format-default.html" class="link-wrap">Underwater Exercise Is Used Weak Of Muscles Thats Good</a>
                            </div>
                            <div class="single-slide">
                                <a href="post-format-default.html" class="link-wrap">Tesla’s Cooking Up A New Way To Wire</a>
                            </div>
                            <div class="single-slide">
                                <a href="post-format-default.html" class="link-wrap">50 Years After The Moon Landing: How Close</a>
                            </div>
                            <div class="single-slide">
                                <a href="post-format-default.html" class="link-wrap">Millions Of Manuscripts Are Written</a>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-4">
                        <div class="current-date d-lg-block d-none">July 5, 2023</div>
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
                            <div class="d-lg-block d-none">
                                <div class="notification-wrap dropdown-item-wrap">
                                    <div class="navbar navbar-expand-md">
                                        <div class="dropdown">
                                            <a class="dropdown-toggle has-notification" href="#" id="navbarDropdown1" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" aria-label="Notification">
                                                <span class="icon-holder"><i class="regular-notification-011"></i></span>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end animate slideIn" aria-labelledby="navbarDropdown1">
                                                <div class="dropdown-menu-inner">
                                                    <label class="article-number">Recent Articles (10)</label>
                                                    <div class="item-wrap">
                                                        <a href="post-format-default.html" class="notification-item">
                                                            <div class="post-box">
                                                                <div class="figure-holder radius-default img-height-100">
                                                                    <img width="540" height="600" src="{{ asset('assets/frontend') }}/media/blog/post93.webp" alt="Post">
                                                                </div>
                                                                <div class="content-holder">
                                                                    <h3 class="entry-title color-dark-1 h3-extra-small">Could The Complement Our Digit.</h3>
                                                                    <ul class="entry-meta color-dark-1">
                                                                        <li>
                                                                            <i class="regular-clock-circle"></i>3 min read
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <a href="post-format-default.html" class="notification-item">
                                                            <div class="post-box">
                                                                <div class="figure-holder radius-default img-height-100">
                                                                    <img width="540" height="600" src="{{ asset('assets/frontend') }}/media/blog/post94.webp" alt="Post">
                                                                </div>
                                                                <div class="content-holder">
                                                                    <h3 class="entry-title color-dark-1 h3-extra-small">On August 15th, an alarming email popped.</h3>
                                                                    <ul class="entry-meta color-dark-1">
                                                                        <li>
                                                                            <i class="regular-clock-circle"></i>8 min read
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <a href="post-format-default.html" class="notification-item">
                                                            <div class="post-box">
                                                                <div class="figure-holder radius-default img-height-100">
                                                                    <img width="540" height="600" src="{{ asset('assets/frontend') }}/media/blog/post95.webp" alt="Post">
                                                                </div>
                                                                <div class="content-holder">
                                                                    <h3 class="entry-title color-dark-1 h3-extra-small">Nam eget lorem mattis, consequat felis quis, luctus augue.</h3>
                                                                    <ul class="entry-meta color-dark-1">
                                                                        <li>
                                                                            <i class="regular-clock-circle"></i>3 min read
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="notification-btn-wrap">
                                                        <a href="archive.html" class="w-100 axil-btn axil-btn-ghost btn-color-alter axil-btn-small">View All
                                                            <div class="icon-holder"><i class="regular-arrow-right"></i></div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                    <a href="{{ route('main.index') }}" class="link-wrap desktop-logo img-height-100" aria-label="Site Logo"><img width="131" height="47" src="{{ setting()->logo }}" alt="logo"></a>
                </div>
                <div class="d-md-none d-block">
                    <a href="{{ route('main.index') }}" class="link-wrap mobile-logo img-height-100" aria-label="Site Logo"><img width="86" height="31" src="{{ setting()->logo }}" alt="logo"></a>
                </div>
                <!-- Start Mainmenu Nav -->
                <div id="mobilemenu-popup" class="mobile-menu-wrap">
                    <div class="mobile-logo-wrap d-lg-none d-block">
                        <div class="logo-holder">
                            <a href="{{ route('main.index') }}" class="link-wrap single-logo light-mode img-height-100" aria-label="Site Logo"><img width="131" height="47" src="{{ setting()->logo }}" alt="logo"></a>
                            <a href="{{ route('main.index') }}" class="link-wrap single-logo dark-mode img-height-100" aria-label="Site Logo"><img width="131" height="47" src="{{ setting()->logo }}" alt="logo" aria-label="Site Logo"></a>
                        </div>
                        <button aria-label="Offcanvas" type="button" class="mobile-close" data-bs-dismiss="offcanvas"><i class="regular-multiply-circle"></i></button>
                    </div>
                    <nav id="dropdown" class="template-main-menu">
                        <ul class="menu">
                            <li class="menu-item">
                                <a href="{{ route('main.index') }}">Home</a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('about') }}">About</a>
                            </li>
                            <li class="menu-item menu-item-has-children">
                                <a href="#">Pages</a>
                                <ul class="sub-menu">
                                    <li class="menu-item menu-item-has-children second-lavel">
                                        <a href="#">Archive Pages</a>
                                        <ul class="sub-menu">
                                            <li class="menu-item"><a href="archive-layout1.html">Archive Layout 1</a></li>
                                            <li class="menu-item"><a href="archive-layout2.html">Archive Layout 2</a></li>
                                            <li class="menu-item"><a href="archive-layout3.html">Archive Layout 3</a></li>
                                            <li class="menu-item"><a href="archive-layout4.html">Archive Layout 4</a></li>
                                            <li class="menu-item"><a href="archive-layout5.html">Archive Layout 5</a></li>
                                            <li class="menu-item"><a href="archive-layout6.html">Archive Layout 6</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item menu-item-has-children second-lavel">
                                        <a href="#">Other Pages</a>
                                        <ul class="sub-menu">
                                            <li class="menu-item"><a href="author.html">Author</a></li>
                                            <li class="menu-item"><a href="404.html">404</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('contact') }}">Contact</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <!-- End Mainmanu Nav -->
                <div class="d-flex align-items-center gap-3">
                    <div class="d-lg-block d-none">
                        <div class="search-trigger-wrap">
                            <a href="#search-trigger" title="search">
                                <i class="regular-search-02"></i>
                            </a>
                        </div>
                    </div>
                    @guest
                        <div class="d-lg-block d-none">
                            <a href="{{ route('login') }}" title="Sign in" role="button" class="btn btn-success">Sign in</a> | 
                            <a href="{{ route('register') }}" title="Sign Up" role="button" class="btn btn-success">Sign Up</a>
                        </div>
                    @else
                        <div class="d-lg-block d-none">
                            <div class="profile-wrap dropdown-item-wrap">
                                <div class="navbar navbar-expand-md">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" aria-label="Profile">
                                            <span class="thumble-holder img-height-100"><img width="40" height="40" src="{{ asset('assets/frontend') }}/media/blog/profile4.webp" alt="Profile"></span>
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
                                                            <a href="author.html">
                                                                <div class="icon-holder"><i class="regular-activity"></i></div>Post
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="mt-3">
                                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();" class="w-100 axil-btn axil-btn-ghost btn-color-alter axil-btn-small">Sign Out</a>
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
                    @endguest
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