<!--=====================================-->
<!--=         Footer Area Start         =-->
<!--=====================================-->
<style>
    .customBtn{
        height: 41px;
        color: black;
        background-color: var(--color-btn-bg);
        border-color: var(--color-border-dark-1);
        border-radius: 8px;
    }
    .customBtn:hover{
        height: 41px;
        color: black;
        background-color: var(--color-btn-bg);
        border-color: var(--color-border-dark-1);
        border-radius: 8px;
    }
</style>
<footer class="footer footer1">
    <div class="footer-main">
        <div class="container">
            <div class="row g-3">
                <div class="col-lg-4 col-12">
                    <div class="footer-widget">
                        <div class="footer-about pe-lg-5">
                            <div class="logo-holder">
                                <a href="{{ route('main.index') }}" class="link-wrap img-height-100" aria-label="Site Logo">
                                    <img width="131" height="47" src="{{ setting()->logo }}" alt="logo">
                                </a>
                            </div>
                            <p class="description">{{ setting()->about }}</p>
                            <p class="social-label">Follow Us</p>
                            <div class="axil-social social-layout-1 size-small gap-12">
                                <ul>
                                    <li class="facebook">
                                        <a aria-label="Learn more from Facebook" target="_blank" href="{{ setting()->facebook_link }}">
                                            <i class="solid-facebook2"></i>
                                        </a>
                                    </li>
                                    <li class="instagram">
                                        <a aria-label="Learn more from Instagram" target="_blank" href="{{ setting()->instagram_link }}">
                                            <i class="regular-instagram"></i>
                                        </a>
                                    </li>
                                    <li class="pinterest">
                                        <a aria-label="Learn more from Pinterest" target="_blank" href="{{ setting()->pinter_est_link }}">
                                            <i class="solid-pinterest-01"></i>
                                        </a>
                                    </li>
                                    <li class="mail-fast">
                                        <a aria-label="Learn more from Mail fast" target="_blank" href="{{ setting()->twitter_link }}">
                                            <i class="regular-twitter"></i>
                                        </a>
                                    </li>
                                    <li class="youtube">
                                        <a aria-label="Learn more from Youtube" target="_blank" href="{{ setting()->youtube_link }}">
                                            <i class="solid-youtube"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="footer-widget">
                        <h3 class="widget-title h3-small">Pages</h3>
                        <div class="footer-menu">
                            <ul>
                                <li><a href="{{ route('about') }}">About Us</a></li>
                                <li><a href="{{ route('contact') }}">Contact Us</a></li>
                                <li><a href="{{ route('terms_conditions') }}">Terms & Conditions</a></li>
                                <li><a href="{{ route('privacy_policy') }}">Privacy policy</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="footer-widget">
                        <h3 class="widget-title h3-small">Join Now</h3>
                        @guest
                            <div class="d-lg-block d-none">
                                <a href="{{ route('login') }}" title="Sign in" role="button" class="btn btn-success customBtn">Sign in</a> |
                                <a href="{{ route('register') }}" title="Join Naw" role="button" class="btn btn-success customBtn">Sign Up</a>
                            </div>
                        @else
                            <div class="d-lg-block d-none">
                                <div class="profile-wrap dropdown-item-wrap">
                                    <div class="navbar navbar-expand-md">
                                        <div class="dropdown">
                                            <a class="dropdown-toggle btn btn-success" href="#" id="navbarDropdown2" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" aria-label="Profile">
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
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="footer-copyright">
            <span class="copyright-text">© 2024. All rights reserved by <a href="https://trickssoft.com/" target="_blank">Trick Soft</a>.</span>
        </div>
    </div>
</footer>
