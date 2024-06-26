<section class="newsletter-wrap-layout1 space-top-60 space-bottom-60 bg-color-light-1 transition-default">
    <div class="container">
        <div class="newsletter-box-layout1 box-border-dark-1 radius-default bg-color-perano">
            <h2 class="entry-title h2-medium f-w-700 color-dark-1-fixed">SUBSCRIBE TO OUR NEWSLETTER</h2>
            {{-- <p class="entry-description color-dark-1-fixed">Kurihara Harumi, born March 5, 1947, Shimoda, Shizuoka prefecture, Japan</p> --}}
            <form action="{{ route('user.subscribe') }}" method="POST" class="newsletter-form box-border-dark-1 box-shadow-large shadow-style-2 shadow-fixed transition-default radius-default">
                @csrf
                <input type="email" name="email" class="email-input" placeholder="Email Address">
                <button type="submit" class="axil-btn">
                    Subscribe<i class="solid-navigation"></i>
                </button>
            </form>
        </div>
    </div>
</section>