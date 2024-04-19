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

                        @foreach ($treding_topic_posts as $treading_topic )
                            <div class="single-slide">
                                <div class="category-box-layout1">
                                    <div class="figure-holder">
                                        <a href="{{route('post.details',[$treading_topic->id,$treading_topic->title])}}" class="link-wrap img-height-100"><img width="150" height="150" src="{{ $treading_topic->image_url }} " alt="{{@$treading_topic->category->name}}"></a>
                                    </div>
                                    <div class="content-holder">
                                        <div class="entry-category style-1 color-dark-1-fixed">
                                            <ul>
                                                <li>
                                                    <a href="{{route('category.posts',$treading_topic->category_id)}}">{{@$treading_topic->category->name}}</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <h3 class="entry-title h3-extra-small color-dark-1-fixed underline-animation"><a href="archive-layout1.html" class="link-wrap">{{ \Str::limit(@$treading_topic->title, 50, ' ...') }}</a></h3>
                                    </div>
                                </div>
                            </div>
                        @endforeach
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
                @foreach ($latest_posts->take(1) as $latestOne)
                    <div class="post-box-layout1 box-border-dark-1 radius-default transition-default overflow-hidden">
                        <div id="videoPlayer-1" class="image-mask videoPlayer-1 radius-medium" style="background-image: url('{{@$latestOne->image_url}}"></div>
                        <div id="videoElement1" class="player" data-property="{
                    videoURL:'{{@$latestOne->video_url}}',
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
                            <h3 class="entry-title h3-large color-light-1-fixed underline-animation mb-0"><a href="{{route('post.details',[$latestOne->id,$latestOne->title])}}">{{@$latestOne->title}}</a></h3>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-lg-5">
                <div class="position-relative">
                    <div id="post-slider-1" class="post-slider-1 gutter-6 initially-none">

                        @foreach ($latest_posts as $latestPost)
                            <div class="single-slide">
                                <div class="post-box-layout2 box-border-dark-1 radius-default padding-30 bg-color-old-lace box-shadow-large shadow-style-1 transition-default">
                                    <div class="figure-holder radius-default">
                                        <a href="{{route('post.details',[$latestPost->id,$latestPost->title])}}" class="link-wrap img-height-100"><img width="635" height="365" src="{{ @$latestPost->image_url}}" alt="Post"></a>
                                    </div>
                                    <div class="content-holder">
                                        <div class="entry-category style-1 color-dark-1-fixed">
                                            <ul>
                                                <li>
                                                    <a href="{{route('category.posts',@$latestPost->category_id)}}">{{@$latestPost->category->name}}</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <h3 class="entry-title color-dark-1-fixed underline-animation"><a href="{{route('post.details',[@$latestPost->id,@$latestPost->title])}}" class="link-wrap">{{\Str::limit(@$latestPost->title,60,' ...')}}</a></h3>
                                        <p class="entry-description color-dark-1-fixed">{!! \Str::limit(strip_tags(@$latestPost->content), 250, ' ...') !!}</p>
                                        <ul class="entry-meta color-dark-1-fixed">
                                            <li class="post-author">
                                                {{-- <a href="author.html"> --}}
                                                    <img src="{{ $latestPost->user->image?? asset('default/user.webp') }}" alt="Author"/>{{@$latestPost->user->name}}
                                                {{-- </a> --}}
                                            </li>
                                            <li>
                                                <i class="regular-clock-circle"></i>{{\Carbon\Carbon::parse($latestPost->created_at)->diffForHumans()}}
                                            </li>
                                            <li>
                                                <i class="regular-eye"></i>{{@$latestPost->total_views}}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach

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

                @foreach ($slider_posts as $sliderPost)
                    
                    <div class="single-slide">
                        <div class="post-box-layout3 box-border-dark-1 radius-default transition-default">
                            <div class="figure-holder radius-medium">
                                <a href="{{route('post.details',[$sliderPost->id,$sliderPost->title])}}" class="link-wrap figure-overlay img-height-100"><img width="540" height="540" src="{{ @$sliderPost->image_url}}" alt="Post"></a>
                            </div>
                            <div class="content-holder">
                                <h3 class="entry-title h3-medium color-light-1-fixed underline-animation"><a href="{{route('post.details',[$sliderPost->id,$sliderPost->title])}}">{{\Str::limit($sliderPost->title,60,'...')}}</a></h3>
                            </div>
                        </div>
                    </div>
                @endforeach
      
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
            
            @foreach ($top_stories_posts as $topStoriesPost)
                <div class="col-lg-4">
                    <div class="post-box-layout4 box-border-dark-1 radius-default padding-20  @if($loop->index == 0) {{$color_classes[3]}} @else {{$color_classes[$loop->index]}} @endif  box-shadow-large shadow-style-2 transition-default">
                        <div class="figure-holder radius-default">
                            <a href="{{route('post.details',[$topStoriesPost->id,$topStoriesPost->title])}}" class="link-wrap img-height-100"><img width="660" height="470" src="{{ $topStoriesPost->image_url }}" alt="Post"></a>
                        </div>
                        <div class="content-holder">
                            <div class="entry-category style-2 color-dark-1-fixed">
                                <ul>
                                    <li>
                                        <a href="{{route('category.posts',$topStoriesPost->id)}}">{{@$topStoriesPost->category->name}}</a>
                                    </li>
                                </ul>
                            </div>
                            <h3 class="entry-title color-dark-1-fixed underline-animation"><a href="{{route('post.details',[$topStoriesPost->id,$topStoriesPost->title])}}" class="link-wrap">{{\Str::limit($topStoriesPost->title,60,'...')}}</a></h3>
                            <p class="entry-description color-dark-1-fixed">{!! \Str::limit(strip_tags(@$latestPost->content), 150, ' ...') !!}</p>
                            <ul class="entry-meta color-dark-1-fixed">
                                <li class="post-author">
                                    
                                        <img  src="{{ $latestPost->user->image?? asset('default/user.webp') }}"   alt="Author">
                                        {{@$latestPost->user->name}}
                                     
                                </li>
                                <li>
                                    <i class="regular-clock-circle"></i>{{\Carbon\Carbon::parse($latestPost->created_at)->diffForHumans()}}
                                </li>
                                <li>
                                    <i class="regular-eye"></i>{{@$latestPost->total_views}}
                                </li>
                            </ul>
                            <a href="{{route('post.details',[$latestPost->id,$latestPost->title])}}" class="btn-text color-dark-1-fixed">See Details<span class="icon-holder"><i class="regular-arrow-right"></i></span> </a>
                        </div>
                    </div>
                </div> 
            @endforeach
        </div>
    </div>
</section>

<!--=====================================-->
<!--=         Banner Area Start         =-->
<!--=====================================-->
{{-- <section class="banner-wrap-layout-1 space-top-60 bg-color-light-1 transition-default">
    <div class="container">
        <div class="banner-box-layout1 box-border-dark-1 radius-default">
            <div class="figure-holder radius-medium">
                <a href="#" class="link-wrap img-height-100"><img width="1232" height="230" src="{{ asset('assets/frontend') }}/media/banner/banner1.webp" alt="Banner"></a>
            </div>
        </div>
    </div>
</section> --}}


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
                        @foreach ($latest_stories_posts->take(1) as $latest_stories_single_post)    
                            <div class="post-box-layout5 box-border-dark-1 radius-default">
                                <div class="figure-holder radius-medium">
                                    <a href="{{route('post.details',[$latest_stories_single_post->id,$latest_stories_single_post->title])}}" class="link-wrap figure-overlay img-height-100"><img width="810" height="558" src="{{ @$latest_stories_single_post->image_url }}" alt="Post"></a>
                                </div>
                                <div class="content-holder">
                                    <div class="entry-category style-2 color-dark-1-fixed">
                                        <ul>
                                            <li>
                                                <a href="{{route('category.posts',$latest_stories_single_post->category_id)}}">{{@$latest_stories_single_post->category->name}}</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <h3 class="entry-title h3-large color-light-1-fixed underline-animation"><a href="{{route('post.details',[$latest_stories_single_post->id,$latest_stories_single_post->title])}}" class="link-wrap">{{\Str::limit($latest_stories_single_post->title,60,'...')}}</a></h3>
                                    <ul class="entry-meta color-light-1-fixed">
                                        <li class="post-author">
                                            {{-- <a href="author.html"> --}}
                                                <img  src="{{ $latestPost->user->image?? asset('default/user.webp') }}"   alt="Author">
                                                {{@$latestPost->user->name}}
                                            {{-- </a> --}}
                                        </li>
                                        <li>
                                            <i class="regular-clock-circle"></i>{{\Carbon\Carbon::parse($latestPost->created_at)->diffForHumans()}}
                                        </li>
                                        <li>
                                            <i class="regular-eye"></i>{{@$latestPost->total_views}}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @foreach ($latest_stories_posts->skip(1)->take(2) as $latest_stories_two_post)    

                    <div class="col-lg-6">
                        <div class="post-box-layout5 box-border-dark-1 radius-default padding-20 @if($loop->index == 0) {{$color_classes[2]}} @else {{$color_classes[3]}} @endif box-shadow-large shadow-style-2 transition-default">
                            <div class="figure-holder radius-default">
                                <a href="{{route('post.details',[$latest_stories_two_post->id,$latest_stories_two_post->title]) }}" class="link-wrap figure-overlay img-height-100"><img width="660" height="470" src="{{ $latest_stories_two_post->image_url }}" alt="Post"></a>
                            </div>
                            <div class="content-holder">
                                <div class="entry-category style-3 color-light-1-fixed">
                                    <ul>
                                        <li>
                                            <a href="{{route('category.posts',$latest_stories_two_post->category_id)}}">{{$latest_stories_two_post->category->name}}</a>
                                        </li>
                                    </ul>
                                </div>
                                <h3 class="entry-title h3-small color-light-1-fixed underline-animation mb-0"><a href="{{route('post.details',[$latest_stories_two_post->id,$latest_stories_two_post->title])}}" class="link-wrap">{{\Str::limit($latest_stories_two_post->title,60,'...')}}</a></h3>
                            </div>
                        </div>
                    </div> 
                    @endforeach
                </div>
            </div>
            <div class="col-lg-4">
                <div class="post-box-layout7 box-border-dark-1 radius-default padding-20 bg-color-scandal">

                    @foreach ($latest_stories_posts->skip(3) as $latest_stories_post) 
                        @if ($loop->index == 0) 
                        <div class="figure-holder radius-default">
                            <a href="{{route('post.details',[$latest_stories_post->id,$latest_stories_post->title])}}" class="link-wrap img-height-100"><img width="660" height="470" src="{{$latest_stories_post->image_url}}" alt="Post"></a>
                        </div>
                        <div class="content-holder">
                            <h3 class="entry-title h3-small color-dark-1-fixed underline-animation"><a href="{{route('post.details',[$latest_stories_post->id,$latest_stories_post->title])}}" class="link-wrap">{{\Str::limit($latest_stories_post->title,60,'...')}}</a></h3>
                            <ul class="entry-meta color-dark-1-fixed">
                                <li class="post-author">
                                    {{-- <a href="author.html"> --}}
                                       {{@$latest_stories_post->user->name}}
                                    {{-- </a> --}}
                                </li>
                                <li>
                                    <i class="regular-clock-circle"></i>{{\Carbon\Carbon::parse($latestPost->created_at)->diffForHumans()}}
                                </li>
                                <li>
                                    <i class="regular-eye"></i>{{@$latestPost->total_views}}
                                </li>
                            </ul>
                        </div> 
                        @else 
                            <div class="content-holder">
                                <h3 class="entry-title h3-small color-dark-1-fixed underline-animation"><a href="{{route('post.details',[$latest_stories_post->id,$latest_stories_post->title])}}" class="link-wrap">{{\Str::limit($latest_stories_post->title,60,'...')}}</a></h3>
                                <ul class="entry-meta color-dark-1-fixed">
                                    <li class="post-author">
                                        {{-- <a href="author.html"> --}}
                                            {{@$latest_stories_post->user->name}}
                                        {{-- </a> --}}
                                    </li>
                                    <li>
                                        <i class="regular-clock-circle"></i>{{\Carbon\Carbon::parse($latestPost->created_at)->diffForHumans()}}
                                    </li>
                                    <li>
                                        <i class="regular-eye"></i>{{@$latestPost->total_views}}
                                    </li>
                                </ul>
                            </div>
                        @endif
                    @endforeach
                  
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
            @if ($top_video_post)
                <div class="figure-holder position-relative radius-default">
                    <a href="{{@$top_video_post->video_url}}" aria-label="Youtube Video" class="play-btn size-large popup-youtube"><i class="solid-play"></i></a>
                    <a href="{{route('post.details',[$top_video_post->id,$top_video_post->title])}}" class="link-wrap img-height-100"><img width="1150" height="660" src="{{$top_video_post->image_url}}" alt="Post"></a>
                </div>
            @endif
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

                            @foreach ($top_video_recc_posts as $recommended_post)    
                                <div class="col">
                                    <div class="post-box-layout8 radius-default">
                                        <div class="figure-holder radius-default">
                                            <a href="{{$recommended_post->video_url}}" aria-label="Youtube Video" class="play-btn size-small popup-youtube not-animation"><i class="solid-play"></i></a>
                                            <a href="{{route('post.details',[$recommended_post->id,$recommended_post->title])}}" class="link-wrap img-height-100"><img width="140" height="140" src="{{ $recommended_post->image_url }}" alt="Post"></a>
                                        </div>
                                        <div class="content-holder">
                                            <div class="entry-category style-3 color-dark-1-fixed">
                                                <ul>
                                                    <li>
                                                        <a href="{{route('category.posts',$recommended_post->category_id)}}">{{@$recommended_post->category->name}}</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <h3 class="entry-title h3-small color-dark-1-fixed underline-animation"><a href="{{route('post.details',[$recommended_post->id,$recommended_post->title])}}" class="link-wrap">{{\Str::limit($recommended_post->title,60,'...')}}</a></h3>
                                            <ul class="entry-meta color-dark-1-fixed">
                                                <li>
                                                    <i class="regular-calendar"></i>{{\Carbon\Carbon::parse($recommended_post->crated_at)->format('M,d Y')}}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div> 
                            @endforeach
                             
                        </div>
                    </div>
                    <div class="tab-pane fade" id="two">
                        <div class="row g-4 row-cols-1 row-cols-lg-2 row-cols-xl-3">
                           
                            @foreach ($top_video_latest_posts as $top_video_latest_post)    
                            <div class="col">
                                <div class="post-box-layout8 radius-default">
                                    <div class="figure-holder radius-default">
                                        <a href="{{$top_video_latest_post->video_url}}" aria-label="Youtube Video" class="play-btn size-small popup-youtube not-animation"><i class="solid-play"></i></a>
                                        <a href="{{route('post.details',[$top_video_latest_post->id,$top_video_latest_post->title])}}" class="link-wrap img-height-100"><img width="140" height="140" src="{{ $top_video_latest_post->image_url }}" alt="Post"></a>
                                    </div>
                                    <div class="content-holder">
                                        <div class="entry-category style-3 color-dark-1-fixed">
                                            <ul>
                                                <li>
                                                    <a href="{{route('category.posts',$top_video_latest_post->category_id)}}">{{@$top_video_latest_post->category->name}}</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <h3 class="entry-title h3-small color-dark-1-fixed underline-animation"><a href="{{route('post.details',[$top_video_latest_post->id,$top_video_latest_post->title])}}" class="link-wrap">{{\Str::limit($top_video_latest_post->title,60,'...')}}</a></h3>
                                        <ul class="entry-meta color-dark-1-fixed">
                                            <li>
                                                <i class="regular-calendar"></i>{{\Carbon\Carbon::parse($top_video_latest_post->crated_at)->format('M,d Y')}}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div> 
                        @endforeach

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

                    @foreach ($recent_article_posts as $recentArticlePost)         
                        <div class="col-12">
                            <div class="post-box-layout9 box-border-dark-1 radius-default padding-20 figure-scale-animation {{$color_classes[$loop->index]}} box-shadow-large shadow-style-2 transition-default">
                                <div class="figure-holder radius-default">
                                    <a href="{{route('post.details',[$recentArticlePost->id,$recentArticlePost->title])}}" class="link-wrap img-height-100"><img width="500" height="500" src="{{$recentArticlePost->image_url}}" alt="Post"></a>
                                </div>
                                <div class="content-holder">
                                    <div>
                                        <div class="entry-category style-2 color-dark-1-fixed">
                                            <ul>
                                                <li>
                                                    <a href="{{route('category.posts',$recentArticlePost->category_id)}}">{{@$recentArticlePost->category->name}}</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <h3 class="entry-title color-dark-1-fixed underline-animation"><a href="{{route('post.details',[$recentArticlePost->id,$recentArticlePost->title])}}" class="link-wrap">{{\Str::limit($recentArticlePost->title,60,'...')}}</a></h3>
                                        <p class="entry-description color-dark-1-fixed">{!! \Str::limit(strip_tags(@$recentArticlePost->content), 250, ' ...') !!}</p>
                                        <ul class="entry-meta color-dark-1-fixed">
                                            <li class="post-author">
                                                <a href="author.html">
                                                    <img  src="{{ $recentArticlePost->user->image?? asset('default/user.webp') }}"  alt="Author">
                                                    {{@$recentArticlePost->user->name}}
                                                </a>
                                            </li>
                                            <li>
                                                <i class="regular-clock-circle"></i>{{\Carbon\Carbon::parse($recentArticlePost->created_at)->diffForHumans()}}
                                            </li>
                                            <li>
                                                <i class="regular-eye"></i>{{$recentArticlePost->total_views}}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
               
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
                                @foreach (App\Models\Category::where('parent_id',0)->get() as $explodeCategory) 
                                    @if ($explodeCategory->posts->count() > 0)
                                        <li>
                                            <a href="{{route('category.posts',$explodeCategory->id)}}">{{@$explodeCategory->name}}</a>({{@$explodeCategory->posts->count()}})
                                        </li> 
                                    @endif
                                @endforeach
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
                            @foreach ($latest_short_stories_posts as $short_stories_post)
                                
                            @if ($loop->index == 0) 
                                <div class="post-box">
                                    <div class="figure-holder radius-default">
                                        <a href="{{route('post.details',[$short_stories_post->id,$short_stories_post->title])}}" class="link-wrap figure-overlay img-height-100"><img width="700" height="470" src="{{ $short_stories_post->image_url }}" alt="Post"></a>
                                    </div>
                                    <div class="content-holder">
                                        <h3 class="entry-title color-light-1-fixed h3-small underline-animation"><a href="{{route('post.details',[$short_stories_post->id,$short_stories_post->title])}}" class="link-wrap">{{\Str::limit($short_stories_post->title,60,'...')}}</a></h3>
                                        <ul class="entry-meta color-light-1-fixed">
                                            <li>
                                                <i class="regular-clock-circle"></i>{{\Carbon\Carbon::parse($short_stories_post->created_at)->diffForHumans()}}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            @else
                                <div class="post-box">
                                    <div class="figure-holder radius-default">
                                        <a href="{{route('post.details',[$short_stories_post->id,$short_stories_post->title])}}" class="link-wrap figure-overlay img-height-100"><img width="140" height="140" src="{{ $short_stories_post->image_url }}" alt="Post"></a>
                                    </div>
                                    <div class="content-holder">
                                        <h3 class="entry-title color-dark-1 underline-animation h3-extra-small"><a href="{{route('post.details',[$short_stories_post->id,$short_stories_post->title])}}" class="link-wrap">{{\Str::limit($short_stories_post->title,60,'...')}}</a></h3>
                                        <ul class="entry-meta color-dark-1">
                                            <li>
                                                <i class="regular-clock-circle"></i>{{\Carbon\Carbon::parse($short_stories_post->created_at)->diffForHumans()}}
                                            </li>
                                        </ul>
                                    </div>
                                </div> 
                            @endif
                            @endforeach
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
                @foreach ($recent_stories_article_posts->take(1) as  $recentStoriesSingleArticle)   
                    <div class="post-box-layout10 box-border-dark-1 radius-default both-side-equal">
                        <div class="figure-holder radius-medium">
                            <a href="{{route('post.details',[$recentStoriesSingleArticle->id,$recentStoriesSingleArticle->title])}}" class="link-wrap figure-overlay img-height-100"><img width="630" height="500" src="{{ $recentStoriesSingleArticle->image_url }}" alt="Post"></a>
                        </div>
                        <div class="content-holder">
                            <div class="entry-category style-2 color-dark-1-fixed">
                                <ul>
                                    <li>
                                        <a href="{{route('category.posts',$recentStoriesSingleArticle->category_id)}}">{{$recentStoriesSingleArticle->category->name}}</a>
                                    </li>
                                </ul>
                            </div>
                            <h3 class="entry-title h3-large color-light-1-fixed underline-animation"><a href="{{route('post.details',[$recentStoriesSingleArticle->id,$recentStoriesSingleArticle->title])}}" class="link-wrap">{{\Str::limit($recentStoriesSingleArticle->title,60,'...')}}</a></h3>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-lg-6">
                <div class="row g-3">
                    @foreach ($recent_stories_article_posts->skip(1) as  $recentStoriesArticle)  
                    <div class="col-md-6 col-12">
                        <div class="post-box-layout11 box-border-dark-1 radius-default padding-20 {{$color_classes[$loop->index]}} box-shadow-small shadow-style-2 transition-default">
                            <div class="figure-holder radius-default">
                                <a href="{{route('post.details',[$recentStoriesArticle->id,$recentStoriesArticle->title])}}" class="link-wrap img-height-100"><img width="480" height="344" src="{{ $recentStoriesArticle->image_url }}" alt="Post"></a>
                            </div>
                            <div class="content-holder">
                                <div class="entry-category style-2 color-dark-1-fixed">
                                    <ul>
                                        <li>
                                            <a href="{{route('category.posts',$recentStoriesArticle->category_id)}}">{{@$recentStoriesArticle->category->name}}</a>
                                        </li>
                                    </ul>
                                </div>
                                <h3 class="entry-title h3-small color-dark-1-fixed underline-animation"><a href="{{route('post.details',[$recentStoriesArticle->id,$recentStoriesArticle->title])}}" class="link-wrap">{{\Str::limit(@$recentStoriesArticle->title,60,'...')}}</a></h3>
                            </div>
                        </div>
                    </div>
                    @endforeach
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

            @foreach ($category_latest_posts as  $groupcategory)
                <div class="col-lg-4">
                    <div class="post-box-layout12 box-border-dark-1 radius-default padding-20 @if($loop->index == 0) bg-color-scandal @elseif($loop->index == 1) bg-color-mimosa @else bg-color-old-lace  @endif box-shadow-large shadow-style-2 transition-default">
                        @foreach ($groupcategory as $categoryPost)
                            @if ($loop->index == 0)
                                <div class="single-item">
                                    <div class="figure-holder radius-default">
                                        <a href="{{route('post.details',[$categoryPost->id,$categoryPost->title])}}" class="link-wrap img-height-100"><img width="660" height="440" src="{{ @$categoryPost->image_url }}" alt="Post"></a>
                                    </div>
                                    <div class="content-holder">
                                        <div class="entry-category style-2 color-dark-1-fixed">
                                            <ul>
                                                <li>
                                                    <a href="{{route('category.posts',$categoryPost->category_id)}}">{{@$categoryPost->category->name}}</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <h3 class="entry-title h3-small color-dark-1-fixed underline-animation"><a href="{{route('post.details',[$categoryPost->id,$categoryPost->title])}}" class="link-wrap">{{\Str::limit($categoryPost->title,60,'...')}}</a></h3>
                                        <ul class="entry-meta color-dark-1-fixed">
                                            <li class="post-author">
                                                <a href="author.html">
                                                    <img src="{{ $categoryPost->user->image ?? asset('default/user.webp') }}" alt="Author">
                                                    {{@$categoryPost->user->name}}
                                                </a>
                                            </li>
                                            <li>
                                                <i class="regular-clock-circle"></i>{{\Carbon\Carbon::parse($categoryPost->created_at)->diffForHumans()}}
                                            </li>
                                            <li>
                                                <i class="regular-eye"></i>{{$categoryPost->total_views}}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            @else
                                <div class="single-item">
                                    <div class="figure-holder radius-default">
                                        <a href="{{route('post.details',[$categoryPost->id,$categoryPost->title])}}" class="link-wrap figure-overlay img-height-100"><img width="250" height="168" src="{{ @$categoryPost->image_url }}" alt="Post"></a>
                                    </div>
                                    <div class="content-holder">
                                        <div class="entry-category style-3 color-dark-1-fixed">
                                            <ul>
                                                <li>
                                                    <a href="{{route('category.posts',$categoryPost->category_id)}}">{{@$categoryPost->category->name}}</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <h3 class="entry-title color-dark-1-fixed h3-small underline-animation"><a href="{{route('post.details',[$categoryPost->id,$categoryPost->title])}}" class="link-wrap">{{\Str::limit($categoryPost->title,30,'...')}}</a></h3>
                                    </div>
                                </div>
                            @endif    
                        
                        @endforeach
                    </div>
                </div>
            @endforeach
           
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
