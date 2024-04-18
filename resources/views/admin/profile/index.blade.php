@extends('admin.master')
@section('title', 'Update Profile')
@section('main-content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Update Profile
        </h1>
        <ol class="breadcrumb">
            <li  class="active"><a href="#"><i class="fa fa-user-plus"></i> Update Profile</a></li>
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
                    <h4 style="padding-left: 13px;">Update Profile Information</h4>
                    <hr>
                    {!! Form::open(array('route' => ['profile.update', $profile->id], 'method'=>'POST')) !!}
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>First Name:<span class="danger">*</span></label>
                                    {!! Form::text('first_name', $profile->first_name, array('placeholder' => 'First Name','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Last Name:<span class="danger">*</span></label>
                                    {!! Form::text('last_name', $profile->last_name, array('placeholder' => 'Last Name','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Email:<span class="danger">*</span></label>
                                    {!! Form::text('email', $profile->email, array('placeholder' => 'Email','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Mobile Number:<span class="danger">*</span></label>
                                    {!! Form::text('phone_number', $profile->phone_number, array('placeholder' => 'Mobile Number','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Address:</label>
                                    {!! Form::text('address', $profile->address, array('placeholder' => 'Address','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <button type="submit" class="btn btn-primary pull-right">Update</button>
                            </div>
                            {!! Form::close() !!}
                            <br>
                        </div>
                    </div>
                    <div class="row">
                        <h4 style="padding-left: 13px; text-align: center;">Update Password</h4>
                        <hr>
                        <div class="col-sm-12">
                            {!! Form::open(array('route' => 'change.profile.password','method'=>'POST')) !!}
                            <div class="col-sm-6 col-sm-offset-3">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label>Old Password:<span class="danger">*</span></label>
                                            {!! Form::password('old_password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                                            <input type="hidden" name="user_id" value="{{ $profile->id }}">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label>New Password:<span class="danger">*</span></label>
                                            {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label>Confirm Password:<span class="danger">*</span></label>
                                            {!! Form::password('password_confirmation', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <button type="submit" class="btn btn-primary pull-right">Change Password</button>
                                    </div>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                        <!-- /.box -->
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
    </section>
    <!-- /.content -->
@endsection
