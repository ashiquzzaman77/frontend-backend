@php
    $banner = optional($banner);
@endphp

@if ($banner->badge || $banner->name || $banner->sub_name || $banner->image)
    <div class="slider-area-03 pos-rel pt-40 pb-50">
        <div class="single-slider slider-height-03 pos-rel d-flex align-items-center">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-6">
                        <div class="slider__content slider__content__03 text-left">
                            <h5 class="sub-title mb-25 wow fadeInUp2 animated" data-wow-delay=".1s">
                                {{ $banner->badge }}
                            </h5>
                            <h1 class="main-title mb-35 wow fadeInUp2 animated" data-wow-delay=".1s">
                                {{ $banner->name }}
                            </h1>
                            <p class="mb-30">{{ $banner->sub_name }}</p>
                            <ul class="btn-list wow fadeInUp2 animated" data-wow-delay=".3s">
                                <li><a class="theme_btn theme_btn_bg" href="javascript::void();">Learn more</a></li>
                                <li><a class="theme_btn theme_btn2 theme_btn_bg_02" href="javascript::void();">Our
                                        cases</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="hero-img wow fadeInUp2 animated" data-wow-delay=".5s">
                            <img src="{{ url('storage/' . $banner->image) }}" alt="{{ $banner->name }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
