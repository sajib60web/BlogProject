@extends('frontend.layouts.app')

@section('title', 'Sign Up')
@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    .fa-brands, .fab {
        font-family: "Font Awesome 6 Brands" !important;
    }
</style>
@endpush
@section('mainContent')
<section class="category-wrap-layout-1 space-top-30 bg-color-light-1 transition-default mb-5">
    <div class="container">
        <div class="row g-3 justify-content-center">
            <div class="col-sm-8">
                <div class="box-border-dark-1 bg-color-scandal padding-29 px-xs-0 radius-default transition-default">
                    <h3 style="text-align: center; margin: 0;padding: 0;">Sing Up</h3>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="name" class="col-form-label text-md-end">{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Enter Name" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="email" class="col-form-label text-md-end">{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="Enter Email Address" autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="password" class="col-form-label text-md-end">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="Enter Password" autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="password-confirm" class="col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Enter Confirm Password" autocomplete="new-password">
                        </div>
                        <div class="form-group mb-2">
                            <button type="submit" class="axil-btn axil-btn-fill axil-btn-large btn-color-alter btn-bold">
                                Sign Up <i class="solid-login"></i>
                            </button>
                        </div>
                        {{-- <div class="form-group mb-0 text-center" style="margin-top: 5px">
                            <div class="axil-social social-layout-1 size-small gap-12">
                                <ul>
                                    @if (settingsSocial('facebook_status') == 1)
                                        <li class="facebook">
                                            <a href="{{ route('social.login','facebook') }}">
                                                <i class="solid-facebook2"></i>
                                            </a>
                                        </li>
                                    @endif
                                    @if (settingsSocial('google_status') == 1)
                                        <li class="instagram">
                                            <a href="{{ route('social.login','google') }}">
                                                <i class="fa-brands fa-google"></i>
                                            </a>
                                        </li>
                                    @endif
                                    @if (settingsSocial('github_status') == 1)
                                        <li class="pinterest">
                                            <a href="{{ route('social.login','github') }}" style="border-color: black;background-color: black;">
                                                <i class="fa-brands fa-github"></i>
                                            </a>
                                        </li>
                                    @endif
                                    @if (settingsSocial('linkedin_status') == 1)
                                        <li class="mail-fast">
                                            <a href="{{ route('social.login','linkedin') }}" style="border-color: #0077b5;background-color: #0077b5black;">
                                                <i class="fa-brands fa-linkedin-in"></i>
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection