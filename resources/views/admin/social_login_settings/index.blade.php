@extends('admin.master')
@section('title', $page_name )
@section('main-content')
<style>
    .span{
        border: 2px solid #dddddd;
        padding: 10px;
    }
</style>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{ $page_name }}
        </h1>
        <ol class="breadcrumb">
            <li  class="active"><a href="#"><i class="fa fa-list"></i> {{ $page_name }}</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="box">
                <div class="box-body">
                    <div class="col-sm-6 span">
                        <form action="{{ route('social_login_setting.update', ['facebook' => true]) }}" method="post">
                            @csrf
                            <h4 class="box-title">Facebook Login</h4>
                            <div class="form-group">
                                <label for="facebook_client_id" class="form-label">Client ID</label>
                                <input type="text" name="facebook_client_id" class="form-control" id="facebook_client_id" value="{{ old('facebook_client_id', settingsSocial('facebook_client_id')) }}" required>
                            </div>
                            <div class="form-group">
                                <label for="facebook_client_secret" class="form-label">Client Secret</label>
                                <input type="text" name="facebook_client_secret" class="form-control" id="facebook_client_secret" value="{{ old('facebook_client_secret', settingsSocial('facebook_client_secret')) }}" required>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" class="form-check-input" id="facebook_status" name="facebook_status" {{ old('status', settingsSocial('facebook_status')) == \App\Enums\Status::INACTIVE ? '' : 'checked' }}>
                                <label class="form-check-label me-3" for="facebook_status">Status</label>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-sm pull-right">Update</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-6 span">
                        <form action="{{ route('social_login_setting.update', ['google' => true]) }}" method="post">
                            @csrf
                            <h4 class="box-title">Google Login</h4>
                            <div class="form-group">
                                <label for="google_client_id" class="form-label">Client ID</label>
                                <input type="text" name="google_client_id" class="form-control" id="google_client_id" value="{{ old('google_client_id', settingsSocial('google_client_id')) }}" required>
                            </div>
                            <div class="form-group">
                                <label for="google_client_secret" class="form-label">Client Secret</label>
                                <input type="text" name="google_client_secret" class="form-control" id="google_client_secret" value="{{ old('google_client_secret', settingsSocial('google_client_secret')) }}" required>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" class="form-check-input" id="google_status" name="google_status" {{ old('status', settingsSocial('google_status')) == \App\Enums\Status::INACTIVE ? '' : 'checked' }}>
                                <label class="form-check-label me-3" for="google_status">Status</label>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-sm pull-right">Update</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-6 span">
                        <form action="{{ route('social_login_setting.update', ['github' => true]) }}" method="post">
                            @csrf
                            <h4 class="box-title">Github Login</h4>
                            <div class="form-group">
                                <label for="github_client_id" class="form-label">Client ID</label>
                                <input type="text" name="github_client_id" class="form-control" id="github_client_id" value="{{ old('github_client_id', settingsSocial('github_client_id')) }}" required>
                            </div>
                            <div class="form-group">
                                <label for="github_client_secret" class="form-label">Client Secret</label>
                                <input type="text" name="github_client_secret" class="form-control" id="github_client_secret" value="{{ old('github_client_secret', settingsSocial('github_client_secret')) }}" required>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" class="form-check-input" id="github_status" name="github_status" {{ old('status', settingsSocial('github_status')) == \App\Enums\Status::INACTIVE ? '' : 'checked' }}>
                                <label class="form-check-label me-3" for="github_status">Status</label>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-sm pull-right">Update</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-6 span">
                        <form action="{{ route('social_login_setting.update', ['linkedin' => true]) }}" method="post">
                            @csrf
                            <h4 class="box-title">Linkedin Login</h4>
                            <div class="form-group">
                                <label for="linkedin_client_id" class="form-label">Client ID</label>
                                <input type="text" name="linkedin_client_id" class="form-control" id="linkedin_client_id" value="{{ old('linkedin_client_id', settingsSocial('linkedin_client_id')) }}" required>
                            </div>
                            <div class="form-group">
                                <label for="linkedin_client_secret" class="form-label">Client Secret</label>
                                <input type="text" name="linkedin_client_secret" class="form-control" id="linkedin_client_secret" value="{{ old('linkedin_client_secret', settingsSocial('linkedin_client_secret')) }}" required>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" class="form-check-input" id="linkedin_status" name="linkedin_status" {{ old('status', settingsSocial('linkedin_status')) == \App\Enums\Status::INACTIVE ? '' : 'checked' }}>
                                <label class="form-check-label me-3" for="linkedin_status">Status</label>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-sm pull-right">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
