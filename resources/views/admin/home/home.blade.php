@extends('admin.master')
@section('title', 'Dashboard')
@section('main-content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Dashboard
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Info boxes -->
    <div class="row">
        <div class="col-sm-4 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-dark"><i class="fa fa-user"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Total User</span>
                    <span class="info-box-number">{{ \App\Models\User::all()->count() }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-sm-4 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-dark"><i class="fa fa-street-view"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Role</span>
                    <span class="info-box-number">{{ \Spatie\Permission\Models\Role::all()->count() }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
@endsection
