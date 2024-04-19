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
                    @can('faq-list')
                        <a href="{{ route('faqs.index') }}" style="float: right;" class="btn btn-success btn-sm">
                            Manage
                        </a>
                    @endcan
                </div>
                <hr>
                <!-- /.box-header -->
                <div class="box-body">
                    {!! Form::model($faq, ['method' => 'PATCH','route' => ['faqs.update', $faq->id]]) !!}
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1">
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <label>Title: <span style="color: red;">*</span></label>
                                    {!! Form::text('title', null, array('placeholder' => 'Enter Title','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <label>Description:</label>
                                    {!! Form::textarea('description', null, array('placeholder' => 'Enter Description','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-sm-7">
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
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection
