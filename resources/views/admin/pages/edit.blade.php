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
        <!-- /.box -->
            <div class="box">
                <div class="box-header">
                    @can('page-list')
                        <a href="{{ route('pages.index') }}" style="float: right;" class="btn btn-success btn-sm">
                            Manage
                        </a>
                    @endcan
                </div>
                <hr>
                <!-- /.box-header -->
                <div class="box-body">
                    {!! Form::model($page, ['method' => 'PATCH','route' => ['pages.update', $page->id]]) !!}
                    <div class="col-sm-12">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="title">Title</label> <span class="text-danger">*</span>
                                <input id="title" type="text" name="title" placeholder="Enter Title" autocomplete="off" class="form-control" value="{{ old('title',@$page->title) }}" required>
                            </div> 
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group"> 
                                <label for="summernote">Description<span class="text-danger">*</span></label>
                                <textarea  class="form-control summernote" name="description" rows="12">{{ old('description',@$page->description) }}</textarea>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <button type="submit" class="btn btn-primary pull-right">Update</button>
                        </div>
                    {!! Form::close() !!}
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection

