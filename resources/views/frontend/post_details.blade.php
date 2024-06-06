@extends('frontend.layouts.app')
@section('title', $post->title)
@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"/>
<style>
    .fa-brands, .fab, .fa-regular {
        font-family: "Font Awesome 6 Brands" !important;
    }
    .fa-classic, .fa-regular, .fa-solid, .far, .fas {
        font-family: "Font Awesome 6 Free" !important;
    }
    .print {
        text-align: right;
        margin-top: -45px;
        margin-bottom: 10px;
        color: black;
    }
    .app-name{
        display: none;
    }
    @media print {
        .app-name{
            display: block !important;
        }
    }
</style>
@endpush
@section('meta_content')
    @php
        $imagemeta = $post->image_url;
    @endphp
    <meta name="keywords" content="{{ $post->meta_keyword }}">
    <meta name="title" content="{{ $post->title }}">
    <meta name="description" content="{{ $post->meta_description }}">
    <meta name="author" content="{{ setting()->app_name }}">

    <meta property="og:keywords" content="{{ $post->meta_keyword }}">
    <meta property="og:title" content="{{ $post->title }}">
    <meta property="og:description" content="{{ $post->meta_description }}">
    <meta property="og:author" content="{{ setting()->app_name }}">
    <meta property="og:image" content="{{ $imagemeta }}" />
@endsection
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
                    <li class="breadcrumb-item">{{$post->category->name}}</li>
                    <li class="breadcrumb-item">Post</li>
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
                                <a href="{{route('category.posts',[$post->category_id,$post->category->slug])}}">{{@$post->category->name}}</a>
                            </li>
                        </ul>
                    </div>
                    <h1 class="app-name" style="text-align: center;">{{ setting()->app_name }}</h1>
                    <h1 class="entry-title color-dark-1 post-title">{{$post->title}}</h1>
                    <ul class="entry-meta color-dark-1">
                        @if ($post->user->name)
                            <li class="post-author">
                                By
                                <a href="{{ route('post.author',@$post->user->id) }}">
                                    {{@$post->user->name}}
                                </a>
                            </li>  
                        @endif
                        <li>
                            <i class="regular-calendar-01"></i>{{\Carbon\Carbon::parse($post->created_at)->format('M d, Y')}}
                        </li>
                        <li>
                            <i class="regular-clock-circle"></i>{{\Carbon\Carbon::parse($post->created_at)->diffForHumans()}}
                        </li>
                        <li>
                            <i class="regular-eye"></i>{{ $post->total_views }}
                        </li>
                        {{-- <li>
                            <i class="regular-chatting"></i>{{$post->comments->count()}} Comments
                        </li> --}}
                    </ul>
                    <div class="axil-social social-layout-1 size-small gap-12">
                        <ul>
                            <li class="facebook">
                                <a title="Share Facebook" href="https://www.facebook.com/sharer/sharer.php?u= {{url()->current()}}" target="_blank">
                                    <i class="solid-facebook2"></i>
                                </a>
                            </li>
                            <li class="twitter">
                                <a aria-label="Share Twiter" href="https://twitter.com/intent/tweet?url= {{url()->current()}}" target="_blank">
                                    <i class="regular-tweeter"></i>
                                </a>
                            </li>
                            <li class="facebook">
                                <a title="Share Messenger" href="https://www.facebook.com/dialog/send?link={{url()->current()}}&app_id=291494419107518&redirect_uri=https%3A%2F%2Fwww.sharethis.com" target="_blank">
                                    <i class="fa-brands fa-facebook-messenger"></i>
                                </a>
                            </li>
                            <li class="mail-fast">
                                <a title="Share Whatsapp" href="https://api.whatsapp.com/send?text={{ $post->title }} - {{url()->current()}}" target="_blank">
                                    <i class="fa-brands fa-whatsapp"></i>
                                </a>
                            </li>
                            <li class="facebook">
                                <a title="Share Linkedin" href="http://www.linkedin.com/shareArticle?mini=true&url={{url()->current()}}" target="_blank">
                                    <i class="fa-brands fa-linkedin-in"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    @guest
                        <div class="print">
                            <a href="{{ route('login') }}"><i class="fa-solid fa-download" style="font-size: 30px;color: black;"></i></a>
                        </div>   
                    @else
                        <div class="print">
                            <a role="button" id="print_post" style="cursor: pointer;"><i class="fa-solid fa-download" style="font-size: 30px;color: black;"></i></a>
                        </div>
                    @endguest
                    <div class="mb-4 box-border-dark-1 radius-default transition-default post-image">
                        <div class="figure-holder position-relative radius-default">
                                @if ($post->post_type == App\Enums\PostType::VIDEO)
                                    <a href="{{@$post->video_url}}" aria-label="Youtube Video" class="play-btn size-large popup-youtube"><i class="solid-play"></i></a>                                  
                                @endif
                                <a href="{{route('post.details',[$post->id,$post->slug])}}" class="link-wrap img-height-100">
                                    <img src="{{$post->image_url}}" alt="Post" style="height: 350px; width: 100%;">
                                </a>
                            </div>
                        </div>
                    <div class="post-content" style="text-align: justify;">
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
                                        <a title="Share Facebook" href="https://www.facebook.com/sharer/sharer.php?u= {{url()->current()}}" target="_blank">
                                            <i class="solid-facebook2"></i>
                                        </a>
                                    </li>
                                    <li class="twitter">
                                        <a aria-label="Share Twiter" href="https://twitter.com/intent/tweet?url= {{url()->current()}}" target="_blank">
                                            <i class="regular-tweeter"></i>
                                        </a>
                                    </li>
                                    <li class="facebook">
                                        <a title="Share Messenger" href="https://www.facebook.com/dialog/send?link={{url()->current()}}&app_id=291494419107518&redirect_uri=https%3A%2F%2Fwww.sharethis.com" target="_blank">
                                            <i class="fa-brands fa-facebook-messenger"></i>
                                        </a>
                                    </li>
                                    <li class="mail-fast">
                                        <a title="Share Whatsapp" href="https://api.whatsapp.com/send?text={{ $post->title }} - {{url()->current()}}" target="_blank">
                                            <i class="fa-brands fa-whatsapp"></i>
                                        </a>
                                    </li>
                                    <li class="facebook">
                                        <a title="Share Linkedin" href="http://www.linkedin.com/shareArticle?mini=true&url={{url()->current()}}" target="_blank">
                                            <i class="fa-brands fa-linkedin-in"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="post-comment">
                        <div class="fb-comments" data-href="{{ Request::url() }}" data-numposts="10"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 sticky-coloum-item">
                <div class="sidebar-global sidebar-layout4">
                    <div class="sidebar-widget mb-3">
                        <div class="section-heading heading-style-2">
                            <h3 class="title">Short Stories</h3>
                        </div>
                        <div class="widget-post post-layout1">
                            @foreach ($latest_short_stories_posts as $short_stories_post)
                            @if ($loop->index == 0)
                                <div class="post-box">
                                    <div class="figure-holder radius-default">
                                        <a href="{{route('post.details',[$short_stories_post->id,$short_stories_post->slug])}}" class="link-wrap figure-overlay img-height-100"><img width="700" height="470" src="{{ $short_stories_post->image_url }}" alt="Post"></a>
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
                                        <a href="{{route('post.details',[$short_stories_post->id,$short_stories_post->slug])}}" class="link-wrap figure-overlay img-height-100"><img width="140" height="140" src="{{ $short_stories_post->image_url }}" alt="Post"></a>
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
<section class="space-top-50 space-bottom-60 bg-color-light-2">
    <div class="container">
        <div class="section-heading heading-style-1">
            <h2 class="title">Related Articles</h2>
        </div>
        <div class="position-relative">
            <div id="post-slider-3" class="post-slider-3 gutter-30 outer-top-5 initially-none">
                @foreach ($related_posts as $rel_post)
                <div class="single-slide">
                    <div class="post-box-layout6 box-border-dark-1 radius-default padding-20 bg-color-scandal box-shadow-large shadow-style-2 transition-default" style="height: 400px;">
                        <div class="figure-holder radius-default">
                            <a href="{{route('post.details',[$rel_post->id,$rel_post->slug])}}" class="link-wrap img-height-100">
                                <img style="height: 200px;" src="{{ $rel_post->image_url}}" alt="Post">
                            </a>
                        </div>
                        <div class="content-holder">
                            <div class="entry-category style-2 color-dark-1-fixed">
                                <ul>
                                    <li>
                                        <a href="{{route('category.posts',[$rel_post->category_id,$rel_post->category->slug])}}">{{@$rel_post->category->name}}</a>
                                    </li>
                                </ul>
                            </div>
                            <h3 class="entry-title color-dark-1-fixed underline-animation"><a href="{{route('post.details',[$rel_post->id,$rel_post->slug])}}" class="link-wrap">{{\Str::limit($rel_post->title,30,'...')}}</a></h3>
                            <ul class="entry-meta color-dark-1-fixed">
                                @if (isset($rel_post->user->id))
                                    <li class="post-author">
                                        <a href="{{ route('post.author',@$rel_post->user->id) }}">
                                            <img src="{{@$rel_post->user->image?? asset('default/user.webp')}}" alt="Author">
                                            {{@$rel_post->user->name}}
                                        </a>
                                    </li>
                                @endif
                                <li>
                                    <i class="regular-clock-circle"></i>{{\Carbon\Carbon::parse($rel_post->created_at)->diffForHumans()}}
                                </li>
                                <li>
                                    <i class="regular-eye"></i>{{$rel_post->total_views}}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <ul class="slider-navigation-layout1 position-layout2 color-light-1 nav-size-large">
                <li id="post-prev-3" class="prev"><i class="regular-arrow-left"></i></li>
                <li id="post-next-3" class="next"><i class="regular-arrow-right"></i></li>
            </ul>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v20.0&appId=1406941472888394" nonce="R3pnncOx"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="{{ asset('js/printThis.js') }}"></script>
<script type="text/javascript">
    $('.replay-btn').on('click',function(){
        $('#comment'+$(this).data('commentid')).show();
    });
    $('.close').on('click',function(){
        $('#comment'+$(this).data('commentid')).hide();
    });
    //print
    $("#print_post").on("click", function () {
        $(".app-name, .post-title, .post-image, .post-content").printThis({
            importCSS: true,
        })
    });
    document.onload();
</script>
@endpush