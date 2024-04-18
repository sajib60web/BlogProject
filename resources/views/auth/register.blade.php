@extends('frontend.layouts.app')

@section('title', 'Sign Up')

@section('mainContent')
<section class="category-wrap-layout-1 space-top-30 bg-color-light-1 transition-default mb-5">
    <div class="container">
        <div class="row g-3 justify-content-center">
            <div class="col-sm-8">
                <div class="box-border-dark-1 bg-color-scandal padding-29 px-xs-0 radius-default transition-default">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="name" class="col-form-label text-md-end">{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="email" class="col-form-label text-md-end">{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="password" class="col-form-label text-md-end">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="password-confirm" class="col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                        <div class="form-group mb-0">
                            <button type="submit" class="axil-btn axil-btn-fill axil-btn-large btn-color-alter btn-bold">
                                Sign Up <i class="solid-login"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection