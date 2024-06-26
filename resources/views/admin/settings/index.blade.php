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
                <!-- /.box-header -->
                <div class="box-body">
                    {!! Form::model($settings, ['method' => 'POST','route' => ['settings.update', $settings->id], 'enctype'=>'multipart/form-data']) !!}
                    <h4 class="text-center">Software Settings Information</h4>
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>App Name: <span style="color: red;">*</span></label>
                                    {!! Form::text('app_name', null, array('placeholder' => 'App Name','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>App Logo:</label><br>
                                    @if (file_exists($settings->app_logo))
                                        <img src="{{ asset($settings->app_logo) }}" style="height: 100px; width: 200px;"><br><br>
                                    @endif
                                    {!! Form::file('app_logo', null, array('class' => 'form-control-file')) !!}
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>App Favicon:</label><br>
                                    @if (file_exists($settings->app_favicon))
                                        <img src="{{ asset($settings->app_favicon) }}" style="height: 100px; width: 200px;"><br><br>
                                    @endif
                                    {!! Form::file('app_favicon', null, array('class' => 'form-control-file')) !!}
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Address: <span style="color: red;">*</span></label>
                                    {!! Form::text('address', null, array('placeholder' => 'Address','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Phone Number: <span style="color: red;">*</span></label>
                                    {!! Form::text('phone_number', null, array('placeholder' => 'Phone Number','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>E-mail: <span style="color: red;">*</span></label>
                                    {!! Form::email('email', null, array('placeholder' => 'E-mail','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Discount Rate(%): <span style="color: red;">*</span></label>
                                    {!! Form::text('discount_rate', null, array('placeholder' => 'Discount Rate(%)','class' => 'form-control')) !!}
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
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection
