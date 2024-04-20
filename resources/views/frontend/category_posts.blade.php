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
                    <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $page_name }}</li>
                </ol>
            </nav>
        </div>
    </div>
</section>
<section class="space-bottom-60 bg-color-light-2">
    <div class="container">
        <div class="section-heading heading-style-1">
            <h2 class="title">Category Articles</h2>
        </div>
        <div class="position-relative">
            <div id="post-slider-3" class="post-slider-3 gutter-30 outer-top-5 initially-none">
                @foreach ($posts as $post)
                    <div class="single-slide">
                        <div class="post-box-layout6 box-border-dark-1 radius-default padding-20 bg-color-scandal box-shadow-large shadow-style-2 transition-default">
                            <div class="figure-holder radius-default">
                                <a href="{{route('post.details',[@$post->id,@$post->title])}}" class="link-wrap img-height-100"><img width="660" height="470" src="{{ @$post->image_url}}" alt="Post"></a>
                            </div>
                            <div class="content-holder">
                                <div class="entry-category style-2 color-dark-1-fixed">
                                    <ul>
                                        <li>
                                            <a href="{{route('category.posts',@$post->category_id)}}">{{@$post->category->name}}</a>
                                        </li>
                                    </ul>
                                </div>
                                <h3 class="entry-title color-dark-1-fixed underline-animation"><a href="{{route('post.details',[@$post->id,@$post->title])}}" class="link-wrap">
                                    {{\Str::limit(@$post->title,60,' ...')}}</a>
                                </h3>
                                <ul class="entry-meta color-dark-1-fixed">
                                    <li class="post-author">
                                        {{-- <a href="#"> --}}
                                            <img src="{{ $post->user->image?? asset('default/user.webp') }}" alt="{{@$post->user->name}}">{{@$post->user->name}}
                                        {{-- </a> --}}
                                    </li>
                                    <li>
                                        <i class="regular-clock-circle"></i>{{\Carbon\Carbon::parse($post->created_at)->diffForHumans()}}
                                    </li>
                                    <li>
                                        <i class="regular-eye"></i>{{@$post->total_views}}
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