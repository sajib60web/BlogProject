@extends('admin.master')
@section('title', $page_name )
@section('style')
    <style>
        .form-check-label {
            text-transform: capitalize;
        }
    </style>
@endsection
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
                    @can('role.list')
                        <a href="{{ route('roles.index') }}" style="float: right;" class="btn btn-success btn-sm">
                            Manage
                        </a>
                    @endcan
                </div>
                <hr>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="col-sm-10 col-sm-offset-1">
                        <div class="col-12">
                            <div class="p-2">
                                <div class="form-group">
                                    <label for="name">Role Name: {{ $role->name }}</label>
                                </div>

                                <div class="form-group">
                                    <label for="name">Permissions</label>
                                    <hr>
                                    @php $i = 1; @endphp
                                    @foreach ($permission_groups as $group)
                                        <div class="row">
                                            @php
                                                $permissions = \App\Models\User::getpermissionsByGroupName($group->name);
                                                $j = 1;
                                            @endphp

                                            <div class="col-sm-3">
                                                <div class="form-check">
                                                    <label class="form-check-label" for="checkPermission">{{ $group->name }}</label>
                                                </div>
                                            </div>

                                            <div class="col-sm-9 role-{{ $i }}-management-checkbox">
                                                @foreach ($permissions as $permission)
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" onclick="checkSinglePermission('role-{{ $i }}-management-checkbox', '{{ $i }}Management', {{ count($permissions) }})" name="permissions[]" {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }} id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}">
                                                        <label style="text-transform: capitalize;" class="form-check-label" for="checkPermission{{ $permission->id }}">{{ str_replace(array('.', '_'), array(' ', ' '), $permission->name) }}</label>
                                                    </div>
                                                    @php  $j++; @endphp
                                                @endforeach
                                                <br>
                                            </div>
                                        </div>
                                        @php  $i++; @endphp
                                    @endforeach
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <a href="{{ route('roles.index') }}" role="button" class="btn btn-warning pull-right">Back To Role Manage</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection
