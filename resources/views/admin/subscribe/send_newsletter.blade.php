@extends('admin.master')
@section('title', $page_name)
@section('main-content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{ $page_name }}
        </h1>
        <ol class="breadcrumb">
            <li class="active"><a href="#"><i class="fa fa-user-plus"></i> {{ $page_name }}</a></li>
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
                        <h3 class="box-title">{{ $page_name }}</h3>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ route('send.newsletter.subscriber') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group ">
                                        <label>Posts<span class="text-danger">*</span></label>
                                        <select name="post_id[]" class="form-control post select2"
                                            data-placeholder="Select multiple Post"
                                            data-url="{{ route('newsletter.post.search') }}" multiple='multiple'>
                                        </select>
                                        @error('post_id')
                                            <p class="pt-2 text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group ">
                                        <label>Messages</label>
                                        <textarea rows="6" class="form-control" name="message" placeholder="{{ __('Enter Message') }}"
                                            value="{{ old('message') }}"></textarea>
                                    </div>
                                </div>

                                <div class="col-12 text-right">
                                    <button type="submit" class="btn btn-primary save"><i class="fa fa-send"></i>
                                        {{ __('Send Newsletter') }}</button>
                                </div>
                            </div>
                        </form>
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
@push('scripts')
    <script>
        $(document).ready(function() {

            $('.post.select2').select2({
                // tags:true,
                tokenSeparators: [','],
                placeholder: $(this).data('placeholder'),
                allowClear: true,

                ajax: {
                    url: $('.post').data('url'),
                    type: "POST",
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            search: params.term,
                            searchQuery: true
                        };
                    },
                    processResults: function(response) {
                        return {
                            results: response
                        };
                    },
                    cache: true
                }
            });

        });
    </script>
@endpush
