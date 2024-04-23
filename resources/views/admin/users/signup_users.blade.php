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
                        {{-- @can('user-create')
                            <a href="{{ route('users.create') }}" style="float: right;" class="btn btn-success btn-sm">
                                Create
                            </a>
                        @endcan --}}
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">SL</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">E-mail</th>
                                        <th scope="col">Status</th>
                                        {{-- <th scope="col">Role</th> --}}
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($users as $k => $user)
                                    <tr>
                                        <td>{{ $k+1 }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{!! $user->my_status !!}</td>
                                        {{-- <td>{{ $user->getRoleNames()->first() }}</td> --}}
                                        {{-- <td class="text-center">
                                            <a href="{{ route('users.show',$user->id) }}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                            @can('user-edit')
                                                <a href="{{ route('users.edit',$user->id) }}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
                                            @endcan
                                            @can('user-delete')
                                                {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                                                <button class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure to Delete');"><i class="fa fa-trash"></i></button>
                                                {!! Form::close() !!}
                                            @endcan
                                        </td> --}}

                                        <td>
                                            @if ($user->status == App\Enums\Status::PENDING)
                                                {!! Form::open(['method' => 'PUT','route' => ['signup.users.approve', $user->id],'style'=>'display:inline']) !!}
                                                    <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-check"></i></button>
                                                {!! Form::close() !!}
                                                {!! Form::open(['method' => 'PUT','route' => ['signup.users.reject', $user->id],'style'=>'display:inline']) !!}
                                                    <button type="submit" class="btn btn-danger btn-sm"  ><i class="fa fa-times"></i></button>
                                                {!! Form::close() !!}
                                            @else
                                            ...
                                            @endif
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
