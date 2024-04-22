@extends('frontend.layouts.app')
@section('title', 'Reset Password')
@section('mainContent')
<section class="category-wrap-layout-1 space-top-30 bg-color-light-1 transition-default mb-5">
    <div class="container">
        <div class="row g-3 justify-content-center">
            <div class="col-sm-8">
                <div class="box-border-dark-1 bg-color-scandal padding-29 px-xs-0 radius-default transition-default">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="row mb-2 justify-content-center">
                            <div class="col-md-6">
                                <label for="email" class="col-form-label text-md-end">{{ __('Email Address') }}<span class="text-danger">*</span></label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required readonly autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-2 justify-content-center">
                            <div class="col-md-6">
                                <label for="password" class="col-form-label text-md-end">{{ __('Password') }}<span class="text-danger">*</span></label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-2 justify-content-center">
                            <div class="col-md-6">
                                <label for="password-confirm" class="col-form-label text-md-end">{{ __('Confirm Password') }}<span class="text-danger">*</span></label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="row mb-0 justify-content-center">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection