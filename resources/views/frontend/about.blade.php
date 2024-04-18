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
                    <li class="breadcrumb-item active" aria-current="page">About</li>
                </ol>
            </nav>
        </div>
    </div>
</section>
<!--=====================================-->
<!--=          Contact Area Start       =-->
<!--=====================================-->
<section class="about-wrap-layout-1 space-top-60 space-bottom-60 space-bottom-md-30 bg-color-selago transition-default">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-6 order-lg-2">
                <div class="about-box-layout-1 box-border-dark-1-fixed radius-default">
                    <div class="figure-holder radius-medium img-height-100">
                        <img width="700" height="566" src="{{ asset('assets/frontend') }}/media/about/about3.webp" alt="ABOUT">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 order-lg-1">
                <div class="about-box-layout-1 pe-lg-5">
                    <div class="content-holder">
                        <h2 class="entry-title color-dark-1-fixed">Our Story</h2>
                        <p class="entry-description color-dark-1-fixed">On August 15th, an alarming email popped up in the inbox of Diana Pearl, a New York-based news editor. Someone in Moscow had logged into her verified Twitter account, it said. Pearl was familiar with the email content’s theme as it resembled previous automated correspondence from Twitter — featuring a minimal white background.</p>
                        <p class="entry-description color-dark-1-fixed">Notes generate random lorem text when needed, either as pre-installed module or plug-in to be added. Word selection or sequence don’t necessarily match the original, which is intended to add variety.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="about-wrap-layout-1 space-top-60 space-bottom-60 space-bottom-md-30 bg-color-light-1 transition-default">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="about-box-layout-1 box-border-dark-1 radius-default">
                    <div class="figure-holder radius-medium img-height-100">
                        <img width="700" height="566" src="{{ asset('assets/frontend') }}/media/about/about1.webp" alt="ABOUT">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-box-layout-1">
                    <div class="content-holder">
                        <h2 class="title">The Professional Publishing Platform</h2>
                        <p class="description">Professional context it often happens that private or corporate clients corder a publication to be made and presented with the actual content still not being ready. Think of a news blog that’s filled with content hourly on the day of going live. However, reviewers tend to be distracted by comprehensible content, say, a random text copied from a newspaper or the internet. The are likely to focus on the text, disregarding the layout and its elements.</p>
                        <ul class="list-style-1">
                            <li>Leave extra space between you and other cars</li>
                            <li>Contrary to popular belief, Lorem Ipsum is not simply random text</li>
                            <li>There are many variations of passages of Lorem Ipsum available</li>
                            <li>Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="about-wrap-layout-2 space-top-60 space-bottom-60 space-bottom-md-30 bg-color-light-2">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-6 order-lg-2">
                <div class="about-box-layout-1 box-border-dark-1 radius-default">
                    <div class="figure-holder radius-medium img-height-100">
                        <a href="https://www.youtube.com/watch?v=1iIZeIy7TqM" aria-label="Youtube Video" class="play-btn style-2 size-regular popup-youtube"><i class="solid-play"></i></a>
                        <img width="700" height="566" src="{{ asset('assets/frontend') }}/media/about/about2.webp" alt="ABOUT">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 order-lg-1">
                <div class="about-box-layout-1">
                    <div class="content-holder">
                        <h2>Our Growing News Network</h2>
                        <p>Cicero famously orated against his political opponent Lucius Sergius Catilina. Occasionally the first Oration against Catiline is taken for type specimens: Quo usque tandem abutere, Catilina, patientia nostra? Quam diu etiam furor iste tuus nos eludet?</p>
                        <h3 class="h3-medium mb-2">Network Terms:</h3>
                        <p>Most text editors like MS Word or Lotus Notes generate random lorem text when needed, either as pre-installed module or plug-in to be added. Word selection or sequence don’t necessarily match the original, which is intended to add variety.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="team-wrap-layout2 space-top-50 bg-color-light-1 transition-default">
    <div class="container">
        <div class="section-heading heading-style-10">
            <h2 class="title">Meet Our Team</h2>
            <p class="description">Most text editors like MS Word or Lotus Notes generate random lorem text when </p>
        </div>
        <div class="row g-3">
            <div class="col-md-4">
                <div class="team-layout-2">
                    <div class="figure-holder">
                        <a href="author.html" class="link-wrap img-height-100"><img width="520" height="520" src="{{ asset('assets/frontend') }}/media/team/team4.webp" alt="Team"></a>
                    </div>
                    <div class="content-holder">
                        <div>
                            <h3 class="entry-title h3-medium"><a href="author.html" class="link-wrap">Georges Embolo</a></h3>
                            <div class="entry-designation text-b4 f-w-500">Publisher</div>
                        </div>
                        <div class="axil-social social-layout-1 size-medium gap-8">
                            <ul>
                                <li class="pinterest">
                                    <a aria-label="Learn more from Pinterest" href="https://pinterest.com/">
                                        <i class="solid-pinterest-01"></i>
                                    </a>
                                </li>
                                <li class="twitter">
                                    <a aria-label="Learn more from Tweeter" href="https://twitter.com/">
                                        <i class="regular-tweeter"></i>
                                    </a>
                                </li>
                                <li class="mail-fast">
                                    <a aria-label="Learn more from Mail Fast" href="https://www.fastmail.com/">
                                        <i class="regular-mail-fast"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="team-layout-2">
                    <div class="figure-holder">
                        <a href="author.html" class="link-wrap img-height-100"><img width="520" height="520" src="{{ asset('assets/frontend') }}/media/team/team5.webp" alt="Team"></a>
                    </div>
                    <div class="content-holder">
                        <div>
                            <h3 class="entry-title h3-medium"><a href="author.html" class="link-wrap">Nayah Tantoh</a></h3>
                            <div class="entry-designation text-b4 f-w-500">Publisher</div>
                        </div>
                        <div class="axil-social social-layout-1 size-medium gap-8">
                            <ul>
                                <li class="pinterest">
                                    <a aria-label="Learn more from Pinterest" href="https://pinterest.com/">
                                        <i class="solid-pinterest-01"></i>
                                    </a>
                                </li>
                                <li class="twitter">
                                    <a aria-label="Learn more from Tweeter" href="https://twitter.com/">
                                        <i class="regular-tweeter"></i>
                                    </a>
                                </li>
                                <li class="mail-fast">
                                    <a aria-label="Learn more from Mail Fast" href="https://www.fastmail.com/">
                                        <i class="regular-mail-fast"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="team-layout-2">
                    <div class="figure-holder">
                        <a href="author.html" class="link-wrap img-height-100"><img width="520" height="520" src="{{ asset('assets/frontend') }}/media/team/team6.webp" alt="Team"></a>
                    </div>
                    <div class="content-holder">
                        <div>
                            <h3 class="entry-title h3-medium"><a href="author.html" class="link-wrap">John Philipe</a></h3>
                            <div class="entry-designation text-b4 f-w-500">Publisher</div>
                        </div>
                        <div class="axil-social social-layout-1 size-medium gap-8">
                            <ul>
                                <li class="pinterest">
                                    <a aria-label="Learn more from Pinterest" href="https://pinterest.com/">
                                        <i class="solid-pinterest-01"></i>
                                    </a>
                                </li>
                                <li class="twitter">
                                    <a aria-label="Learn more from Tweeter" href="https://twitter.com/">
                                        <i class="regular-tweeter"></i>
                                    </a>
                                </li>
                                <li class="mail-fast">
                                    <a aria-label="Learn more from Mail Fast" href="https://www.fastmail.com/">
                                        <i class="regular-mail-fast"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection