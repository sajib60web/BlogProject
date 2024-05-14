@extends('admin.master')
@section('title', $page_name )
@section('main-content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{ $page_name }}
        </h1>
        <ol class="breadcrumb">
            <li  class="active"><a href="#"><i class="fa fa-user-plus"></i> {{ $page_name }}</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
        @include('admin.massage')
        <div class="col-xs-12">
        <!-- /.box -->
            <div class="box">
                <div class="box-header">
                    @can('user-list')
                        <a href="{{ route('post.index') }}" style="float: right;" class="btn btn-success btn-sm">
                            Manage
                        </a>
                    @endcan
                </div>
                <hr>
                <!-- /.box-header -->
                <div class="box-body">
                    {!! Form::open(array( 'route' => ['post.update',['id'=>$post->id]],'method'=>'PUT' ,'enctype'=>'multipart/form-data')) !!}
                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-1">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Title: <span style="color: red;">*</span></label>
                                        {!! Form::text('title', old('title',@$post->title), array('placeholder' => 'Enter Title','class' => 'form-control','id'=>'post_title')) !!}
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Category:<span style="color: red;">*</span></label>
                                        <select name="category_id" class="form-control " id="category_id" data-url="{{route('post.subcategory')}}">
                                            <option value="" selected>Select Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"  @selected($post->category_id == $category->id)>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                {{-- <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Sub-Category:</label>
                                        <select name="sub_category_id" class="form-control " id="sub_category_id">
                                            <option value="" selected>Select Sub-Category</option>
                                            @foreach ($subcategories as $subcategory)
                                                <option value="{{ $subcategory->id }}"  @selected($post->sub_category_id == $subcategory->id)>{{ $subcategory->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> --}}
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Post Type:</label>
                                        <select name="post_type" class="form-control " id="post_type">
                                            <option value="{{\App\Enums\PostType::ARTICLE}}" @selected($post->post_type == \App\Enums\PostType::ARTICLE)>Article</option>
                                            <option value="{{\App\Enums\PostType::VIDEO}}" @selected($post->post_type == \App\Enums\PostType::VIDEO)>Video</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6" id="image">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Image: </label>
                                                 <input name="image" type="file" class="form-controll" />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <img src="{{$post->image_url}}" width="50" height="50" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12" id="video_url">
                                    <div class="form-group">
                                        <label>Youtube Video Url: </label>
                                        {!! Form::text('video_url', old('video_url',$post->video_url), array('placeholder' => 'Enter youtube video url','class' => 'form-control' )) !!}
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Content: <span style="color: red;">*</span></label>
                                        {!! Form::textarea('content', old('content',$post->content), array('placeholder' => 'Enter content','class' => 'form-control summernote')) !!}
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                <h3>SEO Details</h3>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Meta title: </label>
                                        {!! Form::text('meta_title', old('meta_title',$post->meta_title), array('placeholder' => 'Enter Meta Title','class' => 'form-control','id'=>'meta_title')) !!}
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Meta Keywords: </label>
                                        {!! Form::text('meta_keywords', old('meta_keywords',$post->meta_keywords), array('placeholder' => 'Enter Meta Keywords','class' => 'form-control')) !!}
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Meta Description:  </label>
                                        {!! Form::text('meta_description', old('meta_description',$post->meta_description), array('placeholder' => 'Enter Meta Description','class' => 'form-control')) !!}
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Tags:  </label>
                                         <input class="form-control" name="tags" id="post_tags" data-role="tagsinput" placeholder="Enter Tags" value="{{old('tags',$post->tags)}}" />
                                    </div>
                                </div>


                                <div class="col-sm-12">
                                    <h3>Visibility</h3>
                                    <div class="row">
                                        <div class="col-md-5 col-lg-3">
                                            <div  style="display: flex;justify-content:space-between">
                                                <label for="slider">Add to carousel </label>
                                                <div>
                                                    <input id="slider" name="slider" type="checkbox" value="1"  @if ($post->slider == 1) checked @endif  />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-5 col-lg-3">
                                            <div  style="display: flex;justify-content:space-between">
                                                <label for="main_frame">Add to main frame </label>
                                                <div>
                                                    <input id="main_frame" name="main_frame" type="checkbox" value="1" @if ($post->main_frame == 1) checked @endif />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5 col-lg-3">
                                            <div  style="display: flex;justify-content:space-between">
                                                <label for="main_frame_slider">Add to main frame slider </label>
                                                <div>
                                                    <input id="main_frame_slider" name="main_frame_slider" type="checkbox" value="1" @if ($post->main_frame == 1) checked @endif />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5 col-lg-3">
                                            <div  style="display: flex;justify-content:space-between">
                                                <label for="breaking">Add to breaking </label>
                                                <div>
                                                    <input id="breaking" name="breaking" type="checkbox" value="1" @if ($post->breaking == 1) checked @endif />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5 col-lg-3">
                                            <div  style="display: flex;justify-content:space-between">
                                                <label for="treding_topic">Add to Treding Topic </label>
                                                <div>
                                                    <input id="treding_topic" name="treding_topic" type="checkbox" value="1" @if ($post->treding_topic == 1) checked @endif />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-5 col-lg-3">
                                            <div  style="display: flex;justify-content:space-between">
                                                <label for="top_stories">Add to top stories </label>
                                                <div>
                                                    <input id="top_stories" name="top_stories" type="checkbox" value="1"  @if ($post->top_stories == 1) checked @endif />
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-5 col-lg-3">
                                            <div  style="display: flex;justify-content:space-between">
                                                <label for="latest_stories_main">Add to latest stories main</label>
                                                <div>
                                                    <input id="latest_stories_main" name="latest_stories_main" type="checkbox" value="1"  @if ($post->latest_stories_main == 1) checked @endif  />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5 col-lg-3">
                                            <div  style="display: flex;justify-content:space-between">
                                                <label for="latest_stories_sub">Add to latest stories sub</label>
                                                <div>
                                                    <input id="latest_stories_sub" name="latest_stories_sub" type="checkbox" value="1" @if ($post->latest_stories_sub == 1) checked @endif />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5 col-lg-3">
                                            <div  style="display: flex;justify-content:space-between">
                                                <label for="latest_stories_right_main">Add to latest stories right main</label>
                                                <div>
                                                    <input id="latest_stories_right_main" name="latest_stories_right_main" type="checkbox" value="1"  @if ($post->latest_stories_right_main == 1) checked @endif/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5 col-lg-3">
                                            <div  style="display: flex;justify-content:space-between">
                                                <label for="latest_stories_right_sub">Add to latest stories right sub</label>
                                                <div>
                                                    <input id="latest_stories_right_sub" name="latest_stories_right_sub" type="checkbox" value="1" @if ($post->latest_stories_right_sub == 1) checked @endif/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-5 col-lg-3">
                                            <div  style="display: flex;justify-content:space-between">
                                                <label for="top_video_main">Add to top video main </label>
                                                <div>
                                                    <input id="top_video_main" name="top_video_main" type="checkbox" value="1" @if ($post->top_video_main == 1) checked @endif />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-5 col-lg-3">
                                            <div  style="display: flex;justify-content:space-between">
                                                <label for="top_video_recommended">Add to top video recommended </label>
                                                <div>
                                                    <input id="top_video_recommended" name="top_video_recommended" type="checkbox" value="1" @if ($post->top_video_recommended == 1) checked @endif />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-5 col-lg-3">
                                            <div  style="display: flex;justify-content:space-between">
                                                <label for="top_video_latest">Add to top video latest </label>
                                                <div>
                                                    <input id="top_video_latest" name="top_video_latest" type="checkbox" value="1" @if ($post->top_video_latest == 1) checked @endif/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-5 col-lg-3">
                                            <div  style="display: flex;justify-content:space-between">
                                                <label for="recent_article">Add to recent article </label>
                                                <div>
                                                    <input id="recent_article" name="recent_article" type="checkbox" value="1" @if ($post->recent_article == 1) checked @endif/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Status:</label>
                                        <select name="status" class="form-control" >
                                            <option value="{{\App\Enums\Status::PUBLISH}}" @selected($post->status == \App\Enums\Status::PUBLISH)>Publish</option>
                                            <option value="{{\App\Enums\Status::UNPUBLISH}}" @selected($post->status == \App\Enums\Status::UNPUBLISH)>Unpublish</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <button type="submit" class="btn btn-primary pull-right">Update</button>
                                </div>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection
@push('styles')
    <link src="{{asset('css/tags.css')}}" />


    <style>

            .bootstrap-tagsinput{
                background-color: #fff!important;
                border: 1px solid #ccc!important;
                box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075)!important;
                display: inline-block!important;
                padding: 4px 6px!important;
                color: #555!important;
                vertical-align: middle!important;
                border-radius: 4px!important;
                width: 100%!important;
                line-height: 22px!important;
                cursor: text!important;
            }


            .bootstrap-tagsinput input{
                border:none;
                outline:none;
            }
            .bootstrap-tagsinput input:focus{
                border:none;
                outline:none;
            }

            .bootstrap-tagsinput .badge {
                margin: 2px 5px !important;
                background-color: #5969ff !important;
            }

        </style>
@endpush
@push('scripts')
    <script type="text/javascript">

    $(document).ready(function(){
        $('#category_id').change(function(){
            $.ajax({
            type : 'GET',
            url :  $(this).data('url'),
            data : {'category_id':$(this).val()},
            dataType : "html",
            success : function (response) {
                $('#sub_category_id').html(response);
            }
        });
        });
    });

    $('#post_title').keyup(function(){
        metaTitleSet();
    });

    function metaTitleSet() {
        var keyValue = document.getElementById("post_title").value;
        document.getElementById("meta_title").value = keyValue;
    }

    $('#post_type').change(function(){
        posttype($(this).val());
    });
    posttype({{$post->post_type}});
    function posttype(type){
        if(type == 1){
            // $('#image').show();
            $('#video_url').hide();
        }else{
            // $('#image').hide();
            $('#video_url').show();
        }
    }


    </script>

    <script src="{{asset('js/tags.js')}}"></script>


@endpush
