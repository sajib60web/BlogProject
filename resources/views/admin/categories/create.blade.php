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
                    @can('category-list')
                        <a href="{{ route('categories.index') }}" style="float: right;" class="btn btn-success btn-sm">
                            Manage
                        </a>
                    @endcan
                </div>
                <hr>
                <!-- /.box-header -->
                <div class="box-body">
                    {!! Form::open(array('route' => 'categories.store','method'=>'POST')) !!}
                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-1">
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <label>Name: <span style="color: red;">*</span></label>
                                        {!! Form::text('name', null, array('placeholder' => 'Enter Name','class' => 'form-control')) !!}
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <label>Category:<span style="color: red;">*</span></label>
                                        <select name="parent_id" class="form-control select2" id="parent_id">
                                            <option value="0">Parent Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" @selected(old('parent_id') == $category->id)>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <label>Description:</label>
                                        {!! Form::textarea('description', null, array('placeholder' => 'Enter Description','class' => 'form-control')) !!}
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <button type="submit" class="btn btn-primary pull-right">Submit</button>
                                </div>
                                {!! Form::close() !!}
                                <br>
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
