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
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">SL</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Phone Number</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Message</th>
                                        <th scope="col">Post read</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($contact_messages as $k => $contact)
                                    <tr>
                                        <td>{{ $k+1 }}</td>
                                        <td>{{ $contact->name }}</td>
                                        <td>{{ $contact->phone_number }}</td>
                                        <td>{{ $contact->email }}</td>
                                        <td>{{ $contact->message }}</td>
                                        <td>{{ $contact->love_to_read }}</td>
                                        <td class="text-center">
                                            <a href="{{route('contact.replay',$contact->id)}}" class="btn btn-primary">Reply</a>
                                            @can('contact-message-delete')
                                                {!! Form::open(['method' => 'DELETE','route' => ['contact_messages.destroy', $contact->id],'style'=>'display:inline']) !!}
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
