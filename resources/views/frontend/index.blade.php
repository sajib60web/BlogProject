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
                        @foreach ($treding_topic_posts as $treading_topic)
                            <div class="single-slide">
                                <div class="category-box-layout1">
                                    <div class="figure-holder">
                                        <a href="{{route('post.details',[$treading_topic->id,$treading_topic->slug])}}" class="link-wrap img-height-100">
                                            <img style="height: 100px; width: 100px;" src="{{ $treading_topic->image_url }} " alt="{{@$treading_topic->category->name}}">
                                        </a>
                                    </div>
                                    <div class="content-holder">
                                        <div class="entry-category style-1 color-dark-1-fixed">
                                            <ul>
                                                <li>
                                                    <a href="{{route('category.posts',[$treading_topic->category_id,$treading_topic->category->slug])}}">{{@$treading_topic->category->name}}</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <h3 class="entry-title h3-extra-small color-dark-1-fixed underline-animation"><a href="{{route('post.details',[$treading_topic->id,$treading_topic->slug])}}" class="link-wrap">{{ \Str::limit(@$treading_topic->title, 50, ' ...') }}</a></h3>
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
                @foreach ($main_frame as $latestOne)
                    <div class="post-box-layout1 box-border-dark-1 radius-default transition-default overflow-hidden" style="height: 550px;">
                        {{-- <div id="videoPlayer-1" class="image-mask videoPlayer-1 radius-medium" style="background-image: url('{{@$latestOne->image_url}}');background-repeat: no-repeat;height: 100%; width: 100%;"></div> --}}
                        <img style="width: 100%; height: 100%; !important;" src="{{ @$latestOne->image_url}}" alt="Post">
                        <div class="content-holder">
                            <h3 class="entry-title h3-large color-light-1-fixed underline-animation mb-0">
                                <a href="{{route('post.details',[$latestOne->id,$latestOne->slug])}}">{{@$latestOne->title}}</a>
                            </h3>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-lg-5">
                <div class="position-relative">
                    <div id="post-slider-1" class="post-slider-1 gutter-6 initially-none">
                        @foreach ($main_frame_sliders as $latestPost)
                            <div class="single-slide">
                                <div class="post-box-layout2 box-border-dark-1 radius-default padding-30 bg-color-old-lace box-shadow-large shadow-style-1 transition-default" style="height: 550px;">
                                    <div class="figure-holder radius-default">
                                        <a href="{{route('post.details',[$latestPost->id,$latestPost->slug])}}" class="link-wrap">
                                            <img style="width: 100%; height: 250px !important;" src="{{ @$latestPost->image_url}}" alt="Post">
                                        </a>
                                    </div>
                                    <div class="content-holder">
                                        <div class="entry-category style-1 color-dark-1-fixed">
                                            <ul>
                                                <li>
                                                    <a href="{{route('category.posts',[@$latestPost->category_id,$latestPost->category->slug])}}">
                                                        {{@$latestPost->category->name}}
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <h3 class="entry-title color-dark-1-fixed underline-animation"><a href="{{route('post.details',[@$latestPost->id,@$latestPost->slug])}}" class="link-wrap">{{\Str::limit(@$latestPost->title,60,' ...')}}</a></h3>
                                        <p class="entry-description color-dark-1-fixed">{!! \Str::limit(strip_tags(@$latestPost->content), 150, ' ...') !!}</p>
                                        <ul class="entry-meta color-dark-1-fixed">
                                            @if ($latestPost->user->id)
                                                <li class="post-author">
                                                    <a href="{{ route('post.author',@$latestPost->user->id) }}">
                                                        <img src="{{ $latestPost->user->image?? asset('default/user.webp') }}" alt="Author"/>{{@$latestPost->user->name}}
                                                    </a>
                                                </li>
                                            @endif
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
                                <a href="{{route('post.details',[$sliderPost->id,$sliderPost->slug])}}" class="link-wrap figure-overlay img-height-100">
                                    <img style="height: 300px;width: 100%;" src="{{ @$sliderPost->image_url}}" alt="Post">
                                </a>
                            </div>
                            <div class="content-holder">
                                <h3 class="entry-title h3-medium color-light-1-fixed underline-animation"><a href="{{route('post.details',[$sliderPost->id,$sliderPost->slug])}}">{{\Str::limit($sliderPost->title,60,'...')}}</a></h3>
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
        </div>
        <div class="row g-3">
            @foreach ($top_stories_posts as $topStoriesPost)
                <div class="col-lg-4">
                    <div class="post-box-layout4 box-border-dark-1 radius-default padding-20  @if($loop->index == 0) {{$color_classes[3]}} @else {{$color_classes[$loop->index]}} @endif  box-shadow-large shadow-style-2 transition-default" style="height: 620px;">
                        <div class="figure-holder radius-default">
                            <a href="{{route('post.details',[$topStoriesPost->id,$topStoriesPost->slug])}}" class="link-wrap img-height-100">
                                <img style="height: 250px; width: 100%;" src="{{ $topStoriesPost->image_url }}" alt="Post">
                            </a>
                        </div>
                        <div class="content-holder">
                            <div class="entry-category style-2 color-dark-1-fixed">
                                <ul>
                                    <li>
                                        <a href="{{route('category.posts',[$topStoriesPost->id,$topStoriesPost->category->slug])}}">{{@$topStoriesPost->category->name}}</a>
                                    </li>
                                </ul>
                            </div>
                            <h3 class="entry-title color-dark-1-fixed underline-animation">
                                <a href="{{route('post.details',[$topStoriesPost->id,$topStoriesPost->slug])}}" class="link-wrap">
                                    {{\Str::limit($topStoriesPost->title,45,'...')}}
                                </a>
                            </h3>
                            <p class="entry-description color-dark-1-fixed">{!! \Str::limit(strip_tags(@$topStoriesPost->content), 100, ' ...') !!}</p>
                            <ul class="entry-meta color-dark-1-fixed">
                                @if ($topStoriesPost->user->id)
                                    <li class="post-author">
                                        <a href="{{ route('post.author',@$topStoriesPost->user->id) }}">
                                            <img  src="{{ $topStoriesPost->user->image?? asset('default/user.webp') }}"   alt="Author">
                                            {{@$topStoriesPost->user->name}}
                                        </a>
                                    </li>
                                @endif
                                <li>
                                    <i class="regular-clock-circle"></i>{{\Carbon\Carbon::parse($topStoriesPost->created_at)->diffForHumans()}}
                                </li>
                                <li>
                                    <i class="regular-eye"></i>{{@$topStoriesPost->total_views}}
                                </li>
                            </ul>
                            <a href="{{route('post.details',[$topStoriesPost->id,$topStoriesPost->slug])}}" class="btn-text color-dark-1-fixed">See Details<span class="icon-holder"><i class="regular-arrow-right"></i></span> </a>
                        </div>
                    </div>
                </div>
            @endforeach
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
                        @php($latest_stories_main_id = 0)
                        @foreach ($latest_stories_main as $latest_stories_single_post)
                            <div class="post-box-layout5 box-border-dark-1 radius-default">
                                <div class="figure-holder radius-medium">
                                    <a href="{{route('post.details',[$latest_stories_single_post->id,$latest_stories_single_post->slug])}}" class="link-wrap figure-overlay img-height-100"><img width="810" height="558" src="{{ @$latest_stories_single_post->image_url }}" alt="Post"></a>
                                </div>
                                <div class="content-holder">
                                    <div class="entry-category style-2 color-dark-1-fixed">
                                        <ul>
                                            <li>
                                                <a href="{{route('category.posts',[$latest_stories_single_post->category_id,$latest_stories_single_post->category->slug])}}">{{@$latest_stories_single_post->category->name}}</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <h3 class="entry-title h3-large color-light-1-fixed underline-animation"><a href="{{route('post.details',[$latest_stories_single_post->id,$latest_stories_single_post->slug])}}" class="link-wrap">{{\Str::limit($latest_stories_single_post->title,60,'...')}}</a></h3>
                                    <ul class="entry-meta color-light-1-fixed">
                                        @if (isset($latest_stories_single_post->user->id))
                                            <li class="post-author">
                                                <a href="{{ route('post.author',@$latest_stories_single_post->user->id) }}">
                                                    <img  src="{{ $latest_stories_single_post->user->image?? asset('default/user.webp') }}"   alt="Author">
                                                    {{@$latest_stories_single_post->user->name}}
                                                </a>
                                            </li>
                                        @endif
                                        <li>
                                            <i class="regular-clock-circle"></i>{{\Carbon\Carbon::parse($latest_stories_single_post->created_at)->diffForHumans()}}
                                        </li>
                                        <li>
                                            <i class="regular-eye"></i>{{@$latest_stories_single_post->total_views}}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            @php($latest_stories_main_id = $latest_stories_single_post->id)
                        @endforeach
                    </div>
                    @foreach ($latest_stories_sub as $latest_stories_two_post)
                    <div class="col-lg-6">
                        <div class="post-box-layout5 box-border-dark-1 radius-default padding-20 @if($loop->index == 0) {{$color_classes[2]}} @else {{$color_classes[3]}} @endif box-shadow-large shadow-style-2 transition-default">
                            <div class="figure-holder radius-default">
                                <a href="{{route('post.details',[$latest_stories_two_post->id,$latest_stories_two_post->slug]) }}" class="link-wrap figure-overlay img-height-100">
                                    <img style="height: 250px; width: 100%;" src="{{ $latest_stories_two_post->image_url }}" alt="Post">
                                </a>
                            </div>
                            <div class="content-holder">
                                <div class="entry-category style-3 color-light-1-fixed">
                                    <ul>
                                        <li>
                                            <a href="{{route('category.posts',[$latest_stories_two_post->category_id,$latest_stories_two_post->category->slug])}}">{{$latest_stories_two_post->category->name}}</a>
                                        </li>
                                    </ul>
                                </div>
                                <h3 class="entry-title h3-small color-light-1-fixed underline-animation mb-0"><a href="{{route('post.details',[$latest_stories_two_post->id,$latest_stories_two_post->slug])}}" class="link-wrap">{{\Str::limit($latest_stories_two_post->title,60,'...')}}</a></h3>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-4">
                <div class="post-box-layout7 box-border-dark-1 radius-default padding-20 bg-color-scandal">
                    @foreach ($latest_stories_right_main as $latest_stories_post)
                        <div class="figure-holder radius-default">
                            <a href="{{route('post.details',[$latest_stories_post->id,$latest_stories_post->slug])}}" class="link-wrap img-height-100">
                                <img style="width: 100%; height: 265px;" src="{{$latest_stories_post->image_url}}" alt="Post">
                            </a>
                        </div>
                        <div class="content-holder">
                            <h3 class="entry-title h3-small color-dark-1-fixed underline-animation"><a href="{{route('post.details',[$latest_stories_post->id,$latest_stories_post->slug])}}" class="link-wrap">{{\Str::limit($latest_stories_post->title,60,'...')}}</a></h3>
                            <ul class="entry-meta color-dark-1-fixed">
                                @if (isset($latest_stories_post->user->id))
                                    <li class="post-author">
                                        <a href="{{ route('post.author',@$latest_stories_post->user->id) }}">
                                        {{@$latest_stories_post->user->name}}
                                        </a>
                                    </li>
                                @endif
                                <li>
                                    <i class="regular-clock-circle"></i>{{\Carbon\Carbon::parse($latest_stories_post->created_at)->diffForHumans()}}
                                </li>
                                <li>
                                    <i class="regular-eye"></i>{{@$latest_stories_post->total_views}}
                                </li>
                            </ul>
                        </div>
                    @endforeach
                    @foreach ($latest_stories_right_sub as $latest_stories_post_s)
                        <div class="content-holder">
                            <h3 class="entry-title h3-small color-dark-1-fixed underline-animation"><a href="{{route('post.details',[$latest_stories_post_s->id,$latest_stories_post_s->slug])}}" class="link-wrap">{{\Str::limit($latest_stories_post_s->title,60,'...')}}</a></h3>
                            <ul class="entry-meta color-dark-1-fixed">
                                @if (isset($latest_stories_post_s->user->id))
                                    <li class="post-author">
                                        <a href="{{ route('post.author',@$latest_stories_post_s->user->id) }}">
                                            {{@$latest_stories_post_s->user->name}}
                                        </a>
                                    </li>
                                @endif
                                <li>
                                    <i class="regular-clock-circle"></i>{{\Carbon\Carbon::parse($latest_stories_post_s->created_at)->diffForHumans()}}
                                </li>
                                <li>
                                    <i class="regular-eye"></i>{{@$latest_stories_post_s->total_views}}
                                </li>
                            </ul>
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
<section class="post-wrap-layout5 space-top-50 bg-color-light-1 transition-default">
    <div class="container">
        <div class="section-heading heading-style-1">
            <h2 class="title">Top Videos</h2>
        </div>
        <div class="padding-40 pxy-md-30 pxy-sm-20 bg-color-mimosa box-border-dark-1 radius-default">
            @if ($top_video_post)
                <div class="figure-holder position-relative radius-default">
                    <a href="{{@$top_video_post->video_url}}" aria-label="Youtube Video" class="play-btn size-large popup-youtube"><i class="solid-play"></i></a>
                    <a href="{{route('post.details',[$top_video_post->id,$top_video_post->slug])}}" class="link-wrap img-height-100">
                        <img width="1150" height="660" src="{{$top_video_post->image_url}}" alt="Post">
                    </a>
                </div>
            @endif
            <div class="multi-posts-layout1">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#one">Recommended</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#two">Latest</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade" id="one">
                        <div class="row g-3 row-cols-1 row-cols-lg-2 row-cols-xl-3">
                            @foreach ($top_video_recc_posts as $recommended_post)
                                <div class="col">
                                    <div class="post-box-layout8 radius-default">
                                        <div class="figure-holder radius-default">
                                            {{-- <a href="{{$recommended_post->video_url}}" aria-label="Youtube Video" class="play-btn size-small popup-youtube not-animation"><i class="solid-play"></i></a> --}}
                                            <a href="{{route('post.details',[$recommended_post->id,$recommended_post->slug])}}" class="link-wrap img-height-100">
                                                <img style="width: 100%; height: 100px;" src="{{ $recommended_post->image_url }}" alt="Post">
                                            </a>
                                        </div>
                                        <div class="content-holder">
                                            <div class="entry-category style-3 color-dark-1-fixed">
                                                <ul>
                                                    <li>
                                                        <a href="{{route('category.posts',[$recommended_post->category_id,$recommended_post->category->slug])}}">{{@$recommended_post->category->name}}</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <h3 class="entry-title h3-small color-dark-1-fixed underline-animation"><a href="{{route('post.details',[$recommended_post->id,$recommended_post->slug])}}" class="link-wrap">{{\Str::limit($recommended_post->title,60,'...')}}</a></h3>
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
                    <div class="tab-pane fade active show" id="two">
                        <div class="row g-4 row-cols-1 row-cols-lg-2 row-cols-xl-3">
                            @foreach ($top_video_latest_posts as $top_video_latest_post)
                            <div class="col">
                                <div class="post-box-layout8 radius-default">
                                    <div class="figure-holder radius-default">
                                        {{-- <a href="{{$top_video_latest_post->video_url}}" aria-label="Youtube Video" class="play-btn size-small popup-youtube not-animation"><i class="solid-play"></i></a> --}}
                                        <a href="{{route('post.details',[$top_video_latest_post->id,$top_video_latest_post->slug])}}" class="link-wrap img-height-100">
                                            <img style="width: 100%; height: 100px;" src="{{ $top_video_latest_post->image_url }}" alt="Post">
                                        </a>
                                    </div>
                                    <div class="content-holder">
                                        <div class="entry-category style-3 color-dark-1-fixed">
                                            <ul>
                                                <li>
                                                    <a href="{{route('category.posts',[$top_video_latest_post->category_id,$top_video_latest_post->category->slug])}}">{{@$top_video_latest_post->category->name}}</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <h3 class="entry-title h3-small color-dark-1-fixed underline-animation"><a href="{{route('post.details',[$top_video_latest_post->id,$top_video_latest_post->slug])}}" class="link-wrap">{{\Str::limit($top_video_latest_post->title,60,'...')}}</a></h3>
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
                    @foreach ($recent_article_posts->take(6) as $recentArticlePost)
                        <div class="col-12">
                            <div class="post-box-layout9 box-border-dark-1 radius-default padding-20 figure-scale-animation {{$color_classes[$loop->index]}} box-shadow-large shadow-style-2 transition-default">
                                <div class="figure-holder radius-default">
                                    <a href="{{route('post.details',[$recentArticlePost->id,$recentArticlePost->slug])}}" class="link-wrap img-height-100">
                                        <img style="width: 100%; height: 260px;" src="{{$recentArticlePost->image_url}}" alt="Post">
                                    </a>
                                </div>
                                <div class="content-holder">
                                    <div>
                                        <div class="entry-category style-2 color-dark-1-fixed">
                                            <ul>
                                                <li>
                                                    <a href="{{route('category.posts',[$recentArticlePost->category_id,$recentArticlePost->category->slug])}}">{{@$recentArticlePost->category->name}}</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <h3 class="entry-title color-dark-1-fixed underline-animation"><a href="{{route('post.details',[$recentArticlePost->id,$recentArticlePost->slug])}}" class="link-wrap">{{\Str::limit($recentArticlePost->title,60,'...')}}</a></h3>
                                        <p class="entry-description color-dark-1-fixed">{!! \Str::limit(strip_tags(@$recentArticlePost->content), 250, ' ...') !!}</p>
                                        <ul class="entry-meta color-dark-1-fixed">
                                            @if (isset($recentArticlePost->user->id))
                                                <li class="post-author">
                                                    <a href="{{ route('post.author',@$recentArticlePost->user->id) }}">
                                                        <img  src="{{ $recentArticlePost->user->image?? asset('default/user.webp') }}"  alt="Author">
                                                        {{@$recentArticlePost->user->name}}
                                                    </a>
                                                </li>
                                            @endif
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
                    @foreach ($recent_article_posts->skip(6) as $recentArticlePostt)
                        <div class="col-12 mb-3">
                            <div class="post-box-layout9 box-border-dark-1 radius-default padding-20 figure-scale-animation {{$color_classes[$loop->index]}} box-shadow-large shadow-style-2 transition-default">
                                <div class="figure-holder radius-default">
                                    <a href="{{route('post.details',[$recentArticlePostt->id,$recentArticlePostt->slug])}}" class="link-wrap img-height-100"><img width="500" height="500" src="{{$recentArticlePostt->image_url}}" alt="Post"></a>
                                </div>
                                <div class="content-holder">
                                    <div>
                                        <div class="entry-category style-2 color-dark-1-fixed">
                                            <ul>
                                                <li>
                                                    <a href="{{route('category.posts',[$recentArticlePostt->category_id,$recentArticlePostt->category->slug])}}">{{@$recentArticlePostt->category->name}}</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <h3 class="entry-title color-dark-1-fixed underline-animation h3-small"><a href="{{route('post.details',[$recentArticlePostt->id,$recentArticlePostt->slug])}}" class="link-wrap">{{\Str::limit($recentArticlePostt->title,60,'...')}}</a></h3>
                                        <ul class="entry-meta color-dark-1-fixed">
                                            <li>
                                                <i class="regular-clock-circle"></i>{{\Carbon\Carbon::parse($recentArticlePostt->created_at)->diffForHumans()}}
                                            </li>
                                            <li>
                                                <i class="regular-eye"></i>{{$recentArticlePostt->total_views}}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="sidebar-widget mt-3">
                        <div class="section-heading heading-style-2">
                            <h3 class="title">Short Stories</h3>
                        </div>
                        <div class="widget-post post-layout1">
                            @foreach ($latest_short_stories_posts as $short_stories_post)
                            @if ($loop->index == 0)
                                <div class="post-box">
                                    <div class="figure-holder radius-default">
                                        <a href="{{route('post.details',[$short_stories_post->id,$short_stories_post->slug])}}" class="link-wrap figure-overlay img-height-100">
                                            <img style="width: 100%; height: 250px;" src="{{ $short_stories_post->image_url }}" alt="Post">
                                        </a>
                                    </div>
                                    <div class="content-holder">
                                        <h3 class="entry-title color-light-1-fixed h3-small underline-animation"><a href="{{route('post.details',[$short_stories_post->id,$short_stories_post->slug])}}" class="link-wrap">{{\Str::limit($short_stories_post->title,60,'...')}}</a></h3>
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
                                        <a href="{{route('post.details',[$short_stories_post->id,$short_stories_post->slug])}}" class="link-wrap figure-overlay img-height-100">
                                            <img style="width: 100%; height: 60px;" src="{{ $short_stories_post->image_url }}" alt="Post">
                                        </a>
                                    </div>
                                    <div class="content-holder">
                                        <h3 class="entry-title color-dark-1 underline-animation h3-extra-small"><a href="{{route('post.details',[$short_stories_post->id,$short_stories_post->slug])}}" class="link-wrap">{{\Str::limit($short_stories_post->title,60,'...')}}</a></h3>
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
<section class="post-wrap-layout8 space-top-50 bg-color-light-1 transition-default">
    <div class="container">
        <div class="row g-3">
            @foreach ($category_latest_posts as  $groupcategory)
                <div class="col-lg-4">
                    <div class="h-100 post-box-layout12 box-border-dark-1 radius-default padding-20 @if($loop->index == 0) bg-color-scandal @elseif($loop->index == 1) bg-color-mimosa @else bg-color-old-lace  @endif box-shadow-large shadow-style-2 transition-default">
                        @foreach ($groupcategory->take(4) as $categoryPost)
                            @if ($loop->index == 0)
                                <div class="single-item">
                                    <div class="figure-holder radius-default">
                                        <a href="{{route('post.details',[$categoryPost->id,$categoryPost->slug])}}" class="link-wrap img-height-100">
                                            <img style="height: 200px; width: 100%;" src="{{ @$categoryPost->image_url }}" alt="Post">
                                        </a>
                                    </div>
                                    <div class="content-holder">
                                        <div class="entry-category style-2 color-dark-1-fixed">
                                            <ul>
                                                <li>
                                                    <a href="{{route('category.posts',[$categoryPost->category_id,$categoryPost->category->slug])}}">{{@$categoryPost->category->name}}</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <h3 class="entry-title h3-small color-dark-1-fixed underline-animation">
                                            <a href="{{route('post.details',[$categoryPost->id,$categoryPost->slug])}}" class="link-wrap">{{\Str::limit($categoryPost->title,60,'...')}}</a>
                                        </h3>
                                        <ul class="entry-meta color-dark-1-fixed">
                                            @if (isset($categoryPost->user->id))
                                                <li class="post-author">
                                                    <a href="{{ route('post.author',@$categoryPost->user->id) }}">
                                                        <img src="{{ $categoryPost->user->image ?? asset('default/user.webp') }}" alt="Author">
                                                        {{@$categoryPost->user->name}}
                                                    </a>
                                                </li>
                                            @endif
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
                                        <a href="{{route('post.details',[$categoryPost->id,$categoryPost->slug])}}" class="link-wrap figure-overlay img-height-100">
                                            <img  style="height: 100px; width: 100%;" src="{{ @$categoryPost->image_url }}" alt="Post">
                                        </a>
                                    </div>
                                    <div class="content-holder">
                                        <div class="entry-category style-3 color-dark-1-fixed">
                                            <ul>
                                                <li>
                                                    <a href="{{route('category.posts',[$categoryPost->category_id,$categoryPost->category->slug])}}">{{@$categoryPost->category->name}}</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <h3 class="entry-title color-dark-1-fixed h3-small underline-animation"><a href="{{route('post.details',[$categoryPost->id,$categoryPost->slug])}}" class="link-wrap">{{\Str::limit($categoryPost->title,30,'...')}}</a></h3>
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
            <form action="{{ route('user.subscribe') }}" method="POST" class="newsletter-form box-border-dark-1 box-shadow-large shadow-style-2 shadow-fixed transition-default radius-default">
                @csrf
                <input type="email" name="email" class="email-input" placeholder="Email Address">
                <button type="submit" class="axil-btn">
                    Subscribe<i class="solid-navigation"></i>
                </button>
            </form>
        </div>
    </div>
</section>
@endsection
