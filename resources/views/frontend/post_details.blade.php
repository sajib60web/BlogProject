@extends('frontend.layouts.app')

@section('title', $page_name)

@section('mainContent')


        <!--=====================================-->
        <!--=       breadcrumb Area Start       =-->
        <!--=====================================-->
        <section class="breadcrumb-wrap-layout1 bg-color-old-lace">
            <div class="container">
                <div class="breadcrumb-layout1">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item " >Post</li>
                            <li class="breadcrumb-item active" aria-current="page">Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section>
        <!--=====================================-->
        <!--=          Post Area Start          =-->
        <!--=====================================-->
        <section class="space-top-60 space-bottom-60 single-blog-wrap1 bg-color-light-1 transition-default">
            <div class="container">
                <div class="row sticky-coloum-wrap">
                    <div class="col-lg-8 sticky-coloum-item">
                        <div class="single-blog-content content-layout1 pe-lg-4">
                            <div class="entry-category style-2 color-dark-1">
                                <ul>
                                    <li>
                                        <a href="{{route('category.posts',$post->category_id)}}">{{@$post->category->name}}</a>
                                    </li>
                                </ul>
                            </div>
                            <h1 class="entry-title color-dark-1">{{$post->title}}</h1>
                            <ul class="entry-meta color-dark-1">
                                <li class="post-author">
                                    by
                                    <a href="">
                                        {{@$post->user->name}}
                                    </a>
                                </li>
                                <li>
                                    <i class="regular-calendar-01"></i>{{\Carbon\Carbon::parse($post->created_at)->format('M d, Y')}}
                                </li>
                                <li>
                                    <i class="regular-clock-circle"></i>{{\Carbon\Carbon::parse($post->created_at)->diffForHumans()}}
                                </li>
                                <li>
                                    <i class="regular-eye"></i>{{$post->total_views}}
                                </li>
                                <li>
                                    <i class="regular-chatting"></i>2 Comments
                                </li>
                            </ul>
                            <div class="axil-social social-layout-1 size-small gap-12">
                                <ul>
                                    <li class="facebook">
                                        <a aria-label="Learn more from Facebook" href="https://facebook.com/">
                                            <i class="solid-facebook2"></i>
                                        </a>
                                    </li>
                                    <li class="instagram">
                                        <a aria-label="Learn more from Instagram" href="https://instagram.com/">
                                            <i class="regular-instagram"></i>
                                        </a>
                                    </li>
                                    <li class="mail-fast">
                                        <a aria-label="Learn more from Mail fast" href="https://mail-fast.com/">
                                            <i class="regular-mail-fast"></i>
                                        </a>
                                    </li>
                                    <li class="pinterest">
                                        <a aria-label="Learn more from Pinterest" href="https://pinterest.com/">
                                            <i class="solid-pinterest-01"></i>
                                        </a>
                                    </li>
                                    <li class="youtube">
                                        <a aria-label="Learn more from Youtube" href="https://youtube.com/">
                                            <i class="solid-youtube"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="mb-4 box-border-dark-1 radius-default transition-default">
                                 
                                <div class="figure-holder position-relative radius-default">
                                    @if ($post->post_type == App\Enums\PostType::VIDEO)
                                        <a href="{{@$post->video_url}}" aria-label="Youtube Video" class="play-btn size-large popup-youtube"><i class="solid-play"></i></a>
                                    @endif
                                    <a href="{{route('post.details',[$post->id,$post->title])}}" class="link-wrap img-height-100"><img width="1150" height="660" src="{{$post->image_url}}" alt="Post"></a>
                                 </div>

                            </div>
                            
                         

                          

                             <div>
                                {!! $post->content !!}
                             </div>
                            <div class="tag-share-wrap">
                                <div class="tagcloud-wrap">
                                    <h4 class="mb-2 h4-small">Tags:</h4>
                                    <div class="tagcloud">
                                        @foreach (explode(',',$post->tags) as $tag) 
                                            <a href="#" class="tag-cloud-link">
                                                <span class="icon-holder">
                                                    <i class="regular-taxi-1"></i>
                                                </span>{{$tag}}
                                            </a> 
                                        @endforeach
                                    </div>
                                </div>
                                <div class="share-wrap">
                                    <h4 class="mb-2 h4-small">Share:</h4>
                                    <div class="axil-social social-layout-1 size-large gap-12">
                                        <ul>
                                            <li class="facebook">
                                                <a aria-label="Learn more from Facebook" href="https://facebook.com/">
                                                    <i class="solid-facebook2"></i>
                                                </a>
                                            </li>
                                            <li class="instagram">
                                                <a aria-label="Learn more from Instagram" href="https://instagram.com/">
                                                    <i class="regular-instagram"></i>
                                                </a>
                                            </li>
                                            <li class="mail-fast">
                                                <a aria-label="Learn more from Mail fast" href="https://mail-fast.com/">
                                                    <i class="regular-mail-fast"></i>
                                                </a>
                                            </li>
                                            <li class="pinterest">
                                                <a aria-label="Learn more from Pinterest" href="https://pinterest.com/">
                                                    <i class="solid-pinterest-01"></i>
                                                </a>
                                            </li>
                                            <li class="youtube">
                                                <a aria-label="Learn more from Youtube" href="https://youtube.com/">
                                                    <i class="solid-youtube"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="author-wrap bg-color-mimosa">
                                <div class="author-thumb img-height-100">
                                    <img width="178" height="178" src="{{asset('/')}}assets/frontend/media/blog/author.webp" alt="Author Figure">
                                </div>
                                <div class="author-content">
                                    <h4 class="entry-title color-dark-1-fixed">Georges Embolo</h4>
                                    <div class="author-designation">Lead Designer</div>
                                    <p class="entry-description color-dark-1-fixed">While the law might seem obvious, designers often engage in creative work where they try to reinvent the wheel for the sake of novelty.</p>
                                    <div class="axil-social social-layout-2 color-dark-1-fixed size-medium gap-12">
                                        <ul>
                                            <li class="pinterest">
                                                <a aria-label="Learn more from Pinterest" href="https://pinterest.com/">
                                                    <i class="regular-pinterest"></i>
                                                </a>
                                            </li>
                                            <li class="instagram">
                                                <a aria-label="Learn more from Instagram" href="https://instagram.com/">
                                                    <i class="regular-instagram"></i>
                                                </a>
                                            </li>
                                            <li class="twitter">
                                                <a aria-label="Learn more from Twitter" href="https://twitter.com/">
                                                    <i class="regular-tweeter"></i>
                                                </a>
                                            </li>
                                            <li class="mail-fast">
                                                <a aria-label="Learn more from Mail Fast" href="https://mail-fast.com/">
                                                    <i class="regular-mail-fast"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="post-navigation">
                                <div class="post-box prev-post">
                                    <div class="figure-holder">
                                        <a href="post-format-default.html" class="link-wrap img-height-100"><img width="540" height="540" src="{{asset('/')}}assets/frontend/media/blog/post60.webp" alt="Post"></a>
                                    </div>
                                    <div class="content-holder">
                                        <a href="post-format-default.html" class="text-box prev-text">
                                            <div class="icon-holder"><i class="regular-arrow-left"></i></div>Previous Post
                                        </a>
                                        <h3 class="entry-title h3-small color-dark-1 underline-animation"><a href="post-format-default.html" class="link-wrap">Underwater Exercise Is Used Strengthen Weak Muscles</a></h3>
                                    </div>
                                </div>
                                <div class="post-box next-post">
                                    <div class="figure-holder">
                                        <a href="post-format-default.html" class="link-wrap img-height-100"><img width="540" height="540" src="{{asset('/')}}assets/frontend/media/blog/post61.webp" alt="Post"></a>
                                    </div>
                                    <div class="content-holder">
                                        <a href="post-format-default.html" class="text-box next-text">Next Post<div class="icon-holder"><i class="regular-arrow-right"></i></div></a>
                                        <h3 class="entry-title h3-small color-dark-1 underline-animation"><a href="post-format-default.html" class="link-wrap">The Science Skin-car A Long Way But There’s Still</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="post-comment">
                                <div class="section-heading heading-style-7">
                                    <h3 class="title h3-regular">7 Comments</h3>
                                </div>
                                <ul class="comment-list">
                                    <li>
                                        <div class="each-comment">
                                            <div class="comment-figure img-height-100">
                                                <img width="500" height="500" src="{{asset('/')}}assets/frontend/media/blog/post17.webp" alt="Comment">
                                            </div>
                                            <div class="comment-content">
                                                <h4 class="comment-title">Naiska Haack</h4>
                                                <div class="comment-meta"><span class="post-date">Oct 10, 2022</span></div>
                                                <p class="comment-comment">Creative work where they try to reinvent the wheel for the sake of novelty, we as designers are tasked with providing clients and users with new and inventive solutions.</p>
                                                <a href="#" class="item-btn">Reply</a>
                                            </div>
                                        </div>
                                        <ul class="children">
                                            <li>
                                                <div class="each-comment">
                                                    <div class="comment-figure img-height-100">
                                                        <img width="500" height="500" src="{{asset('/')}}assets/frontend/media/blog/post18.webp" alt="Comment">
                                                    </div>
                                                    <div class="comment-content">
                                                        <h4 class="comment-title">Simmy Mack</h4>
                                                        <div class="comment-meta"><span class="post-date">Oct 10, 2022</span></div>
                                                        <p class="comment-comment">Creative work where they try to reinvent the wheel for the sake of novelty, we as designers are tasked with providing clients and users with new and inventive solutions.</p>
                                                        <a href="#" class="item-btn">Reply</a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <div class="each-comment">
                                            <div class="comment-figure img-height-100">
                                                <img width="500" height="500" src="{{asset('/')}}assets/frontend/media/blog/post19.webp" alt="Comment">
                                            </div>
                                            <div class="comment-content">
                                                <h4 class="comment-title">Arlene McCoy</h4>
                                                <div class="comment-meta"><span class="post-date">Oct 10, 2022</span></div>
                                                <p class="comment-comment">Creative work where they try to reinvent the wheel for the sake of novelty, we as designers are tasked with providing clients and users with new and inventive solutions.</p>
                                                <a href="#" class="item-btn">Reply</a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="leave-comment">
                                <div class="section-heading heading-style-7">
                                    <h3 class="title h3-regular">Post A Comment</h3>
                                </div>
                                <p class="mb-4">Your email address will not be published. Required fields are marked *</p>
                                <form class="leave-form-box">
                                    <div class="row g-2">
                                        <div class="col-md-6 form-group">
                                            <input type="text" placeholder="Name" class="form-control" name="name" id="name" data-error="Name field is required" required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <input type="email" placeholder="Your E-mail*" class="form-control" name="email" id="leave-email" data-error="E-mail field is required" required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="col-12 form-group">
                                            <input type="checkbox" id="show-message" name="show-message" value="Bike">
                                            <label class="show-message-label" for="show-message">Don’t show this message again</label>
                                        </div>
                                        <div class="col-12 form-group">
                                            <div class="section-heading heading-style-7">
                                                <h3 class="title h3-regular">Leave a Reply</h3>
                                            </div>
                                            <textarea class="textarea form-control" placeholder="Message" name="message" id="leave-message" rows="5" cols="20" data-error="Message field is required" required></textarea>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="col-12 form-group mt-2">
                                            <button type="submit" data-toggle="modal" data-target="#exampleModalCenter" class="axil-btn axil-btn-fill btn-color-alter axil-btn-large"><span><span>Post
                                                        Comment</span></span></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 sticky-coloum-item">
                        <div class="sidebar-global sidebar-layout4">
                            <div class="sidebar-widget">
                                <div class="widget-banner banner-layout1">
                                    <div class="radius-default box-border-dark-1 img-height-100">
                                        <div class="figure-holder radius-medium">
                                            <img width="700" height="294" src="{{asset('/')}}assets/frontend/media/banner/banner2.webp" alt="Banner">
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="sidebar-widget">
                                <div class="widget-search search-layout1 radius-default padding-40 box-border-dark-1">
                                    <h3 class="title h3-medium">Search</h3>
                                    <p class="description">Type here & press enter</p>
                                    <form>
                                        <button aria-label="Search" type="button" class="icon-holder"><i class="regular-search-02"></i></button>
                                        <input type="text" class="form-control" placeholder="Search">
                                    </form>
                                </div>
                            </div>



                            <div class="sidebar-widget">
                                <div class="section-heading heading-style-6">
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
                                <div class="section-heading heading-style-6">
                                    <h3 class="title">Short Stories</h3>
                                </div>
                                <div class="widget-post post-layout1">
                                    <div class="post-box">
                                        <div class="figure-holder radius-default">
                                            <a href="post-format-default.html" class="link-wrap figure-overlay img-height-100"><img width="700" height="470" src="{{asset('/')}}assets/frontend/media/blog/post23.webp" alt="Post"></a>
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
                                            <a href="post-format-default.html" class="link-wrap figure-overlay img-height-100"><img width="140" height="140" src="{{asset('/')}}assets/frontend/media/blog/post14.webp" alt="Post"></a>
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
                                            <a href="post-format-default.html" class="link-wrap figure-overlay img-height-100"><img width="140" height="140" src="{{asset('/')}}assets/frontend/media/blog/post15.webp" alt="Post"></a>
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
                                            <a href="post-format-default.html" class="link-wrap figure-overlay img-height-100"><img width="140" height="140" src="{{asset('/')}}assets/frontend/media/blog/post16.webp" alt="Post"></a>
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
                                <div class="widget-banner banner-layout2">
                                    <div class="figure-holder radius-default box-border-dark-1">
                                        <a href="#" class="link-wrap img-height-100"><img width="700" height="772" src="{{asset('/')}}assets/frontend/media/banner/banner3.webp" alt="Banner"></a>
                                    </div>
                                </div>
                            </div>





                            <div class="sidebar-widget">
                                <div class="widget-newsletter newsletter-layout1 box-border-dark-1">
                                    <h2 class="title">NEWSLETTER THAT MAKES YOU HUNGRY!</h2>
                                    <div class="sub-title">Sign Up for free</div>
                                    <form action="#" class="newsletter-form">
                                        <input type="email" class="email-input" placeholder="Email Address">
                                        <button type="submit" class="axil-btn axil-btn-fill axil-btn-dark-fixed w-100 axil-btn-bold">
                                            Subscribe<i class="solid-navigation"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>



                            <div class="sidebar-widget">
                                <div class="section-heading heading-style-6">
                                    <h3 class="title">Recommended topics</h3>
                                </div>
                                <div class="widget-tagcloud tagcloud-layout4">
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



                        </div>



                    </div>
                </div>
            </div>
        </section>
        <section class="space-top-50 space-bottom-60 bg-color-light-2">
            <div class="container">
                <div class="section-heading heading-style-1">
                    <h2 class="title">Related Articles</h2>
                </div>
                <div class="position-relative">
                    <div id="post-slider-3" class="post-slider-3 gutter-30 outer-top-5 initially-none">
                        <div class="single-slide">
                            <div class="post-box-layout6 box-border-dark-1 radius-default padding-20 bg-color-scandal box-shadow-large shadow-style-2 transition-default">
                                <div class="figure-holder radius-default">
                                    <a href="post-format-default.html" class="link-wrap img-height-100"><img width="660" height="470" src="{{asset('/')}}assets/frontend/media/blog/post7.webp" alt="Post"></a>
                                </div>
                                <div class="content-holder">
                                    <div class="entry-category style-2 color-dark-1-fixed">
                                        <ul>
                                            <li>
                                                <a href="archive-layout1.html">FOOD</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <h3 class="entry-title color-dark-1-fixed underline-animation"><a href="post-format-default.html" class="link-wrap">Underwater Exercise Is Used Strengthen Muscles</a></h3>
                                    <ul class="entry-meta color-dark-1-fixed">
                                        <li class="post-author">
                                            <a href="author.html">
                                                <img src="{{asset('/')}}assets/frontend/media/blog/profile2.webp" alt="Author">
                                                Kristin Watson
                                            </a>
                                        </li>
                                        <li>
                                            <i class="regular-clock-circle"></i>5 min read
                                        </li>
                                        <li>
                                            <i class="regular-eye"></i>9k
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="single-slide">
                            <div class="post-box-layout6 box-border-dark-1 radius-default padding-20 bg-color-mimosa box-shadow-large shadow-style-2 transition-default">
                                <div class="figure-holder radius-default">
                                    <a href="post-format-default.html" class="link-wrap img-height-100"><img width="660" height="470" src="{{asset('/')}}assets/frontend/media/blog/post8.webp" alt="Post"></a>
                                </div>
                                <div class="content-holder">
                                    <div class="entry-category style-2 color-dark-1-fixed">
                                        <ul>
                                            <li>
                                                <a href="archive-layout1.html">SPORTS</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <h3 class="entry-title color-dark-1-fixed underline-animation"><a href="post-format-default.html" class="link-wrap">Beauty Of Deep Space. Billions Of In The Universe</a></h3>
                                    <ul class="entry-meta color-dark-1-fixed">
                                        <li class="post-author">
                                            <a href="author.html">
                                                <img src="{{asset('/')}}assets/frontend/media/blog/profile3.webp" alt="Author">
                                                Jenny Wilson
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
                        </div>
                        <div class="single-slide">
                            <div class="post-box-layout6 box-border-dark-1 radius-default padding-20 bg-color-selago box-shadow-large shadow-style-2 transition-default">
                                <div class="figure-holder radius-default">
                                    <a href="post-format-default.html" class="link-wrap img-height-100"><img width="660" height="470" src="{{asset('/')}}assets/frontend/media/blog/post9.webp" alt="Post"></a>
                                </div>
                                <div class="content-holder">
                                    <div class="entry-category style-2 color-dark-1-fixed">
                                        <ul>
                                            <li>
                                                <a href="archive-layout1.html">TECH</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <h3 class="entry-title color-dark-1-fixed underline-animation"><a href="post-format-default.html" class="link-wrap">Air Pods Pro With Wireless Used Strengthen Weak</a></h3>
                                    <ul class="entry-meta color-dark-1-fixed">
                                        <li class="post-author">
                                            <a href="author.html">
                                                <img src="{{asset('/')}}assets/frontend/media/blog/profile1.webp" alt="Author">
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
                        </div>
                        <div class="single-slide">
                            <div class="post-box-layout6 box-border-dark-1 radius-default padding-20 bg-color-old-lace box-shadow-large shadow-style-2 transition-default">
                                <div class="figure-holder radius-default">
                                    <a href="post-format-default.html" class="link-wrap img-height-100"><img width="660" height="470" src="{{asset('/')}}assets/frontend/media/blog/post11.webp" alt="Post"></a>
                                </div>
                                <div class="content-holder">
                                    <div class="entry-category style-2 color-dark-1-fixed">
                                        <ul>
                                            <li>
                                                <a href="archive-layout1.html">HISTORY</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <h3 class="entry-title color-dark-1-fixed underline-animation"><a href="post-format-default.html" class="link-wrap">Millions Of Book Are Written By Jhon Abraham</a></h3>
                                    <ul class="entry-meta color-dark-1-fixed">
                                        <li class="post-author">
                                            <a href="author.html">
                                                <img src="{{asset('/')}}assets/frontend/media/blog/profile2.webp" alt="Author">
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
                        <div class="single-slide">
                            <div class="post-box-layout6 box-border-dark-1 radius-default padding-20 bg-color-mimosa box-shadow-large shadow-style-2 transition-default">
                                <div class="figure-holder radius-default">
                                    <a href="post-format-default.html" class="link-wrap img-height-100"><img width="660" height="470" src="{{asset('/')}}assets/frontend/media/blog/post12.webp" alt="Post"></a>
                                </div>
                                <div class="content-holder">
                                    <div class="entry-category style-2 color-dark-1-fixed">
                                        <ul>
                                            <li>
                                                <a href="archive-layout1.html">TECH</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <h3 class="entry-title color-dark-1-fixed underline-animation"><a href="post-format-default.html" class="link-wrap">Air Pods Pro With Wireless Charging Case That Make</a></h3>
                                    <ul class="entry-meta color-dark-1-fixed">
                                        <li class="post-author">
                                            <a href="author.html">
                                                <img src="{{asset('/')}}assets/frontend/media/blog/profile5.webp" alt="Author">
                                                Alisa Michaels
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
                        </div>
                    </div>
                    <ul class="slider-navigation-layout1 position-layout2 color-light-1 nav-size-large">
                        <li id="post-prev-3" class="prev"><i class="regular-arrow-left"></i></li>
                        <li id="post-next-3" class="next"><i class="regular-arrow-right"></i></li>
                    </ul>
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
                        <li><img width="57" height="53" src="{{asset('/')}}assets/frontend/media/elements/element1.webp" alt="Element"></li>
                        <li><img width="120" height="186" src="{{asset('/')}}assets/frontend/media/elements/element2.webp" alt="Element"></li>
                    </ul>
                </div>
            </div>
        </section>
        
@endsection