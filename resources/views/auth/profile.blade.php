@extends('frontend.layouts.app')

@section('title', $page_name)

@section('mainContent')
<!--=====================================-->
<!--=       breadcrumb Area Start       =-->
<!--=====================================-->
<section class="breadcrumb-wrap-layout1 bg-color-old-lace">
    <div class="container">
        <div class="breadcrumb-layout1">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $page_name }}</li>
                </ol>
            </nav>
        </div>
    </div>
</section>
<!--=====================================-->
<!--=          Contact Area Start       =-->
<!--=====================================-->
<section class="author-wrap-layout-1 bg-color-light-1 transition-default">
    <div class="pt-5 pb-5 bg-color-light-2 transition-default">
        <div class="container">
            <div class="author-box-layout1">
                <div class="figure-holder img-height-100">
                    <img width="178" height="178" src="{{ asset('assets/frontend') }}/media/blog/author.webp" alt="Author">
                </div>
                <div class="content-holder">
                    <h3 class="title h3-regular">{{ $profile->name }}</h3>
                    <div class="designation">Author</div>
                    <p class="description">{{ $profile->about }}</p>
                    <div class="axil-social social-layout-1 size-small gap-12">
                        <ul>
                            <li class="facebook">
                                <a aria-label="Learn more from Facebook" href="https://facebook.com/">
                                    <i class="solid-facebook2"></i>
                                </a>
                            </li>
                            <li class="instagram">
                                <a aria-label="Learn more from Instagram" href="https://instagram.com/">
                                    <i class="regular-instagram"></i>
                                </a>
                            </li>
                            <li class="mail-fast">
                                <a aria-label="Learn more from Mail fast" href="https://mail-fast.com/">
                                    <i class="regular-mail-fast"></i>
                                </a>
                            </li>
                            <li class="pinterest">
                                <a aria-label="Learn more from Pinterest" href="https://pinterest.com/">
                                    <i class="regular-pinterest"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-body">
                    <form method="POST" action="{{ route('user.profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group mb-2">
                                    <label for="picture" class="col-form-label text-md-end">{{ __('Profile Picture') }}</label>
                                    <input id="picture" type="file" class="form-control" name="picture">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group mb-2">
                                    <label for="name" class="col-form-label text-md-end">{{ __('Name') }}</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name',$profile->name) }}" required autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group mb-2">
                                    <label for="email" class="col-form-label text-md-end">{{ __('Email Address') }}</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email',$profile->email) }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group mb-2">
                                    <label for="address" class="col-form-label text-md-end">{{ __('Address') }}</label>
                                    <textarea id="address" class="form-control @error('address') is-invalid @enderror" name="address">{{ old('address',$profile->address) }}</textarea>
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group mb-2">
                                    <label for="about" class="col-form-label text-md-end">{{ __('About') }}</label>
                                    <textarea id="about" class="form-control @error('about') is-invalid @enderror" name="about">{{ old('about',$profile->about) }}</textarea>
                                    @error('about')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group mb-2">
                                    <label for="password" class="col-form-label text-md-end">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group mb-2">
                                    <label for="password-confirm" class="col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                                </div>
                            </div>
                            <div class="col-sm-12 mt-2">
                                <div class="form-group mb-0">
                                    <button type="submit" class="axil-btn axil-btn-fill axil-btn-large btn-color-alter btn-bold">
                                        Profile Update <i class="solid-login"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection