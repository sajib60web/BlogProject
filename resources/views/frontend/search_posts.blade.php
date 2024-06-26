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
<!--=====================================-->
<!--=          Contact Area Start       =-->
<!--=====================================-->
<section class="archive-wrap-layout-6 space-top-60 bg-color-light-1 transition-default mb-5">
    <div class="container-fluid">
        <div class="row g-3 row-cols-xxl-5 row-cols-xl-4 row-cols-lg-3 row-cols-sm-2 row-cols-1">
            @foreach ($posts as $post)
            <div class="col">
                <div class="post-box-layout21 box-border-dark-1 radius-default figure-scale-animation">
                    <div class="figure-holder radius-medium">
                        <a href="{{route('post.details',[$post->id,$post->title])}}" class="link-wrap figure-overlay img-height-100">
                            <img width="540" height="350" src="{{ @$post->image_url}}" alt="Post" style="height: 350px;">
                        </a>
                    </div>
                    <div class="content-holder">
                        <div class="entry-category style-2 color-light-1-fixed">
                            <ul>
                                <li>
                                    <a href="{{route('category.posts',[@$post->category_id,$post->category->slug])}}">{{@$post->category->name}}</a>
                                </li>
                            </ul>
                        </div>
                        <h3 class="entry-title h3-medium color-light-1-fixed underline-animation">
                            <a href="{{route('post.details',[$post->id,$post->title])}}" class="link-wrap">{{\Str::limit(@$post->title,60,' ...')}}</a>
                        </h3>
                        <ul class="entry-meta color-light-1-fixed">
                            @if (isset($post->user->name))
                                <li class="post-author">
                                    <a href="{{ route('post.author',@$post->user->id) }}">
                                        {{@$post->user->name}}
                                    </a>
                                </li> 
                            @endif
                            <li>
                                <i class="regular-clock-circle"></i>{{\Carbon\Carbon::parse($post->created_at)->diffForHumans()}}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="template-pagination pagination-center">
            {{ $posts->links() }}
        </div>
    </div>
</section>
<!--=====================================-->
<!--=        Newsletter Area Start      =-->
<!--=====================================-->
@include('frontend.layouts.newsletter')
@endsection
