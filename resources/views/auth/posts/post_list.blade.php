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
<section class="author-wrap-layout-1 bg-color-light-1 transition-default">
    <div class="pt-5 pb-5 bg-color-light-2 transition-default">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('user.post.create') }}" style="float: right;" class="btn btn-success btn-sm mb-2">
                        Create Post
                    </a>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>title</th>
                                <th>Category</th>
                                {{-- <th>Sub-Category</th> --}}
                                <th>Type</th>
                                <th>Image</th>
                                <th>Video Url</th>
                                <th>Visibility</th>
                                <th>Status</th>
                                <th style="width: 10% !important;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as  $post)
                                <tr>
                                    <td>{{ $loop->index+1}}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ @$post->category->name }}</td>
                                    {{-- <td>{{ @$post->subcategory->name }}</td> --}}
                                    <td>
                                        @if ($post->post_type == App\Enums\PostType::ARTICLE)
                                            <span class="badge badge-info bg-info">Article</span>
                                        @else
                                            <span class="badge badge-primary bg-primary">Video</span>
                                        @endif
                                    </td>
                                    <td><img  src="{{@$post->image_url}}" width="50" height="50"  /> </td>
                                    <td>{{ @$post->video_url }} </td>
                                    <td>{!! @$post->my_visibility !!} </td>
                                    <td class="text-black">{!! @$post->my_status !!} </td>
                                    <td class="text-center">
                                        <a href="{{ route('user.post.edit',$post->id) }}" class="btn btn-sm btn-info"><i class="regular-edit"></i></a>
                                        {!! Form::open(['method' => 'DELETE','route' => ['user.post.delete', $post->id],'style'=>'display:inline']) !!}
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure to Delete');"><i class="regular-trash"></i></button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col col-lg-6">
                            <p class="p-2 small">
                                {!! __('Showing') !!}
                                <span class="font-medium">{{ $posts->firstItem() }}</span>
                                {!! __('to') !!}
                                <span class="font-medium">{{ $posts->lastItem() }}</span>
                                {!! __('of') !!}
                                <span class="font-medium">{{ $posts->total() }}</span>
                                {!! __('results') !!}
                            </p>
                        </div>
                        <div class="col col-lg-6 float-right">
                            <span>{{ $posts->links() }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection