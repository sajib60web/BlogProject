@extends('admin.master')
@section('title', $page_name)
@section('main-content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{ $page_name }}
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">{{ $page_name }}</li>
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
                        <h3 class="box-title">All {{ $page_name }}</h3>
                        @can('user-create')
                            <a href="{{ route('post.create') }}" style="float: right;" class="btn btn-success btn-sm">
                                Create
                            </a>
                        @endcan
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">SL</th>
                                        <th scope="col">title</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Sub-Category</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Image / Video</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($posts as  $post)
                                    <tr>
                                        <td>{{ $loop->index+1}}</td>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ @$post->category->name }}</td>
                                        <td>{{ @$post->subcategory->name }}</td>
                                        <td>
                                            @if ($post->post_type == App\Enums\PostType::ARTICLE)
                                             Article
                                            @else
                                             Video
                                            @endif
                                        </td>

                                        <td>
                                            {{@$post->image_video}}
                                        </td>
                                        <td> {!!@$post->my_status!!} </td>

                                        <td class="text-center">
                                             @can('post-edit')
                                                <a href="{{ route('post.edit',$post->id) }}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
                                            @endcan
                                            @can('post-delete')
                                                {!! Form::open(['method' => 'DELETE','route' => ['post.delete', $post->id],'style'=>'display:inline']) !!}
                                                <button class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure to Delete');"><i class="fa fa-trash"></i></button>
                                                {!! Form::close() !!}
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection
