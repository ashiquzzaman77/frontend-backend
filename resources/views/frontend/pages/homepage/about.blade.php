<section class="about-area grey-bg2 pt-180 pb-25">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-6 col-lg-6 col-md-12">
                <div class="about-img-02 mb-30 pos-rel">
                    <div class="about-img-02__thumb pr-45">

                        <img style="width:335px;height: 370px;"
                            src="{{ !empty(optional($about)->image_one) ? url('storage/' . optional($about)->image_one) : 'https://ui-avatars.com/api/?name=' . urlencode(optional($about)->name) }}"
                            alt="">

                    </div>
                    <div class="about-img-02__thumb-02 ml-100">

                        <img style="width:385px;height: 385px;"
                            src="{{ !empty(optional($about)->image_two) ? url('storage/' . optional($about)->image_two) : 'https://ui-avatars.com/api/?name=' . urlencode(optional($about)->name) }}"
                            alt="">
                    </div>

                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12">
                <div class="about-wrapper about-wrap-02 mb-60 pl-40">
                    <div class="section-title text-left mb-20 wow fadeInUp2 animated" data-wow-delay='.1s'>
                        <h6>{{ optional($about)->badge }}</h6>
                        <h2>{{ optional($about)->name }}</h2>
                    </div>
                    <p>{!! optional($about)->short_descp !!}</p>
                    <p class="about_list mt-30 mb-20 wow fadeInUp2 animated" data-wow-delay='.2s'>
                        {!! optional($about)->long_descp !!}
                    </p>
                    <a class="theme_btn theme_btn_bg mt-20" href="">Read More</a>
                </div>
            </div>
        </div>
    </div>
</section>
