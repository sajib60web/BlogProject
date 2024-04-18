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
                        @can('role-create')
                            <a href="{{ route('roles.create') }}" style="float: right;" class="btn btn-success btn-sm">
                                Create
                            </a>
                        @endcan
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th width="20%" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($roles as $k => $role)
                                <tr>
                                    <td>{{ $k+1 }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td class="text-center">
                                        @if ($role->name == 'Super Admin')
                                            <a class="btn btn-sm btn-info" disabled role="button">Default</a>
                                        @else
                                            <a class="btn btn-sm btn-icon btn-success" href="{{ route('roles.show',$role->id) }}"><i class="fa fa-eye"></i></a>
                                            @can('role-edit')
                                                <a class="btn btn-sm btn-info" href="{{ route('roles.edit',$role->id) }}"><i class="fa fa-edit"></i></a>
                                            @endcan
                                            @can('role-delete')
                                                {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                                <button class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure to Delete');"><i class="fa fa-trash"></i></button>
                                                {!! Form::close() !!}
                                            @endcan
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
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
