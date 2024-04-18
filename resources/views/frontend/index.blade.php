@extends('frontend.layouts.app')

@section('title', $page_name)

@section('mainContent')
<!--=====================================-->
<!--=        Category Area Start        =-->
<!--=====================================-->
<section class="category-wrap-layout-1 space-top-30 bg-color-light-1 transition-default">
    <div class="container">
        <div class="box-border-dark-1 bg-color-scandal padding-29 px-xs-0 radius-default transition-default">
            <div class="row g-3">
                <div class="col-lg-3 col-xxl-2">
                    <div class="heading-nav-wrap">
                        <div class="section-heading heading-style-8 color-dark-1-fixed">
                            <h2 class="title h2-small">Trending Topic</h2>
                        </div>
                        <ul class="slider-navigation-layout1 color-light-1-fixed nav-size-medium">
                            <li id="category-prev" class="prev"><i class="regular-arrow-left"></i></li>
                            <li id="category-next" class="next"><i class="regular-arrow-right"></i></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9 col-xxl-10">
                    <div id="category-slider-1" class="category-slider-1 initially-none">
                        <div class="single-slide">
                            <div class="category-box-layout1">
                                <div class="figure-holder">
                                    <a href="archive-layout1.html" class="link-wrap img-height-100"><img width="150" height="150" src="{{ asset('assets/frontend') }}/media/category/ctg1.webp" alt="Category"></a>
                                </div>
                                <div class="content-holder">
                                    <div class="entry-category style-1 color-dark-1-fixed">
                                        <ul>
                                            <li>
                                                <a href="archive-layout1.html">TECH</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <h3 class="entry-title h3-extra-small color-dark-1-fixed underline-animation"><a href="archive-layout1.html" class="link-wrap">Smarter Food 101 Tips For Health</a></h3>
                                </div>
                            </div>
                        </div>
                        <div class="single-slide">
                            <div class="category-box-layout1">
                                <div class="figure-holder">
                                    <a href="archive-layout1.html" class="link-wrap img-height-100"><img width="150" height="150" src="{{ asset('assets/frontend') }}/media/category/ctg2.webp" alt="Category"></a>
                                </div>
                                <div class="content-holder">
                                    <div class="entry-category style-1 color-dark-1-fixed">
                                        <ul>
                                            <li>
                                                <a href="archive-layout1.html">FASHION</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <h3 class="entry-title h3-extra-small color-dark-1-fixed underline-animation"><a href="archive-layout1.html" class="link-wrap">Air Pods Pro With Wireless</a></h3>
                                </div>
                            </div>
                        </div>
                        <div class="single-slide">
                            <div class="category-box-layout1">
                                <div class="figure-holder">
                                    <a href="archive-layout1.html" class="link-wrap img-height-100"><img width="150" height="150" src="{{ asset('assets/frontend') }}/media/category/ctg3.webp" alt="Category"></a>
                                </div>
                                <div class="content-holder">
                                    <div class="entry-category style-1 color-dark-1-fixed">
                                        <ul>
                                            <li>
                                                <a href="archive-layout1.html">FOOD</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <h3 class="entry-title h3-extra-small color-dark-1-fixed underline-animation"><a href="archive-layout1.html" class="link-wrap">Millions Of Books Are Written</a></h3>
                                </div>
                            </div>
                        </div>
                        <div class="single-slide">
                            <div class="category-box-layout1">
                                <div class="figure-holder">
                                    <a href="archive-layout1.html" class="link-wrap img-height-100"><img width="150" height="150" src="{{ asset('assets/frontend') }}/media/category/ctg11.webp" alt="Category"></a>
                                </div>
                                <div class="content-holder">
                                    <div class="entry-category style-1 color-dark-1-fixed">
                                        <ul>
                                            <li>
                                                <a href="archive-layout1.html">TRAVEL</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <h3 class="entry-title h3-extra-small color-dark-1-fixed underline-animation"><a href="archive-layout1.html" class="link-wrap">The Science Behind Skin Care Products</a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--=====================================-->
<!--=         Banner Area Start         =-->
<!--=====================================-->
<section class="post-wrap-layout1 space-top-30 bg-color-light-1 transition-default">
    <div class="container">
        <div class="row g-3">
            <div class="col-lg-7">
                <div class="post-box-layout1 box-border-dark-1 radius-default transition-default overflow-hidden">
                    <div id="videoPlayer-1" class="image-mask videoPlayer-1 radius-medium" style="background-image: url('{{ asset('assets/frontend') }}/media/blog/post1.webp');"></div>
                    <div id="videoElement1" class="player" data-property="{
                videoURL:'CHSnz0bCaUk',
                containment:'#videoPlayer-1', 
                showControls:true,
                autoPlay:true, 
                loop:false, 
                mute:true, 
                startAt:0, 
                opacity:1, 
                addRaster:true, 
                quality:'default', 
                opacity:1, 
                showControls:false, 
                optimizeDisplay:true,
                anchor:'bottom, center'
            }">
                    </div>
                    <div class="content-holder">
                        <h3 class="entry-title h3-large color-light-1-fixed underline-animation mb-0"><a href="post-format-default.html">The Science Behind Skin-care Products Come A Long Way But There’s Still No</a></h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="position-relative">
                    <div id="post-slider-1" class="post-slider-1 gutter-6 initially-none">
                        <div class="single-slide">
                            <div class="post-box-layout2 box-border-dark-1 radius-default padding-30 bg-color-old-lace box-shadow-large shadow-style-1 transition-default">
                                <div class="figure-holder radius-default">
                                    <a href="post-format-default.html" class="link-wrap img-height-100"><img width="635" height="365" src="{{ asset('assets/frontend') }}/media/blog/post2.webp" alt="Post"></a>
                                </div>
                                <div class="content-holder">
                                    <div class="entry-category style-1 color-dark-1-fixed">
                                        <ul>
                                            <li>
                                                <a href="archive-layout1.html">TRAVEL</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <h3 class="entry-title color-dark-1-fixed underline-animation"><a href="post-format-default.html" class="link-wrap">Underwater Exercise Is Used Weak Of Muscles Thats Good</a></h3>
                                    <p class="entry-description color-dark-1-fixed">In 2028 schools will indeed sport fabulous gadgets, devices, and interfaces of learning. We are provide oue every day life style easily.</p>
                                    <ul class="entry-meta color-dark-1-fixed">
                                        <li class="post-author">
                                            <a href="author.html">
                                                <img src="{{ asset('assets/frontend') }}/media/blog/profile1.webp" alt="Author">John Philipe
                                            </a>
                                        </li>
                                        <li>
                                            <i class="regular-clock-circle"></i>3 min read
                                        </li>
                                        <li>
                                            <i class="regular-eye"></i>4k
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="single-slide">
                            <div class="post-box-layout2 box-border-dark-1 radius-default padding-30 bg-color-scandal box-shadow-large shadow-style-1 transition-default">
                                <div class="figure-holder radius-default">
                                    <a href="post-format-default.html" class="link-wrap img-height-100"><img width="635" height="365" src="{{ asset('assets/frontend') }}/media/blog/post92.webp" alt="Post"></a>
                                </div>
                                <div class="content-holder">
                                    <div class="entry-category style-1 color-dark-1-fixed">
                                        <ul>
                                            <li>
                                                <a href="archive-layout1.html">SPORTS</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <h3 class="entry-title color-dark-1-fixed underline-animation"><a href="post-format-default.html" class="link-wrap">2 Years After The Moon Landing: How Close From You</a></h3>
                                    <p class="entry-description color-dark-1-fixed">In 2028 schools will indeed sport fabulous gadgets, devices, and interfaces of learning. We are provide oue every day life style easily.</p>
                                    <ul class="entry-meta color-dark-1-fixed">
                                        <li class="post-author">
                                            <a href="author.html">
                                                <img src="{{ asset('assets/frontend') }}/media/blog/profile2.webp" alt="Author">Ashley Graham
                                            </a>
                                        </li>
                                        <li>
                                            <i class="regular-clock-circle"></i>5 min read
                                        </li>
                                        <li>
                                            <i class="regular-eye"></i>8k
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="single-slide">
                            <div class="post-box-layout2 box-border-dark-1 radius-default padding-30 bg-color-mimosa box-shadow-large shadow-style-1 transition-default">
                                <div class="figure-holder radius-default">
                                    <a href="post-format-default.html" class="link-wrap img-height-100"><img width="635" height="365" src="{{ asset('assets/frontend') }}/media/blog/post108.webp" alt="Post"></a>
                                </div>
                                <div class="content-holder">
                                    <div class="entry-category style-1 color-dark-1-fixed">
                                        <ul>
                                            <li>
                                                <a href="archive-layout1.html">FASHION</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <h3 class="entry-title color-dark-1-fixed underline-animation"><a href="post-format-default.html" class="link-wrap">The Science Behind Skin Care Products Has Come On Monday</a></h3>
                                    <p class="entry-description color-dark-1-fixed">In 2028 schools will indeed sport fabulous gadgets, devices, and interfaces of learning. We are provide oue every day life style easily.</p>
                                    <ul class="entry-meta color-dark-1-fixed">
                                        <li class="post-author">
                                            <a href="author.html">
                                                <img src="{{ asset('assets/frontend') }}/media/blog/profile2.webp" alt="Author">Sergio Pliego
                                            </a>
                                        </li>
                                        <li>
                                            <i class="regular-clock-circle"></i>9 min read
                                        </li>
                                        <li>
                                            <i class="regular-eye"></i>8k
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul class="slider-navigation-layout1 color-light-1-fixed position-layout1 nav-size-medium item-gap-5">
                        <li id="post-prev-1" class="prev"><i class="regular-arrow-left"></i></li>
                        <li id="post-next-1" class="next"><i class="regular-arrow-right"></i></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!--=====================================-->
<!--=          Post Area Start          =-->
<!--=====================================-->
<section class="post-wrap-layout2 space-top-30 bg-color-light-1 transition-default">
    <div class="container">
        <div class="position-relative">
            <div id="post-slider-2" class="post-slider-2 gutter-30 initially-none">
                <div class="single-slide">
                    <div class="post-box-layout3 box-border-dark-1 radius-default transition-default">
                        <div class="figure-holder radius-medium">
                            <a href="post-format-default.html" class="link-wrap figure-overlay img-height-100"><img width="540" height="540" src="{{ asset('assets/frontend') }}/media/blog/post3.webp" alt="Post"></a>
                        </div>
                        <div class="content-holder">
                            <h3 class="entry-title h3-medium color-light-1-fixed underline-animation"><a href="post-format-default.html">Tesla’s Cooking Up A New Way To Wire</a></h3>
                        </div>
                    </div>
                </div>
                <div class="single-slide">
                    <div class="post-box-layout3 box-border-dark-1 radius-default transition-default">
                        <div class="figure-holder radius-medium">
                            <a href="post-format-default.html" class="link-wrap figure-overlay img-height-100"><img width="540" height="540" src="{{ asset('assets/frontend') }}/media/blog/post4.webp" alt="Post"></a>
                        </div>
                        <div class="content-holder">
                            <h3 class="entry-title h3-medium color-light-1-fixed underline-animation"><a href="post-format-default.html">2 Years After The Moon Landing: How Close</a></h3>
                        </div>
                    </div>
                </div>
                <div class="single-slide">
                    <div class="post-box-layout3 box-border-dark-1 radius-default transition-default">
                        <div class="figure-holder radius-medium">
                            <a href="post-format-default.html" class="link-wrap figure-overlay img-height-100"><img width="540" height="540" src="{{ asset('assets/frontend') }}/media/blog/post5.webp" alt="Post"></a>
                        </div>
                        <div class="content-holder">
                            <h3 class="entry-title h3-medium color-light-1-fixed underline-animation"><a href="post-format-default.html">Millions Of Manuscripts Are Written</a></h3>
                        </div>
                    </div>
                </div>
                <div class="single-slide">
                    <div class="post-box-layout3 box-border-dark-1 radius-default transition-default">
                        <div class="figure-holder radius-medium">
                            <a href="post-format-default.html" class="link-wrap figure-overlay img-height-100"><img width="540" height="540" src="{{ asset('assets/frontend') }}/media/blog/post6.webp" alt="Post"></a>
                        </div>
                        <div class="content-holder">
                            <h3 class="entry-title h3-medium color-light-1-fixed underline-animation"><a href="post-format-default.html">1 Year After The Moon Landing: How Close</a></h3>
                        </div>
                    </div>
                </div>
                <div class="single-slide">
                    <div class="post-box-layout3 box-border-dark-1 radius-default transition-default">
                        <div class="figure-holder radius-medium">
                            <a href="post-format-default.html" class="link-wrap figure-overlay img-height-100"><img width="540" height="540" src="{{ asset('assets/frontend') }}/media/blog/post61.webp" alt="Post"></a>
                        </div>
                        <div class="content-holder">
                            <h3 class="entry-title h3-medium color-light-1-fixed underline-animation"><a href="post-format-default.html">2 Years After The Moon Landing: How Close</a></h3>
                        </div>
                    </div>
                </div>
            </div>
            <ul class="slider-navigation-layout1 color-light-1 position-layout2">
                <li id="post-prev-2" class="prev"><i class="regular-arrow-left"></i></li>
                <li id="post-next-2" class="next"><i class="regular-arrow-right"></i></li>
            </ul>
        </div>
    </div>
</section>

<!--=====================================-->
<!--=          Post Area Start          =-->
<!--=====================================-->
<section class="post-wrap-layout3 space-top-50 bg-color-light-1 transition-default">
    <div class="container">
        <div class="section-heading heading-style-1">
            <h2 class="title">Top Stories</h2>
            <a href="archive-layout1.html" class="link-wrap">Go to Stories <span class="icon-holder"><i class="regular-arrow-right"></i></span> </a>
        </div>
        <div class="row g-3">
            <div class="col-lg-4">
                <div class="post-box-layout4 box-border-dark-1 radius-default padding-20 bg-color-old-lace box-shadow-large shadow-style-2 transition-default">
                    <div class="figure-holder radius-default">
                        <a href="post-format-default.html" class="link-wrap img-height-100"><img width="660" height="470" src="{{ asset('assets/frontend') }}/media/blog/post7.webp" alt="Post"></a>
                    </div>
                    <div class="content-holder">
                        <div class="entry-category style-2 color-dark-1-fixed">
                            <ul>
                                <li>
                                    <a href="archive-layout1.html">TRAVEL</a>
                                </li>
                            </ul>
                        </div>
                        <h3 class="entry-title color-dark-1-fixed underline-animation"><a href="post-format-default.html" class="link-wrap">The Science Behind Skin Care Products Has Come</a></h3>
                        <p class="entry-description color-dark-1-fixed">In 2028 schools will indeed sport fabulous gadgets, devices, and interfaces of learning.</p>
                        <ul class="entry-meta color-dark-1-fixed">
                            <li class="post-author">
                                <a href="author.html">
                                    <img src="{{ asset('assets/frontend') }}/media/blog/profile3.webp" alt="Author">
                                    Kristin Watson
                                </a>
                            </li>
                            <li>
                                <i class="regular-clock-circle"></i>9 min read
                            </li>
                            <li>
                                <i class="regular-eye"></i>1k
                            </li>
                        </ul>
                        <a href="post-format-default.html" class="btn-text color-dark-1-fixed">See Details<span class="icon-holder"><i class="regular-arrow-right"></i></span> </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="post-box-layout4 box-border-dark-1 radius-default padding-20 bg-color-mimosa box-shadow-large shadow-style-2 transition-default">
                    <div class="figure-holder radius-default">
                        <a href="post-format-default.html" class="link-wrap img-height-100"><img width="660" height="470" src="{{ asset('assets/frontend') }}/media/blog/post8.webp" alt="Post"></a>
                    </div>
                    <div class="content-holder">
                        <div class="entry-category style-2 color-dark-1-fixed">
                            <ul>
                                <li>
                                    <a href="archive-layout1.html">SPORTS</a>
                                </li>
                            </ul>
                        </div>
                        <h3 class="entry-title color-dark-1-fixed underline-animation"><a href="post-format-default.html" class="link-wrap">Millions Of Manuscripts Are Written By You</a></h3>
                        <p class="entry-description color-dark-1-fixed">In 2028 schools will indeed sport fabulous gadgets, devices, and interfaces of learning.</p>
                        <ul class="entry-meta color-dark-1-fixed">
                            <li class="post-author">
                                <a href="author.html">
                                    <img src="{{ asset('assets/frontend') }}/media/blog/profile4.webp" alt="Author">
                                    Jenny Wilson
                                </a>
                            </li>
                            <li>
                                <i class="regular-clock-circle"></i>7 min read
                            </li>
                            <li>
                                <i class="regular-eye"></i>5k
                            </li>
                        </ul>
                        <a href="post-format-default.html" class="btn-text color-dark-1-fixed">See Details<span class="icon-holder"><i class="regular-arrow-right"></i></span> </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="post-box-layout4 box-border-dark-1 radius-default padding-20 bg-color-selago box-shadow-large shadow-style-2 transition-default">
                    <div class="figure-holder radius-default">
                        <a href="post-format-default.html" class="link-wrap img-height-100"><img width="660" height="470" src="{{ asset('assets/frontend') }}/media/blog/post9.webp" alt="Post"></a>
                    </div>
                    <div class="content-holder">
                        <div class="entry-category style-2 color-dark-1-fixed">
                            <ul>
                                <li>
                                    <a href="archive-layout1.html">FOOD</a>
                                </li>
                            </ul>
                        </div>
                        <h3 class="entry-title color-dark-1-fixed underline-animation"><a href="post-format-default.html" class="link-wrap">Underwater Exercise Is Used Strengthen Weak Muscles</a></h3>
                        <p class="entry-description color-dark-1-fixed">In 2028 schools will indeed sport fabulous gadgets, devices, and interfaces of learning.</p>
                        <ul class="entry-meta color-dark-1-fixed">
                            <li class="post-author">
                                <a href="author.html">
                                    <img src="{{ asset('assets/frontend') }}/media/blog/profile5.webp" alt="Author">
                                    Esther Howard
                                </a>
                            </li>
                            <li>
                                <i class="regular-clock-circle"></i>1 min read
                            </li>
                            <li>
                                <i class="regular-eye"></i>7k
                            </li>
                        </ul>
                        <a href="post-format-default.html" class="btn-text color-dark-1-fixed">See Details<span class="icon-holder"><i class="regular-arrow-right"></i></span> </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--=====================================-->
<!--=         Banner Area Start         =-->
<!--=====================================-->
<section class="banner-wrap-layout-1 space-top-60 bg-color-light-1 transition-default">
    <div class="container">
        <div class="banner-box-layout1 box-border-dark-1 radius-default">
            <div class="figure-holder radius-medium">
                <a href="#" class="link-wrap img-height-100"><img width="1232" height="230" src="{{ asset('assets/frontend') }}/media/banner/banner1.webp" alt="Banner"></a>
            </div>
        </div>
    </div>
</section>


<!--=====================================-->
<!--=          Post Area Start          =-->
<!--=====================================-->
<section class="post-wrap-layout4 space-top-50 bg-color-light-1 transition-default">
    <div class="container">
        <div class="section-heading heading-style-1">
            <h2 class="title">Latest Stories</h2>
        </div>
        <div class="row g-3">
            <div class="col-lg-8">
                <div class="row g-3">
                    <div class="col-lg-12">
                        <div class="post-box-layout5 box-border-dark-1 radius-default">
                            <div class="figure-holder radius-medium">
                                <a href="post-format-default.html" class="link-wrap figure-overlay img-height-100"><img width="810" height="558" src="{{ asset('assets/frontend') }}/media/blog/post10.webp" alt="Post"></a>
                            </div>
                            <div class="content-holder">
                                <div class="entry-category style-2 color-dark-1-fixed">
                                    <ul>
                                        <li>
                                            <a href="archive-layout1.html">TECH</a>
                                        </li>
                                    </ul>
                                </div>
                                <h3 class="entry-title h3-large color-light-1-fixed underline-animation"><a href="post-format-default.html" class="link-wrap">The Science Behind Skin Care Products Has Come From Other Country</a></h3>
                                <ul class="entry-meta color-light-1-fixed">
                                    <li class="post-author">
                                        <a href="author.html">
                                            <img src="{{ asset('assets/frontend') }}/media/blog/profile2.webp" alt="Author">
                                            John Philipe
                                        </a>
                                    </li>
                                    <li>
                                        <i class="regular-clock-circle"></i>7 min read
                                    </li>
                                    <li>
                                        <i class="regular-eye"></i>9k
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="post-box-layout5 box-border-dark-1 radius-default padding-20 bg-color-selago box-shadow-large shadow-style-2 transition-default">
                            <div class="figure-holder radius-default">
                                <a href="post-format-default.html" class="link-wrap figure-overlay img-height-100"><img width="660" height="470" src="{{ asset('assets/frontend') }}/media/blog/post9.webp" alt="Post"></a>
                            </div>
                            <div class="content-holder">
                                <div class="entry-category style-3 color-light-1-fixed">
                                    <ul>
                                        <li>
                                            <a href="archive-layout1.html">FOOD</a>
                                        </li>
                                    </ul>
                                </div>
                                <h3 class="entry-title h3-small color-light-1-fixed underline-animation mb-0"><a href="post-format-default.html" class="link-wrap">Underwater Exercise Is Used Strengthen Weak Muscles</a></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="post-box-layout5 box-border-dark-1 radius-default padding-20 bg-color-old-lace box-shadow-large shadow-style-2 transition-default">
                            <div class="figure-holder radius-default">
                                <a href="post-format-default.html" class="link-wrap figure-overlay img-height-100"><img width="660" height="470" src="{{ asset('assets/frontend') }}/media/blog/post11.webp" alt="Post"></a>
                            </div>
                            <div class="content-holder">
                                <div class="entry-category style-3 color-light-1-fixed">
                                    <ul>
                                        <li>
                                            <a href="archive-layout1.html">FASHION</a>
                                        </li>
                                    </ul>
                                </div>
                                <h3 class="entry-title h3-small color-light-1-fixed underline-animation mb-0"><a href="post-format-default.html" class="link-wrap">The Science Behind Skin Care Products Has Come</a></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="post-box-layout7 box-border-dark-1 radius-default padding-20 bg-color-scandal">
                    <div class="figure-holder radius-default">
                        <a href="post-format-default.html" class="link-wrap img-height-100"><img width="660" height="470" src="{{ asset('assets/frontend') }}/media/blog/post12.webp" alt="Post"></a>
                    </div>
                    <div class="content-holder">
                        <h3 class="entry-title h3-small color-dark-1-fixed underline-animation"><a href="post-format-default.html" class="link-wrap">Top 5 Travel Place You Have Visit</a></h3>
                        <ul class="entry-meta color-dark-1-fixed">
                            <li class="post-author">
                                <a href="author.html">
                                    Alisa Michaels
                                </a>
                            </li>
                            <li>
                                <i class="regular-clock-circle"></i>9 min read
                            </li>
                            <li>
                                <i class="regular-eye"></i>4k
                            </li>
                        </ul>
                    </div>
                    <div class="content-holder">
                        <h3 class="entry-title h3-small color-dark-1-fixed underline-animation"><a href="post-format-default.html" class="link-wrap">Documents And Witness Reveal That Also Visited Around The World</a></h3>
                        <ul class="entry-meta color-dark-1-fixed">
                            <li class="post-author">
                                <a href="author.html">
                                    Ashley Graham
                                </a>
                            </li>
                            <li>
                                <i class="regular-clock-circle"></i>3 min read
                            </li>
                            <li>
                                <i class="regular-eye"></i>3k
                            </li>
                        </ul>
                    </div>
                    <div class="content-holder">
                        <h3 class="entry-title h3-small color-dark-1-fixed underline-animation"><a href="post-format-default.html" class="link-wrap">The Classic Foundation Is Vanishing</a></h3>
                        <ul class="entry-meta color-dark-1-fixed">
                            <li class="post-author">
                                <a href="author.html">
                                    Sergio Pliego
                                </a>
                            </li>
                            <li>
                                <i class="regular-clock-circle"></i>1 min read
                            </li>
                            <li>
                                <i class="regular-eye"></i>3k
                            </li>
                        </ul>
                    </div>
                    <div class="content-holder">
                        <h3 class="entry-title h3-small color-dark-1-fixed underline-animation"><a href="post-format-default.html" class="link-wrap">Smarter Food Choices 101 Tips For Busy Women</a></h3>
                        <ul class="entry-meta color-dark-1-fixed">
                            <li class="post-author">
                                <a href="author.html">
                                    Kristin Watson
                                </a>
                            </li>
                            <li>
                                <i class="regular-clock-circle"></i>5 min read
                            </li>
                            <li>
                                <i class="regular-eye"></i>12k
                            </li>
                        </ul>
                    </div>
                    <div class="content-holder">
                        <h3 class="entry-title h3-small color-dark-1-fixed underline-animation"><a href="post-format-default.html" class="link-wrap">Documents And Witness Reveal That Also</a></h3>
                        <ul class="entry-meta color-dark-1-fixed">
                            <li class="post-author">
                                <a href="author.html">
                                    Jenny Wilson
                                </a>
                            </li>
                            <li>
                                <i class="regular-clock-circle"></i>6 min read
                            </li>
                            <li>
                                <i class="regular-eye"></i>8k
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--=====================================-->
<!--=          Post Area Start          =-->
<!--=====================================-->
<section class="post-wrap-layout5 space-top-50 bg-color-light-1 transition-default">
    <div class="container">
        <div class="section-heading heading-style-1">
            <h2 class="title">Top Videos</h2>
        </div>
        <div class="padding-40 pxy-md-30 pxy-sm-20 bg-color-mimosa box-border-dark-1 radius-default">
            <div class="figure-holder position-relative radius-default">
                <a href="https://www.youtube.com/watch?v=1iIZeIy7TqM" aria-label="Youtube Video" class="play-btn size-large popup-youtube"><i class="solid-play"></i></a>
                <a href="post-format-default.html" class="link-wrap img-height-100"><img width="1150" height="660" src="{{ asset('assets/frontend') }}/media/blog/post13.webp" alt="Post"></a>
            </div>
            <div class="multi-posts-layout1">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#one">Recommended</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#two">Latest</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="one">
                        <div class="row g-3 row-cols-1 row-cols-lg-2 row-cols-xl-3">
                            <div class="col">
                                <div class="post-box-layout8 radius-default">
                                    <div class="figure-holder radius-default">
                                        <a href="https://www.youtube.com/watch?v=1iIZeIy7TqM" aria-label="Youtube Video" class="play-btn size-small popup-youtube not-animation"><i class="solid-play"></i></a>
                                        <a href="post-format-default.html" class="link-wrap img-height-100"><img width="140" height="140" src="{{ asset('assets/frontend') }}/media/blog/post14.webp" alt="Post"></a>
                                    </div>
                                    <div class="content-holder">
                                        <div class="entry-category style-3 color-dark-1-fixed">
                                            <ul>
                                                <li>
                                                    <a href="archive-layout1.html">TRAVEL</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <h3 class="entry-title h3-small color-dark-1-fixed underline-animation"><a href="post-format-default.html" class="link-wrap">Millions Of Manuscripts Are</a></h3>
                                        <ul class="entry-meta color-dark-1-fixed">
                                            <li>
                                                <i class="regular-calendar"></i>August 29, 2023
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="post-box-layout8 radius-default">
                                    <div class="figure-holder radius-default">
                                        <a href="https://www.youtube.com/watch?v=1iIZeIy7TqM" aria-label="Youtube Video" class="play-btn size-small popup-youtube not-animation"><i class="solid-play"></i></a>
                                        <a href="post-format-default.html" class="link-wrap img-height-100"><img width="140" height="140" src="{{ asset('assets/frontend') }}/media/blog/post15.webp" alt="Post"></a>
                                    </div>
                                    <div class="content-holder">
                                        <div class="entry-category style-3 color-dark-1-fixed">
                                            <ul>
                                                <li>
                                                    <a href="archive-layout1.html">FOOD</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <h3 class="entry-title h3-small color-dark-1-fixed underline-animation"><a href="post-format-default.html" class="link-wrap">Smarter Food Choices 101 Tips</a></h3>
                                        <ul class="entry-meta color-dark-1-fixed">
                                            <li>
                                                <i class="regular-calendar"></i>August 29, 2023
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="post-box-layout8 radius-default">
                                    <div class="figure-holder radius-default">
                                        <a href="https://www.youtube.com/watch?v=1iIZeIy7TqM" aria-label="Youtube Video" class="play-btn size-small popup-youtube not-animation"><i class="solid-play"></i></a>
                                        <a href="post-format-default.html" class="link-wrap img-height-100"><img width="140" height="140" src="{{ asset('assets/frontend') }}/media/blog/post16.webp" alt="Post"></a>
                                    </div>
                                    <div class="content-holder">
                                        <div class="entry-category style-3 color-dark-1-fixed">
                                            <ul>
                                                <li>
                                                    <a href="archive-layout1.html">FASHION</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <h3 class="entry-title h3-small color-dark-1-fixed underline-animation"><a href="post-format-default.html" class="link-wrap">Traveling Through Hyper</a></h3>
                                        <ul class="entry-meta color-dark-1-fixed">
                                            <li>
                                                <i class="regular-calendar"></i>August 29, 2023
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="two">
                        <div class="row g-4 row-cols-1 row-cols-lg-2 row-cols-xl-3">
                            <div class="col">
                                <div class="post-box-layout8 radius-default">
                                    <div class="figure-holder radius-default">
                                        <a href="https://www.youtube.com/watch?v=1iIZeIy7TqM" aria-label="Youtube Video" class="play-btn size-small popup-youtube not-animation"><i class="solid-play"></i></a>
                                        <a href="post-format-default.html" class="link-wrap img-height-100"><img width="140" height="140" src="{{ asset('assets/frontend') }}/media/blog/post14.webp" alt="Post"></a>
                                    </div>
                                    <div class="content-holder">
                                        <div class="entry-category style-3 color-dark-1-fixed">
                                            <ul>
                                                <li>
                                                    <a href="archive-layout1.html">CITY LIFE</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <h3 class="entry-title h3-small color-dark-1-fixed underline-animation"><a href="post-format-default.html" class="link-wrap">Smarter Food Choices 101 Tips</a></h3>
                                        <ul class="entry-meta color-dark-1-fixed">
                                            <li>
                                                <i class="regular-calendar"></i>August 29, 2023
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="post-box-layout8 radius-default">
                                    <div class="figure-holder radius-default">
                                        <a href="https://www.youtube.com/watch?v=1iIZeIy7TqM" aria-label="Youtube Video" class="play-btn size-small popup-youtube not-animation"><i class="solid-play"></i></a>
                                        <a href="post-format-default.html" class="link-wrap img-height-100"><img width="140" height="140" src="{{ asset('assets/frontend') }}/media/blog/post15.webp" alt="Post"></a>
                                    </div>
                                    <div class="content-holder">
                                        <div class="entry-category style-3 color-dark-1-fixed">
                                            <ul>
                                                <li>
                                                    <a href="archive-layout1.html">TECH</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <h3 class="entry-title h3-small color-dark-1-fixed underline-animation"><a href="post-format-default.html" class="link-wrap">Genghis Khan’s Guide To Trave</a></h3>
                                        <ul class="entry-meta color-dark-1-fixed">
                                            <li>
                                                <i class="regular-calendar"></i>1 min read
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="post-box-layout8 radius-default">
                                    <div class="figure-holder radius-default">
                                        <a href="https://www.youtube.com/watch?v=1iIZeIy7TqM" aria-label="Youtube Video" class="play-btn size-small popup-youtube not-animation"><i class="solid-play"></i></a>
                                        <a href="post-format-default.html" class="link-wrap img-height-100"><img width="140" height="140" src="{{ asset('assets/frontend') }}/media/blog/post16.webp" alt="Post"></a>
                                    </div>
                                    <div class="content-holder">
                                        <div class="entry-category style-3 color-dark-1-fixed">
                                            <ul>
                                                <li>
                                                    <a href="archive-layout1.html">HEALTH</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <h3 class="entry-title h3-small color-dark-1-fixed underline-animation"><a href="post-format-default.html" class="link-wrap">Get Over 500 Name Ideas For Your Travel</a></h3>
                                        <ul class="entry-meta color-dark-1-fixed">
                                            <li>
                                                <i class="regular-calendar"></i>9 min read
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="post-box-layout8 radius-default">
                                    <div class="figure-holder radius-default">
                                        <a href="https://www.youtube.com/watch?v=1iIZeIy7TqM" aria-label="Youtube Video" class="play-btn size-small popup-youtube not-animation"><i class="solid-play"></i></a>
                                        <a href="post-format-default.html" class="link-wrap img-height-100"><img width="140" height="140" src="{{ asset('assets/frontend') }}/media/blog/post15.webp" alt="Post"></a>
                                    </div>
                                    <div class="content-holder">
                                        <div class="entry-category style-3 color-dark-1-fixed">
                                            <ul>
                                                <li>
                                                    <a href="archive-layout1.html">FOOD</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <h3 class="entry-title h3-small color-dark-1-fixed underline-animation"><a href="post-format-default.html" class="link-wrap">Reality Hosting, The Use Computer</a></h3>
                                        <ul class="entry-meta color-dark-1-fixed">
                                            <li>
                                                <i class="regular-calendar"></i>8 min read
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="post-box-layout8 radius-default">
                                    <div class="figure-holder radius-default">
                                        <a href="https://www.youtube.com/watch?v=1iIZeIy7TqM" aria-label="Youtube Video" class="play-btn size-small popup-youtube not-animation"><i class="solid-play"></i></a>
                                        <a href="post-format-default.html" class="link-wrap img-height-100"><img width="140" height="140" src="{{ asset('assets/frontend') }}/media/blog/post16.webp" alt="Post"></a>
                                    </div>
                                    <div class="content-holder">
                                        <div class="entry-category style-3 color-dark-1-fixed">
                                            <ul>
                                                <li>
                                                    <a href="archive-layout1.html">CLOTH</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <h3 class="entry-title h3-small color-dark-1-fixed underline-animation"><a href="post-format-default.html" class="link-wrap">Air Pods Pro With Wireless Charging</a></h3>
                                        <ul class="entry-meta color-dark-1-fixed">
                                            <li>
                                                <i class="regular-calendar"></i>5 min read
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="post-box-layout8 radius-default">
                                    <div class="figure-holder radius-default">
                                        <a href="https://www.youtube.com/watch?v=1iIZeIy7TqM" aria-label="Youtube Video" class="play-btn size-small popup-youtube not-animation"><i class="solid-play"></i></a>
                                        <a href="post-format-default.html" class="link-wrap img-height-100"><img width="140" height="140" src="{{ asset('assets/frontend') }}/media/blog/post14.webp" alt="Post"></a>
                                    </div>
                                    <div class="content-holder">
                                        <div class="entry-category style-3 color-dark-1-fixed">
                                            <ul>
                                                <li>
                                                    <a href="archive-layout1.html">MEDICAL</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <h3 class="entry-title h3-small color-dark-1-fixed underline-animation"><a href="post-format-default.html" class="link-wrap">Evangelical Christians Are Sizing</a></h3>
                                        <ul class="entry-meta color-dark-1-fixed">
                                            <li>
                                                <i class="regular-calendar"></i>7 min read
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--=====================================-->
<!--=          Post Area Start          =-->
<!--=====================================-->
<section class="post-wrap-layout6 space-top-50 bg-color-light-1 transition-default">
    <div class="container">
        <div class="section-heading heading-style-1">
            <h2 class="title">Recent Articles</h2>
        </div>
        <div class="row sticky-coloum-wrap">
            <div class="col-lg-8 col-12 sticky-coloum-item">
                <div class="row g-3 pe-lg-4">
                    <div class="col-12">
                        <div class="post-box-layout9 box-border-dark-1 radius-default padding-20 figure-scale-animation bg-color-scandal box-shadow-large shadow-style-2 transition-default">
                            <div class="figure-holder radius-default">
                                <a href="post-format-default.html" class="link-wrap img-height-100"><img width="500" height="500" src="{{ asset('assets/frontend') }}/media/blog/post17.webp" alt="Post"></a>
                            </div>
                            <div class="content-holder">
                                <div>
                                    <div class="entry-category style-2 color-dark-1-fixed">
                                        <ul>
                                            <li>
                                                <a href="archive-layout1.html">TECH</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <h3 class="entry-title color-dark-1-fixed underline-animation"><a href="post-format-default.html" class="link-wrap">The Science Behind Skin Care Products Has Come</a></h3>
                                    <p class="entry-description color-dark-1-fixed">Nam eget lorem mattis, consequat felis quis, luctus augue. Aenean ac iaculis enim.</p>
                                    <ul class="entry-meta color-dark-1-fixed">
                                        <li class="post-author">
                                            <a href="author.html">
                                                <img src="{{ asset('assets/frontend') }}/media/blog/profile1.webp" alt="Author">
                                                Esther Howard
                                            </a>
                                        </li>
                                        <li>
                                            <i class="regular-clock-circle"></i>3 min read
                                        </li>
                                        <li>
                                            <i class="regular-eye"></i>4k
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="post-box-layout9 box-border-dark-1 radius-default padding-20 figure-scale-animation bg-color-mimosa box-shadow-large shadow-style-2 transition-default">
                            <div class="figure-holder radius-default">
                                <a href="post-format-default.html" class="link-wrap img-height-100"><img width="500" height="500" src="{{ asset('assets/frontend') }}/media/blog/post18.webp" alt="Post"></a>
                            </div>
                            <div class="content-holder">
                                <div>
                                    <div class="entry-category style-2 color-dark-1-fixed">
                                        <ul>
                                            <li>
                                                <a href="archive-layout1.html">EDUCATION</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <h3 class="entry-title color-dark-1-fixed underline-animation"><a href="post-format-default.html" class="link-wrap">Millions Of Manuscripts Are Written Aenean Ac Iaculis</a></h3>
                                    <p class="entry-description color-dark-1-fixed">Nam eget lorem mattis, consequat felis quis, luctus augue. Aenean ac iaculis enim.</p>
                                    <ul class="entry-meta color-dark-1-fixed">
                                        <li class="post-author">
                                            <a href="author.html">
                                                <img src="{{ asset('assets/frontend') }}/media/blog/profile2.webp" alt="Author">
                                                John Philipe
                                            </a>
                                        </li>
                                        <li>
                                            <i class="regular-clock-circle"></i>4 min read
                                        </li>
                                        <li>
                                            <i class="regular-eye"></i>2k
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="post-box-layout9 box-border-dark-1 radius-default padding-20 figure-scale-animation bg-color-selago box-shadow-large shadow-style-2 transition-default">
                            <div class="figure-holder radius-default">
                                <a href="post-format-default.html" class="link-wrap img-height-100"><img width="500" height="500" src="{{ asset('assets/frontend') }}/media/blog/post19.webp" alt="Post"></a>
                            </div>
                            <div class="content-holder">
                                <div>
                                    <div class="entry-category style-2 color-dark-1-fixed">
                                        <ul>
                                            <li>
                                                <a href="archive-layout1.html">HISTORY</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <h3 class="entry-title color-dark-1-fixed underline-animation"><a href="post-format-default.html" class="link-wrap">Underwater Exercise Is Used Strengthen Weak Muscles</a></h3>
                                    <p class="entry-description color-dark-1-fixed">Nam eget lorem mattis, consequat felis quis, luctus augue. Aenean ac iaculis enim.</p>
                                    <ul class="entry-meta color-dark-1-fixed">
                                        <li class="post-author">
                                            <a href="author.html">
                                                <img src="{{ asset('assets/frontend') }}/media/blog/profile3.webp" alt="Author">
                                                Alisa Michaels
                                            </a>
                                        </li>
                                        <li>
                                            <i class="regular-clock-circle"></i>6 min read
                                        </li>
                                        <li>
                                            <i class="regular-eye"></i>7k
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="post-box-layout9 box-border-dark-1 radius-default padding-20 figure-scale-animation bg-color-old-lace box-shadow-large shadow-style-2 transition-default">
                            <div class="figure-holder radius-default">
                                <a href="post-format-default.html" class="link-wrap img-height-100"><img width="500" height="500" src="{{ asset('assets/frontend') }}/media/blog/post20.webp" alt="Post"></a>
                            </div>
                            <div class="content-holder">
                                <div>
                                    <div class="entry-category style-2 color-dark-1-fixed">
                                        <ul>
                                            <li>
                                                <a href="archive-layout1.html">FOOD</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <h3 class="entry-title color-dark-1-fixed underline-animation"><a href="post-format-default.html" class="link-wrap">Smarter Food Choices 101 Tips For Busy Women</a></h3>
                                    <p class="entry-description color-dark-1-fixed">Nam eget lorem mattis, consequat felis quis, luctus augue. Aenean ac iaculis enim.</p>
                                    <ul class="entry-meta color-dark-1-fixed">
                                        <li class="post-author">
                                            <a href="author.html">
                                                <img src="{{ asset('assets/frontend') }}/media/blog/profile4.webp" alt="Author">
                                                Ashley Graham
                                            </a>
                                        </li>
                                        <li>
                                            <i class="regular-clock-circle"></i>9 min read
                                        </li>
                                        <li>
                                            <i class="regular-eye"></i>1k
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="post-box-layout9 box-border-dark-1 radius-default padding-20 figure-scale-animation bg-color-scandal box-shadow-large shadow-style-2 transition-default">
                            <div class="figure-holder radius-default">
                                <a href="post-format-default.html" class="link-wrap img-height-100"><img width="500" height="500" src="{{ asset('assets/frontend') }}/media/blog/post21.webp" alt="Post"></a>
                            </div>
                            <div class="content-holder">
                                <div>
                                    <div class="entry-category style-2 color-dark-1-fixed">
                                        <ul>
                                            <li>
                                                <a href="archive-layout1.html">FASHION</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <h3 class="entry-title color-dark-1-fixed underline-animation"><a href="post-format-default.html" class="link-wrap">Virtual Reality (VR), The Use Computer Modeling</a></h3>
                                    <p class="entry-description color-dark-1-fixed">Nam eget lorem mattis, consequat felis quis, luctus augue. Aenean ac iaculis enim.</p>
                                    <ul class="entry-meta color-dark-1-fixed">
                                        <li class="post-author">
                                            <a href="author.html">
                                                <img src="{{ asset('assets/frontend') }}/media/blog/profile5.webp" alt="Author">
                                                Sergio Pliego
                                            </a>
                                        </li>
                                        <li>
                                            <i class="regular-clock-circle"></i>1 min read
                                        </li>
                                        <li>
                                            <i class="regular-eye"></i>3k
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="post-box-layout9 box-border-dark-1 radius-default padding-20 figure-scale-animation bg-color-mimosa box-shadow-large shadow-style-2 transition-default">
                            <div class="figure-holder radius-default">
                                <a href="post-format-default.html" class="link-wrap img-height-100"><img width="500" height="500" src="{{ asset('assets/frontend') }}/media/blog/post22.webp" alt="Post"></a>
                            </div>
                            <div class="content-holder">
                                <div>
                                    <div class="entry-category style-2 color-dark-1-fixed">
                                        <ul>
                                            <li>
                                                <a href="archive-layout1.html">WORLD</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <h3 class="entry-title color-dark-1-fixed underline-animation"><a href="post-format-default.html" class="link-wrap">Reality Hosting, The Use Computer Modeling</a></h3>
                                    <p class="entry-description color-dark-1-fixed">Nam eget lorem mattis, consequat felis quis, luctus augue. Aenean ac iaculis enim.</p>
                                    <ul class="entry-meta color-dark-1-fixed">
                                        <li class="post-author">
                                            <a href="author.html">
                                                <img src="{{ asset('assets/frontend') }}/media/blog/profile1.webp" alt="Author">
                                                Kristin Watson
                                            </a>
                                        </li>
                                        <li>
                                            <i class="regular-clock-circle"></i>16 min read
                                        </li>
                                        <li>
                                            <i class="regular-eye"></i>15k
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-12 sticky-coloum-item">
                <div class="sidebar-global sidebar-layout1">
                    <div class="sidebar-widget">
                        <div class="widget-banner banner-layout1">
                            <div class="radius-default box-border-dark-1 img-height-100">
                                <div class="figure-holder radius-medium">
                                    <img width="700" height="294" src="{{ asset('assets/frontend') }}/media/banner/banner2.webp" alt="Banner">
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="sidebar-widget">
                        <div class="section-heading heading-style-2">
                            <h3 class="title">Explore Topics</h3>
                        </div>
                        <div class="widget-category category-layout1 bg-color-tidal radius-default box-border-dark-1">
                            <ul class="category-list">
                                <li>
                                    <a href="archive-layout1.html">Culture</a>(2)
                                </li>
                                <li>
                                    <a href="archive-layout1.html">Travel</a>(1)
                                </li>
                                <li>
                                    <a href="archive-layout1.html">Business</a>(5)
                                </li>
                                <li>
                                    <a href="archive-layout1.html">Trending</a>(4)
                                </li>
                            </ul>
                        </div>
                    </div>



                    <div class="sidebar-widget">
                        <div class="widget-follow follow-layout1 radius-default padding-40 box-border-dark-1">
                            <h3 class="title h3-medium">Follow Us</h3>
                            <p class="description">Follow us on Social Network</p>
                            <div class="axil-social social-layout-1 size-small gap-12 justify-content-center">
                                <ul>
                                    <li class="facebook">
                                        <a href="https://facebook.com/" aria-label="Learn more from Facebook">
                                            <i class="solid-facebook2"></i>
                                        </a>
                                    </li>
                                    <li class="instagram">
                                        <a href="https://instagram.com/" aria-label="Learn more from Instagram">
                                            <i class="regular-instagram"></i>
                                        </a>
                                    </li>
                                    <li class="mail-fast">
                                        <a aria-label="Learn more from Mail fast" href="https://mail-fast.com/">
                                            <i class="regular-mail-fast"></i>
                                        </a>
                                    </li>
                                    <li class="pinterest">
                                        <a href="https://pinterest.com/" aria-label="Learn more from Pinterest">
                                            <i class="solid-pinterest-01"></i>
                                        </a>
                                    </li>
                                    <li class="youtube">
                                        <a href="https://youtube.com/" aria-label="Learn more from Youtube">
                                            <i class="solid-youtube"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>



                    <div class="sidebar-widget">
                        <div class="section-heading heading-style-2">
                            <h3 class="title">Short Stories</h3>
                        </div>
                        <div class="widget-post post-layout1">
                            <div class="post-box">
                                <div class="figure-holder radius-default">
                                    <a href="post-format-default.html" class="link-wrap figure-overlay img-height-100"><img width="700" height="470" src="{{ asset('assets/frontend') }}/media/blog/post23.webp" alt="Post"></a>
                                </div>
                                <div class="content-holder">
                                    <h3 class="entry-title color-light-1-fixed h3-small underline-animation"><a href="post-format-default.html" class="link-wrap">Top 5 Street Tacos In Usa Top 5 Street Tacos
                                            In Usa</a></h3>
                                    <ul class="entry-meta color-light-1-fixed">
                                        <li>
                                            <i class="regular-clock-circle"></i>2 min read
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="post-box">
                                <div class="figure-holder radius-default">
                                    <a href="post-format-default.html" class="link-wrap figure-overlay img-height-100"><img width="140" height="140" src="{{ asset('assets/frontend') }}/media/blog/post14.webp" alt="Post"></a>
                                </div>
                                <div class="content-holder">
                                    <h3 class="entry-title color-dark-1 underline-animation h3-extra-small"><a href="post-format-default.html" class="link-wrap">Smarter Food 101 Tips For Your Health</a></h3>
                                    <ul class="entry-meta color-dark-1">
                                        <li>
                                            <i class="regular-clock-circle"></i>2 min read
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="post-box">
                                <div class="figure-holder radius-default">
                                    <a href="post-format-default.html" class="link-wrap figure-overlay img-height-100"><img width="140" height="140" src="{{ asset('assets/frontend') }}/media/blog/post15.webp" alt="Post"></a>
                                </div>
                                <div class="content-holder">
                                    <h3 class="entry-title color-dark-1 underline-animation h3-extra-small"><a href="post-format-default.html" class="link-wrap">Virtual Reality (VR), The Use Computer
                                            Modeling</a></h3>
                                    <ul class="entry-meta color-dark-1">
                                        <li>
                                            <i class="regular-clock-circle"></i>8 min read
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="post-box">
                                <div class="figure-holder radius-default">
                                    <a href="post-format-default.html" class="link-wrap figure-overlay img-height-100"><img width="140" height="140" src="{{ asset('assets/frontend') }}/media/blog/post16.webp" alt="Post"></a>
                                </div>
                                <div class="content-holder">
                                    <h3 class="entry-title color-dark-1 underline-animation h3-extra-small"><a href="post-format-default.html" class="link-wrap">Reality Hosting, The Use Computer Modeling</a>
                                    </h3>
                                    <ul class="entry-meta color-dark-1">
                                        <li>
                                            <i class="regular-clock-circle"></i>5 min read
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar-widget">
                        <div class="section-heading heading-style-2">
                            <h3 class="title">Recommended topics</h3>
                        </div>
                        <div class="widget-tagcloud tagcloud-layout1">
                            <a href="archive-layout1.html" class="tag-cloud-link box-shadow-small shadow-style-2 box-border-dark-1">
                                <span class="icon-holder">
                                    <i class="regular-medical-service"></i>
                                </span>Healthcare
                            </a>
                            <a href="archive-layout1.html" class="tag-cloud-link box-shadow-small shadow-style-2 box-border-dark-1">
                                <span class="icon-holder">
                                    <i class="regular-shopping-basket2"></i>
                                </span>Fashion
                            </a>
                            <a href="archive-layout1.html" class="tag-cloud-link box-shadow-small shadow-style-2 box-border-dark-1">
                                <span class="icon-holder">
                                    <i class="solid-interactive"></i>
                                </span>History
                            </a>
                            <a href="archive-layout1.html" class="tag-cloud-link box-shadow-small shadow-style-2 box-border-dark-1">
                                <span class="icon-holder">
                                    <i class="regular-graduation-cap1"></i>
                                </span>Education
                            </a>
                            <a href="archive-layout1.html" class="tag-cloud-link box-shadow-small shadow-style-2 box-border-dark-1">
                                <span class="icon-holder">
                                    <i class="regular-globe-stand"></i>
                                </span>World
                            </a>
                            <a href="archive-layout1.html" class="tag-cloud-link box-shadow-small shadow-style-2 box-border-dark-1">
                                <span class="icon-holder">
                                    <i class="solid-interactive"></i>
                                </span>History
                            </a>
                            <a href="archive-layout1.html" class="tag-cloud-link box-shadow-small shadow-style-2 box-border-dark-1">
                                <span class="icon-holder">
                                    <i class="regular-graduation-cap1"></i>
                                </span>Education
                            </a>
                            <a href="archive-layout1.html" class="tag-cloud-link box-shadow-small shadow-style-2 box-border-dark-1">
                                <span class="icon-holder">
                                    <i class="solid-interactive"></i>
                                </span>History
                            </a>
                            <a href="archive-layout1.html" class="tag-cloud-link box-shadow-small shadow-style-2 box-border-dark-1">
                                <span class="icon-holder">
                                    <i class="regular-shopping-basket2"></i>
                                </span>Fashion
                            </a>
                        </div>
                    </div>



                </div>



            </div>
        </div>
    </div>
</section>

<!--=====================================-->
<!--=          Post Area Start          =-->
<!--=====================================-->
<section class="post-wrap-layout7 space-top-40 bg-color-light-1 transition-default">
    <div class="container">
        <div class="section-heading heading-style-1">
            <h2 class="title">Recent Articles</h2>
            <a href="archive-layout1.html" class="link-wrap">Go to Stories <span class="icon-holder"><i class="regular-arrow-right"></i></span> </a>
        </div>
        <div class="row g-3">
            <div class="col-lg-6">
                <div class="post-box-layout10 box-border-dark-1 radius-default both-side-equal">
                    <div class="figure-holder radius-medium">
                        <a href="post-format-default.html" class="link-wrap figure-overlay img-height-100"><img width="630" height="500" src="{{ asset('assets/frontend') }}/media/blog/post109.webp" alt="Post"></a>
                    </div>
                    <div class="content-holder">
                        <div class="entry-category style-2 color-dark-1-fixed">
                            <ul>
                                <li>
                                    <a href="archive-layout1.html">HEALTH</a>
                                </li>
                            </ul>
                        </div>
                        <h3 class="entry-title h3-large color-light-1-fixed underline-animation"><a href="post-format-default.html" class="link-wrap">Underwater Exercise Is Used Strengthen Weak Muscles</a></h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row g-3">
                    <div class="col-md-6 col-12">
                        <div class="post-box-layout11 box-border-dark-1 radius-default padding-20 bg-color-scandal box-shadow-small shadow-style-2 transition-default">
                            <div class="figure-holder radius-default">
                                <a href="post-format-default.html" class="link-wrap img-height-100"><img width="480" height="344" src="{{ asset('assets/frontend') }}/media/blog/post29.webp" alt="Post"></a>
                            </div>
                            <div class="content-holder">
                                <div class="entry-category style-2 color-dark-1-fixed">
                                    <ul>
                                        <li>
                                            <a href="archive-layout1.html">FOOD</a>
                                        </li>
                                    </ul>
                                </div>
                                <h3 class="entry-title h3-small color-dark-1-fixed underline-animation"><a href="post-format-default.html" class="link-wrap">Smarter Food Choices 101 Tips For Busy Women</a></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="post-box-layout11 box-border-dark-1 radius-default padding-20 bg-color-mimosa box-shadow-small shadow-style-2 transition-default">
                            <div class="figure-holder radius-default">
                                <a href="post-format-default.html" class="link-wrap img-height-100"><img width="480" height="344" src="{{ asset('assets/frontend') }}/media/blog/post30.webp" alt="Post"></a>
                            </div>
                            <div class="content-holder">
                                <div class="entry-category style-2 color-dark-1-fixed">
                                    <ul>
                                        <li>
                                            <a href="archive-layout1.html">TECH</a>
                                        </li>
                                    </ul>
                                </div>
                                <h3 class="entry-title h3-small color-dark-1-fixed underline-animation"><a href="post-format-default.html" class="link-wrap">Air Pods Pro With Wireless Charging Case</a></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="post-box-layout11 box-border-dark-1 radius-default padding-20 bg-color-selago box-shadow-small shadow-style-2 transition-default">
                            <div class="figure-holder radius-default">
                                <a href="post-format-default.html" class="link-wrap img-height-100"><img width="480" height="344" src="{{ asset('assets/frontend') }}/media/blog/post31.webp" alt="Post"></a>
                            </div>
                            <div class="content-holder">
                                <div class="entry-category style-2 color-dark-1-fixed">
                                    <ul>
                                        <li>
                                            <a href="archive-layout1.html">SPORTS</a>
                                        </li>
                                    </ul>
                                </div>
                                <h3 class="entry-title h3-small color-dark-1-fixed underline-animation"><a href="post-format-default.html" class="link-wrap">Virtual Reality (VR), The Use Computer Modeling</a></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="post-box-layout11 box-border-dark-1 radius-default padding-20 bg-color-old-lace box-shadow-small shadow-style-2 transition-default">
                            <div class="figure-holder radius-default">
                                <a href="post-format-default.html" class="link-wrap img-height-100"><img width="480" height="344" src="{{ asset('assets/frontend') }}/media/blog/post32.webp" alt="Post"></a>
                            </div>
                            <div class="content-holder">
                                <div class="entry-category style-2 color-dark-1-fixed">
                                    <ul>
                                        <li>
                                            <a href="archive-layout1.html">TRAVEL</a>
                                        </li>
                                    </ul>
                                </div>
                                <h3 class="entry-title h3-small color-dark-1-fixed underline-animation"><a href="post-format-default.html" class="link-wrap">Reality Hosting, The Use Computer Modeling</a></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--=====================================-->
<!--=          Post Area Start          =-->
<!--=====================================-->
<section class="team-wrap-layout1 space-top-50 bg-color-light-1 transition-default">
    <div class="container">
        <div class="border-bottom-dark">
            <div class="section-heading heading-style-1">
                <h2 class="title">Top Columnist</h2>
            </div>
            <div id="team-slider" class="team-slider-1 gutter-6 initially-none">
                <div class="single-slide">
                    <div class="team-box-layout1">
                        <div class="figure-holder box-border-dark-1">
                            <a href="author.html" class="link-wrap img-height-100"><img width="140" height="140" src="{{ asset('assets/frontend') }}/media/team/team1.webp" alt="Team"></a>
                        </div>
                        <div class="content-holder">
                            <h3 class="entry-title h3-extra-small"><a href="author.html" class="link-wrap">Robert Jhon</a></h3>
                            <div class="skill-box">
                                <div class="skill-for">Specialise in</div>
                                <ul class="skill-on">
                                    <li>Entertainment,</li>
                                    <li>Culture</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-slide">
                    <div class="team-box-layout1">
                        <div class="figure-holder box-border-dark-1">
                            <a href="author.html" class="link-wrap img-height-100"><img width="140" height="140" src="{{ asset('assets/frontend') }}/media/team/team2.webp" alt="Team"></a>
                        </div>
                        <div class="content-holder">
                            <h3 class="entry-title h3-extra-small"><a href="author.html" class="link-wrap">Susana Mig</a></h3>
                            <div class="skill-box">
                                <div class="skill-for">Specialise in</div>
                                <ul class="skill-on">
                                    <li>Entertainment,</li>
                                    <li>Culture</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-slide">
                    <div class="team-box-layout1">
                        <div class="figure-holder box-border-dark-1">
                            <a href="author.html" class="link-wrap img-height-100"><img width="140" height="140" src="{{ asset('assets/frontend') }}/media/team/team3.webp" alt="Team"></a>
                        </div>
                        <div class="content-holder">
                            <h3 class="entry-title h3-extra-small"><a href="author.html" class="link-wrap">Amy Amber</a></h3>
                            <div class="skill-box">
                                <div class="skill-for">Specialise in</div>
                                <ul class="skill-on">
                                    <li>Entertainment,</li>
                                    <li>Culture</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-slide">
                    <div class="team-box-layout1">
                        <div class="figure-holder box-border-dark-1">
                            <a href="author.html" class="link-wrap img-height-100"><img width="140" height="140" src="{{ asset('assets/frontend') }}/media/team/team7.webp" alt="Team"></a>
                        </div>
                        <div class="content-holder">
                            <h3 class="entry-title h3-extra-small"><a href="author.html" class="link-wrap">Riya Pall</a></h3>
                            <div class="skill-box">
                                <div class="skill-for">Specialise in</div>
                                <ul class="skill-on">
                                    <li>Entertainment,</li>
                                    <li>Culture</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--=====================================-->
<!--=          Post Area Start          =-->
<!--=====================================-->
<section class="post-wrap-layout8 space-top-50 bg-color-light-1 transition-default">
    <div class="container">
        <div class="row g-3">
            <div class="col-lg-4">
                <div class="post-box-layout12 box-border-dark-1 radius-default padding-20 bg-color-scandal box-shadow-large shadow-style-2 transition-default">
                    <div class="single-item">
                        <div class="figure-holder radius-default">
                            <a href="post-format-default.html" class="link-wrap img-height-100"><img width="660" height="440" src="{{ asset('assets/frontend') }}/media/blog/post33.webp" alt="Post"></a>
                        </div>
                        <div class="content-holder">
                            <div class="entry-category style-2 color-dark-1-fixed">
                                <ul>
                                    <li>
                                        <a href="archive-layout1.html">FOOD</a>
                                    </li>
                                </ul>
                            </div>
                            <h3 class="entry-title h3-small color-dark-1-fixed underline-animation"><a href="post-format-default.html" class="link-wrap">The Science Behind Skin Care Products Has Come</a></h3>
                            <ul class="entry-meta color-dark-1-fixed">
                                <li class="post-author">
                                    <a href="author.html">
                                        <img src="{{ asset('assets/frontend') }}/media/blog/profile1.webp" alt="Author">
                                        Jenny Wilson
                                    </a>
                                </li>
                                <li>
                                    <i class="regular-clock-circle"></i>1 min read
                                </li>
                                <li>
                                    <i class="regular-eye"></i>9k
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="single-item">
                        <div class="figure-holder radius-default">
                            <a href="post-format-default.html" class="link-wrap figure-overlay img-height-100"><img width="250" height="168" src="{{ asset('assets/frontend') }}/media/blog/post34.webp" alt="Post"></a>
                        </div>
                        <div class="content-holder">
                            <div class="entry-category style-3 color-dark-1-fixed">
                                <ul>
                                    <li>
                                        <a href="archive-layout1.html">TECH</a>
                                    </li>
                                </ul>
                            </div>
                            <h3 class="entry-title color-dark-1-fixed h3-small underline-animation"><a href="post-format-default.html" class="link-wrap">Manuscripts Are Written Ac Iaculis</a></h3>
                        </div>
                    </div>
                    <div class="single-item">
                        <div class="figure-holder radius-default">
                            <a href="post-format-default.html" class="link-wrap figure-overlay img-height-100"><img width="250" height="168" src="{{ asset('assets/frontend') }}/media/blog/post35.webp" alt="Post"></a>
                        </div>
                        <div class="content-holder">
                            <div class="entry-category style-3 color-dark-1-fixed">
                                <ul>
                                    <li>
                                        <a href="archive-layout1.html">HEALTH</a>
                                    </li>
                                </ul>
                            </div>
                            <h3 class="entry-title color-dark-1-fixed h3-small underline-animation"><a href="post-format-default.html" class="link-wrap">Choices 101 Tips For Busy Women</a></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="post-box-layout12 box-border-dark-1 radius-default padding-20 bg-color-mimosa box-shadow-large shadow-style-2 transition-default">
                    <div class="single-item">
                        <div class="figure-holder radius-default">
                            <a href="post-format-default.html" class="link-wrap img-height-100"><img width="660" height="440" src="{{ asset('assets/frontend') }}/media/blog/post36.webp" alt="Post"></a>
                        </div>
                        <div class="content-holder">
                            <div class="entry-category style-2 color-dark-1-fixed">
                                <ul>
                                    <li>
                                        <a href="archive-layout1.html">HISTORY</a>
                                    </li>
                                </ul>
                            </div>
                            <h3 class="entry-title h3-small color-dark-1-fixed underline-animation"><a href="post-format-default.html" class="link-wrap">Underwater Exercise Is Used Strengthen Weak Muscles</a></h3>
                            <ul class="entry-meta color-dark-1-fixed">
                                <li class="post-author">
                                    <a href="author.html">
                                        <img src="{{ asset('assets/frontend') }}/media/blog/profile2.webp" alt="Author">
                                        Esther Howard
                                    </a>
                                </li>
                                <li>
                                    <i class="regular-clock-circle"></i>3 min read
                                </li>
                                <li>
                                    <i class="regular-eye"></i>9k
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="single-item">
                        <div class="figure-holder radius-default">
                            <a href="post-format-default.html" class="link-wrap figure-overlay img-height-100"><img width="250" height="168" src="{{ asset('assets/frontend') }}/media/blog/post37.webp" alt="Post"></a>
                        </div>
                        <div class="content-holder">
                            <div class="entry-category style-3 color-dark-1-fixed">
                                <ul>
                                    <li>
                                        <a href="archive-layout1.html">WORLD</a>
                                    </li>
                                </ul>
                            </div>
                            <h3 class="entry-title color-dark-1-fixed h3-small underline-animation"><a href="post-format-default.html" class="link-wrap">Smarter Food Choices 20 Tips</a></h3>
                        </div>
                    </div>
                    <div class="single-item">
                        <div class="figure-holder radius-default">
                            <a href="post-format-default.html" class="link-wrap figure-overlay img-height-100"><img width="250" height="168" src="{{ asset('assets/frontend') }}/media/blog/post38.webp" alt="Post"></a>
                        </div>
                        <div class="content-holder">
                            <div class="entry-category style-3 color-dark-1-fixed">
                                <ul>
                                    <li>
                                        <a href="archive-layout1.html">MEDICAL</a>
                                    </li>
                                </ul>
                            </div>
                            <h3 class="entry-title color-dark-1-fixed h3-small underline-animation"><a href="post-format-default.html" class="link-wrap">Choices 101 Tips For Busy Women</a></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="post-box-layout12 box-border-dark-1 radius-default padding-20 bg-color-old-lace box-shadow-large shadow-style-2 transition-default">
                    <div class="single-item">
                        <div class="figure-holder radius-default">
                            <a href="post-format-default.html" class="link-wrap img-height-100"><img width="660" height="440" src="{{ asset('assets/frontend') }}/media/blog/post39.webp" alt="Post"></a>
                        </div>
                        <div class="content-holder">
                            <div class="entry-category style-2 color-dark-1-fixed">
                                <ul>
                                    <li>
                                        <a href="archive-layout1.html">SPORTS</a>
                                    </li>
                                </ul>
                            </div>
                            <h3 class="entry-title h3-small color-dark-1-fixed underline-animation"><a href="post-format-default.html" class="link-wrap">Virtual Reality (VR), The Use Computer Modeling</a></h3>
                            <ul class="entry-meta color-dark-1-fixed">
                                <li class="post-author">
                                    <a href="author.html">
                                        <img src="{{ asset('assets/frontend') }}/media/blog/profile5.webp" alt="Author">
                                        John Philipe
                                    </a>
                                </li>
                                <li>
                                    <i class="regular-clock-circle"></i>9 min read
                                </li>
                                <li>
                                    <i class="regular-eye"></i>9k
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="single-item">
                        <div class="figure-holder radius-default">
                            <a href="post-format-default.html" class="link-wrap figure-overlay img-height-100"><img width="250" height="168" src="{{ asset('assets/frontend') }}/media/blog/post40.webp" alt="Post"></a>
                        </div>
                        <div class="content-holder">
                            <div class="entry-category style-3 color-dark-1-fixed">
                                <ul>
                                    <li>
                                        <a href="archive-layout1.html">FOOD</a>
                                    </li>
                                </ul>
                            </div>
                            <h3 class="entry-title color-dark-1-fixed h3-small underline-animation"><a href="post-format-default.html" class="link-wrap">Reality Hosting, The Use Computer</a></h3>
                        </div>
                    </div>
                    <div class="single-item">
                        <div class="figure-holder radius-default">
                            <a href="post-format-default.html" class="link-wrap figure-overlay img-height-100"><img width="250" height="168" src="{{ asset('assets/frontend') }}/media/blog/post41.webp" alt="Post"></a>
                        </div>
                        <div class="content-holder">
                            <div class="entry-category style-3 color-dark-1-fixed">
                                <ul>
                                    <li>
                                        <a href="archive-layout1.html">EDUCATION</a>
                                    </li>
                                </ul>
                            </div>
                            <h3 class="entry-title color-dark-1-fixed h3-small underline-animation"><a href="post-format-default.html" class="link-wrap">Choices 101 Tips For Busy Women</a></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--=====================================-->
<!--=        Newsletter Area Start      =-->
<!--=====================================-->
<section class="newsletter-wrap-layout1 space-top-60 space-bottom-60 bg-color-light-1 transition-default">
    <div class="container">
        <div class="newsletter-box-layout1 box-border-dark-1 radius-default bg-color-perano">
            <h2 class="entry-title h2-medium f-w-700 color-dark-1-fixed">SUBSCRIBE TO OUR NEWSLETTER</h2>
            <p class="entry-description color-dark-1-fixed">Kurihara Harumi, born March 5, 1947, Shimoda, Shizuoka prefecture, Japan</p>
            <form action="#" class="newsletter-form box-border-dark-1 box-shadow-large shadow-style-2 shadow-fixed transition-default radius-default">
                <input type="email" class="email-input" placeholder="Email Address">
                <button type="submit" class="axil-btn">
                    Subscribe<i class="solid-navigation"></i>
                </button>
            </form>
            <ul class="elements-wrap img-height-100">
                <li><img width="57" height="53" src="{{ asset('assets/frontend') }}/media/elements/element1.webp" alt="Element"></li>
                <li><img width="120" height="186" src="{{ asset('assets/frontend') }}/media/elements/element2.webp" alt="Element"></li>
            </ul>
        </div>
    </div>
</section>
@endsection