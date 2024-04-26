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
                        <span class="info-box-text">Total Authors</span>
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
                        <span class="info-box-text">Total Roles</span>
                        <span class="info-box-number">{{ \Spatie\Permission\Models\Role::all()->count() }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>

            <!-- /.col -->
            <div class="col-sm-4 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-dark"><i class="fa fa-list"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Categories</span>
                        <span class="info-box-number">{{ \App\Models\Category::all()->count() }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-sm-4 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-dark"><i class="fa fa-list"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Posts</span>
                        <span class="info-box-number">{{ App\Models\Post::all()->count() }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <!-- /.col -->
            <div class="col-sm-4 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-dark"><i class="fa fa-users"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total subscribers</span>
                        <span class="info-box-number">{{ \App\Models\Subscribe::all()->count() }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-sm-4 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-dark"><i class="fa fa-send"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Contact messanges</span>
                        <span class="info-box-number">{{ \App\Models\ContactMessage::all()->count() }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-xs-12">

                <div class="box">
                    <div class="box-body">
                        <h4>Latest article posts</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">SL</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">title</th>
                                        <th scope="col">Status</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (\App\Models\Post::where('post_type', App\Enums\PostType::ARTICLE)->orderByDesc('id')->limit(5)->get() as $lapost)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td> <img src="{{ @$lapost->image_url }}" width="50" height="50" /> </td>
                                            <td>{{ @$lapost->category->name }}</td>
                                            <td>{{ $lapost->title }}</td>
                                            <td> {!! @$lapost->my_status !!} </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.info-box -->
            </div>
            <div class="col-sm-6 col-xs-12">

                <div class="box">
                    <div class="box-body">
                        <h4>Latest video posts</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">SL</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">title</th>
                                        <th scope="col">Status</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (\App\Models\Post::where('post_type', App\Enums\PostType::VIDEO)->orderByDesc('id')->limit(5)->get() as $lvpost)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td> <img src="{{ @$lvpost->image_url }}" width="50" height="50" />
                                            </td>
                                            <td>{{ @$lvpost->category->name }}</td>
                                            <td>{{ $lvpost->title }}</td>
                                            <td> {!! @$lvpost->my_status !!} </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.info-box -->
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection
