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
        <div class="col-xs-12">
        <!-- /.box -->
            <div class="box">
                <div class="box-header">
                    @can('contact-message-list')
                        <a href="{{ route('contact_messages.index') }}" style="float: right;" class="btn btn-success btn-sm">
                            Manage
                        </a>
                    @endcan
                </div>
                <hr>
                <!-- /.box-header -->
                <div class="box-body">

                    <div  >
                       <span >{{$contact->name}}</span><br/>
                        <span >{{$contact->message}}</span><br/>
                    </div>
                    <h4>Replay</h4>
                    {!! Form::open(array('route' => 'contact.replay.send','method'=>'POST' ,'enctype'=>'multipart/form-data')) !!}
                        <div class="row">
                            <div class=" ">
                                <input type="hidden" value="{{$contact->id}}" name="contact_id" />
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Message: <span style="color: red;">*</span></label>
                                        {!! Form::textarea('messages', old('messages',null), array('placeholder' => 'Enter messages','class' => 'form-control ')) !!}
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                                    <button type="submit" class="btn btn-primary pull-right">Replay Send</button>
                                </div>
                            </div>
                        </div>
                    {!! Form::close() !!}
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">SL</th>
                                    <th scope="col">Messages</th>
                                    <th scope="col">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach (\App\Models\ContactMessage::where('contact_id',$contact->id)->orderByDesc('id')->get() as $k => $contactreplay)
                                <tr>
                                    <td>{{ $k+1 }}</td>
                                    <td>{{ $contactreplay->message }}</td>
                                    <td>{{ \Carbon\Carbon::parse($contactreplay->created_at)->diffForHumans() }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>



                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection
