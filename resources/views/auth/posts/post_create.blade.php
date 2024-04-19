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
                    <div class="row justify-content-end">
                        <div class="col-sm-1">
                            <a href="{{ route('post.list') }}" class="btn btn-success btn-sm mb-2">
                                Post List
                            </a>
                        </div>
                        <div class="col-sm-12">
                            @include('admin.massage')
                        </div>
                    </div>
                    {!! Form::open(array('route' => 'user.post.store','method'=>'POST' ,'enctype'=>'multipart/form-data')) !!}
                        <div class="row">
                            <div class="col-sm-12 mb-2">
                                <div class="form-group">
                                    <label>Title: <span style="color: red;">*</span></label>
                                    {!! Form::text('title', old('title',null), array('placeholder' => 'Enter Title','class' => 'form-control','id'=>'post_title')) !!}
                                </div>
                            </div>
                            <div class="col-sm-6 mb-2">
                                <div class="form-group">
                                    <label>Category:<span style="color: red;">*</span></label>
                                    <select name="category_id" class="form-control " id="category_id" data-url="{{route('post.subcategory')}}">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"  >{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-2">
                                <div class="form-group">
                                    <label>Sub-Category:</label>
                                    <select name="sub_category_id" class="form-control " id="sub_category_id">
                                        <option value="">Select Sub-Category</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-2">
                                <div class="form-group">
                                    <label>Post Type:</label>
                                    <select name="post_type" class="form-control " id="post_type">
                                        <option value="{{\App\Enums\PostType::ARTICLE}}">Article</option>
                                        <option value="{{\App\Enums\PostType::VIDEO}}">Video</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-2" id="image">
                                <div class="form-group">
                                    <label>Image: </label>
                                     <input name="image" type="file" class="form-control" />
                                </div>
                            </div>
                            <div class="col-sm-12 mb-2" id="video_url">
                                <div class="form-group">
                                    <label>Youtube Video Url: </label>
                                    {!! Form::text('video_url', old('video_url',null), array('placeholder' => 'Enter youtube video url','class' => 'form-control' )) !!}
                                </div>
                            </div>
                            <div class="col-sm-12 mb-2">
                                <div class="form-group">
                                    <label>Content: <span style="color: red;">*</span></label>
                                    {!! Form::textarea('content', old('content',null), array('placeholder' => 'Enter content','class' => 'form-control summernote')) !!}
                                </div>
                            </div>
                            <div class="col-sm-12 mb-2">
                                <h3>SEO Details</h3>
                            </div>
                            <div class="col-sm-12 mb-2">
                                <div class="form-group">
                                    <label>Meta title: </label>
                                    {!! Form::text('meta_title', old('meta_title',null), array('placeholder' => 'Enter Meta Title','class' => 'form-control','id'=>'meta_title')) !!}
                                </div>
                            </div>
                            <div class="col-sm-12 mb-2">
                                <div class="form-group">
                                    <label>Meta Keywords: </label>
                                    {!! Form::text('meta_keywords', old('meta_keywords',null), array('placeholder' => 'Enter Meta Keywords','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-sm-12 mb-2">
                                <div class="form-group">
                                    <label>Meta Description:  </label>
                                    {!! Form::text('meta_description', old('meta_description',null), array('placeholder' => 'Enter Meta Description','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-sm-12 mb-2">
                                <div class="form-group">
                                    <label>Tags:</label>
                                     <input class="form-control d-none" name="tags" id="post_tags" data-role="tagsinput" placeholder="Enter Tags" value="{{ old('tags') }}" />
                                </div>
                            </div>
                            <div class="col-sm-12 mb-2">
                                <h3>Visibility</h3>
                                <div class="row mb-2">
                                    <div class="col-md-6 col-lg-4">
                                        <div  style="display: flex;justify-content:space-between">
                                            <label for="breaking">Add to breaking </label>
                                            <div>
                                                <input id="breaking" name="breaking" type="checkbox" value="1" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-6 col-lg-4">
                                        <div  style="display: flex;justify-content:space-between">
                                            <label for="treding_topic">Add to Treding Topic </label>
                                            <div>
                                                <input id="treding_topic" name="treding_topic" type="checkbox" value="1" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-6 col-lg-4">
                                        <div  style="display: flex;justify-content:space-between">
                                            <label for="stories">Add to stories </label>
                                            <div>
                                                <input id="stories" name="stories" type="checkbox" value="1" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-lg-4">
                                        <div  style="display: flex;justify-content:space-between">
                                            <label for="recommended">Add to recommended </label>
                                            <div>
                                                <input id="recommended" name="recommended" type="checkbox" value="1" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <button type="submit" class="btn btn-primary pull-right">Save</button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('styles')
    <link src="{{ asset('css/tags.css') }}" />
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
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endpush
@push('scripts')
<script src="{{ asset('js/tags.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
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
    posttype(1);
    function posttype(type){
        if(type == 1){
            // $('#image').show();
            $('#video_url').hide();
        }else{
            // $('#image').hide();
            $('#video_url').show();
        }
    }
    $(document).ready(function(){
        $('.summernote').summernote({
            placeholder: 'Description',
            tabsize: 2,
            height: 200,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ],
            minHeight: null,
            maxHeight: null,
            focus: true
        });
    });
</script>
@endpush