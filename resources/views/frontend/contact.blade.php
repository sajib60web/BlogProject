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
                    <li class="breadcrumb-item active" aria-current="page">Contact</li>
                </ol>
            </nav>
        </div>
    </div>
</section>
<!--=====================================-->
<!--=          Contact Area Start       =-->
<!--=====================================-->
<section class="contact-wrap-layout-1 space-top-30 bg-color-light-1 transition-default mb-5">
    <div class="container">
        <div class="row justify-content-center">
            @if ($page->description)
                <div class="col-lg-8">
                    {!! $page->description !!}
                </div>
            @endif
            <div class="col-lg-8">
                <div class="section-heading heading-style-9">
                    <h2 class="title">Get In Touch With Us?</h2>
                </div>
                <div class="row g-3">
                    <div class="col-md-12">
                        <div class="contact-layout-1 box-border-dark-1 radius-default bg-color-scandal box-shadow-medium shadow-style-2 transition-default">
                            <div class="contact-info-box">
                                <div class="box-icon">
                                    <i class="regular-call-out"></i>
                                </div>
                                <div class="contact-way">{{ setting()->phone_number }}</div>
                                <div class="contact-text">{{ setting()->address }}</div>
                                <a href="tel:{{ setting()->phone_number }}" class="axil-btn axil-btn-fill shadow-fixed axil-btn-small">Call Now<div class="icon-holder"><i class="regular-arrow-right"></i></div></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="contact-form-wrap box-border-dark-1 radius-default">
                            <h3 class="title">Submit Your Inquiry</h3>
                            <form method="POST" action="{{ route('contact-form') }}">
                                @csrf
                                <input class="form-control" type="text" name="name" placeholder="Name" required>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <input class="form-control" type="text" name="phone_number" placeholder="Phone Number" required>
                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <input class="form-control" type="email" name="email" placeholder="Email">
                                <textarea class="form-control" name="message" cols="30" rows="4" placeholder="Message" required></textarea>
                                @error('message')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="select-type">
                                    <label class="select-title">What Type Of Blogs Do You Love To Read?</label>
                                    <ul class="select-list">
                                        <li>
                                            <input class="styled-checkbox" id="styled-checkbox-1" name="love_to_read[]" type="checkbox" value="Travel">
                                            <label for="styled-checkbox-1">Travel</label>
                                        </li>
                                        <li>
                                            <input class="styled-checkbox" id="styled-checkbox-2" name="love_to_read[]" type="checkbox" value="Health">
                                            <label for="styled-checkbox-2">Health</label>
                                        </li>
                                        <li>
                                            <input class="styled-checkbox" id="styled-checkbox-3" name="love_to_read[]" type="checkbox" value="Music News">
                                            <label for="styled-checkbox-3">Music News</label>
                                        </li>
                                        <li>
                                            <input class="styled-checkbox" id="styled-checkbox-4" name="love_to_read[]" type="checkbox" value="Fashion">
                                            <label for="styled-checkbox-4">Fashion</label>
                                        </li>
                                        <li>
                                            <input class="styled-checkbox" id="styled-checkbox-5" name="love_to_read[]" type="checkbox" value="Education">
                                            <label for="styled-checkbox-5">Education</label>
                                        </li>
                                        <li>
                                            <input class="styled-checkbox" id="styled-checkbox-6" name="love_to_read[]" type="checkbox" value="Other">
                                            <label for="styled-checkbox-6">Other</label>
                                        </li>
                                    </ul>
                                </div>
                                <button type="submit" class="axil-btn axil-btn-fill axil-btn-large btn-color-alter btn-bold">
                                    Submit Now <i class="solid-navigation"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="map-wrap">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-heading heading-style-9">
                        <h2 class="title">Our Location</h2>
                        <p class="description">Visit our location for your query</p>
                    </div>
                    <div class="map-box box-border-dark-1 radius-default">
                        <div class="figure-holder radius-medium img-height-100">
                            {{-- <img width="810" height="400" src="{{ asset('assets/frontend') }}/media/elements/map.webp" alt="Map"> --}}
                            {!! setting()->embed_a_map !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-heading heading-style-9">
                    <h2 class="title">Frequently Asked Questions</h2>
                </div>
                <div class="faq-box-layout1 box-border-dark-1 radius-default">
                    <div id="accordion" class="accordion">
                        @foreach ($faqs as $key => $faq)
                            <div class="card single-item box-border-dark-1 border-top-0 border-start-0 border-end-0">
                                <div class="card-header item-nav">
                                    <a data-bs-toggle="collapse" data-bs-parent="#accordion" href="#collapse{{ $key }}">
                                        {{ $key+1 }}. {{ $faq->title }}
                                    </a>
                                </div>
                                <div id="collapse{{ $key }}" class="collapse item-content-wrap" data-bs-parent="#accordion">
                                    <div class="card-body item-content">
                                        <p>{{ $faq->description }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection