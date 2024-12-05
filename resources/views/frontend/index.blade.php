@extends('frontend.dashboard')
@section('forntend')
    <!--slider-area start-->
    @include('frontend.pages.homepage.banner')
    <!--slider-area end-->

    <!--about-us-area start-->
    @include('frontend.pages.homepage.about')
    <!--about-us-area end-->

    <!--features-area start-->
    <section class="feature-area pt-80 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-md-6">
                    <div class="features features-02 active pos-rel mb-30 wow fadeInUp2 animated" data-wow-delay='.1s'>
                        <div class="features-02__back" style="background-image: url(assets/img/shape/11.png);">
                        </div>
                        <div class="features__icon mb-25">
                            <i class="flaticon-donation-1"></i>
                        </div>
                        <div class="features__content">
                            <h3><a href="#">Food For Citizens</a></h3>
                            <p>Sed perspiciatis unde omnis natus voluatem ccntie</p>
                            <a class="more_btn2" href="about.html">read more <i class="far fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6">
                    <div class="features features-02 mb-30 wow fadeInUp2 animated" data-wow-delay='.3s'>
                        <div class="features-02__back" style="background-image: url(assets/img/shape/11.png);">
                        </div>
                        <div class="features__icon mb-25">
                            <i class="flaticon-blood-donation"></i>
                        </div>
                        <div class="features__content">
                            <h3><a href="#">Medical & Health</a></h3>
                            <p>Sed perspiciatis unde omnis natus voluatem ccntie</p>
                            <a class="more_btn2" href="about.html">read more <i class="far fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6">
                    <div class="features features-02 mb-30 wow fadeInUp2 animated" data-wow-delay='.5s'>
                        <div class="features-02__back" style="background-image: url(assets/img/shape/11.png);">
                        </div>
                        <div class="features__icon mb-25">
                            <i class="flaticon-donation"></i>
                        </div>
                        <div class="features__content">
                            <h3><a href="#">Mineral Water</a></h3>
                            <p>Sed perspiciatis unde omnis natus voluatem ccntie</p>
                            <a class="more_btn2" href="about.html">read more <i class="far fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6">
                    <div class="features features-02 mb-30 wow fadeInUp2 animated" data-wow-delay='.7s'>
                        <div class="features-02__back" style="background-image: url(assets/img/shape/11.png);">
                        </div>
                        <div class="features__icon mb-25">
                            <i class="flaticon-scholarship"></i>
                        </div>
                        <div class="features__content">
                            <h3><a href="#">Educations</a></h3>
                            <p>Sed perspiciatis unde omnis natus voluatem ccntie</p>
                            <a class="more_btn2" href="about.html">read more <i class="far fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--features-area end-->

    <!--donation-area start-->
    <section class="donation-area-03 grey-bg2 pos-rel pt-100 pb-75">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-7 col-lg-6 col-md-6">
                    <div class="doante-select-area donate-select-02 mb-30 mr-50 text-center white-bg wow fadeInUp2 animated"
                        data-wow-delay='.3s'>
                        <div class="section-title text-center mb-40 wow fadeInUp2 animated" data-wow-delay='.1s'>
                            <h2>Donate Us</h2>
                            <p>Sed perspiciatis unde omnis iste natus errvolu ptatem
                                accntium doloremque laudantiu aperiam</p>
                        </div>
                        <div class="select-area mb-10">
                            <select name="fund" id="fund">
                                <option value="Select Fund">Select Fund</option>
                                <option value="Select Fund">Poor Fund</option>
                                <option value="Select Fund">Refugee Fund</option>
                                <option value="Select Fund">Education Fund</option>
                                <option value="Select Fund">Water Fund</option>
                            </select>
                        </div>
                        <div class="donate-cart pos-rel mb-10">
                            <form class="donate-btn pos-rel" action="">
                                <input type="text" value="$500">
                            </form>
                        </div>
                        <button class="theme_btn theme_btn_bg">Donate now</button>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6 col-md-6">
                    <div class="about-wrapper about-wrap-02 mb-60">
                        <div class="section-title text-left mb-20 wow fadeInUp2 animated" data-wow-delay='.1s'>
                            <h6>Get Started With Us</h6>
                            <h2>Ready To Donate
                                Million Refugee</h2>
                        </div>
                        <p>Sed perspiciatis unde omnis iste natus voluptate
                            accntium doloremque laudantium totam aperiams
                            eaque ipsa quailinve ntore veritatis architecto</p>
                        <ul class="about_list mt-30 mb-20 wow fadeInUp2 animated" data-wow-delay='.2s'>
                            <li>Employee Giving Funds - Corporate Generosity</li>
                            <li>Make Honest Design Work For Digital Business</li>
                            <li>Building An E-Commerce Site With October</li>
                        </ul>
                        <a class="theme_btn theme_btn2 theme_btn_bg_02" href="about.html">Learn more</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--donation-area end-->

    <!--cases-area start-->
    <section class="cases-area-02 pos-rel pt-75 pb-100">
        <div class="container custom-container-04">
            <div class="row">
                <div class="col-xl-8 offset-xl-2">
                    <div class="section-title text-center mb-50 pl-50 pr-25 wow fadeInUp2 animated" data-wow-delay='.1s'>
                        <h2>Our Project</h2>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-xl-3 col-lg-6 col-md-6">
                    <div class="cases white-bg mb-30 wow fadeInUp2 animated" data-wow-delay='.2s'>

                        <div class="cases__box pos-rel">
                            <div class="cases__box--img">
                                <img src="{{ asset('frontend/assets/img/cases/01.jpg') }}" alt="">
                            </div>
                        </div>

                        <div class="cases__content mt-4">
                            <h4><a href="">Donate Your Mind For The Homeless Children</a></h4>
                            <p>Sed perspiciat unde omnis iste natus error voluptatem accntiume</p>

                            <a class="theme_btn theme_btn_bg mt-3" href="about.html">Learn more</a>

                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6">
                    <div class="cases white-bg mb-30 wow fadeInUp2 animated" data-wow-delay='.2s'>

                        <div class="cases__box pos-rel">
                            <div class="cases__box--img">
                                <img src="{{ asset('frontend/assets/img/cases/01.jpg') }}" alt="">
                            </div>
                        </div>

                        <div class="cases__content mt-4">
                            <h4><a href="">Donate Your Mind For The Homeless Children</a></h4>
                            <p>Sed perspiciat unde omnis iste natus error voluptatem accntiume</p>

                            <a class="theme_btn theme_btn_bg mt-3" href="about.html">Learn more</a>

                        </div>

                    </div>
                </div>

                <div class="col-xl-3 col-lg-6 col-md-6">
                    <div class="cases white-bg mb-30 wow fadeInUp2 animated" data-wow-delay='.2s'>

                        <div class="cases__box pos-rel">
                            <div class="cases__box--img">
                                <img src="{{ asset('frontend/assets/img/cases/01.jpg') }}" alt="">
                            </div>
                        </div>

                        <div class="cases__content mt-4">
                            <h4><a href="">Donate Your Mind For The Homeless Children</a></h4>
                            <p>Sed perspiciat unde omnis iste natus error voluptatem accntiume</p>

                            <a class="theme_btn theme_btn_bg mt-3" href="about.html">Learn more</a>

                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-6 col-md-6">
                    <div class="cases white-bg mb-30 wow fadeInUp2 animated" data-wow-delay='.2s'>

                        <div class="cases__box pos-rel">
                            <div class="cases__box--img">
                                <img src="{{ asset('frontend/assets/img/cases/01.jpg') }}" alt="">
                            </div>
                        </div>

                        <div class="cases__content mt-4">
                            <h4><a href="">Donate Your Mind For The Homeless Children</a></h4>
                            <p>Sed perspiciat unde omnis iste natus error voluptatem accntiume</p>
                            <a class="theme_btn theme_btn_bg mt-3" href="about.html">Learn more</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>
    <!--cases-area end-->

    <!--counter-area start-->
    <section class="counter-area counter-area-02 pos-rel pt-130 pb-60"
        style="background-image: url(assets/img/bg/07.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
                    <div class="counetrs mb-30 text-center wow fadeInUp2 animated" data-wow-delay='.1s'>
                        <div class="counetrs__icon mb-20"><i class="flaticon-social-care"></i></div>
                        <h1><span class="counter">85642</span></h1>
                        <p>Volunteer</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
                    <div class="counetrs mb-30 text-center wow fadeInUp2 animated" data-wow-delay='.3s'>
                        <div class="counetrs__icon mb-20"><i class="flaticon-donation"></i></div>
                        <h1><span class="counter">74523</span></h1>
                        <p>Global Partner</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
                    <div class="counetrs mb-30 text-center wow fadeInUp2 animated" data-wow-delay='.5s'>
                        <div class="counetrs__icon mb-20"><i class="flaticon-charity"></i></div>
                        <h1><span class="counter">65634</span></h1>
                        <p>Save Children</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
                    <div class="counetrs mb-30 text-center wow fadeInUp2 animated" data-wow-delay='.7s'>
                        <div class="counetrs__icon mb-20"><i class="flaticon-community"></i></div>
                        <h1><span class="counter">98563</span></h1>
                        <p>Refuge Shelter</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--counter-area end-->

    <!--team-area start-->
    @include('frontend.pages.homepage.team')
    <!--team-area end-->

    <!--blog-area start-->
    <section class="blog-area grey-bg2 pt-50 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 offset-xl-3">

                    <div class="section-title text-center mb-50  wow fadeInUp2 animated" data-wow-delay='.1s'>
                        <h2>Get Our EnaCare Every News & Blog</h2>
                    </div>

                </div>
            </div>
            <div class="row">

                <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInUp2 animated" data-wow-delay='.3s'>
                    <div class="blog blogs white-bg mb-30">
                        <div class="blog__thumb mb-40">
                            <img src="{{ asset('frontend/assets/img/blog/04.jpg') }}" alt="">
                        </div>
                        <div class="blog__content">
                            <a class="tag" href="blog-details.html">volunteer</a>
                            <h4 class="mb-15"><a href="blog-details.html">Experts Digital Accessibility
                                    Developments During</a></h4>
                            <p class="mb-25">Sed perspiciatis unde omnis iste natus
                                atem accntium doloremque</p>

                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInUp2 animated" data-wow-delay='.3s'>
                    <div class="blog blogs white-bg mb-30">
                        <div class="blog__thumb mb-40">
                            <img src="{{ asset('frontend/assets/img/blog/04.jpg') }}" alt="">
                        </div>
                        <div class="blog__content">
                            <a class="tag" href="blog-details.html">volunteer</a>
                            <h4 class="mb-15"><a href="blog-details.html">Experts Digital Accessibility
                                    Developments During</a></h4>
                            <p class="mb-25">Sed perspiciatis unde omnis iste natus
                                atem accntium doloremque</p>

                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInUp2 animated" data-wow-delay='.3s'>
                    <div class="blog blogs white-bg mb-30">
                        <div class="blog__thumb mb-40">
                            <img src="{{ asset('frontend/assets/img/blog/04.jpg') }}" alt="">
                        </div>
                        <div class="blog__content">
                            <a class="tag" href="blog-details.html">volunteer</a>
                            <h4 class="mb-15"><a href="blog-details.html">Experts Digital Accessibility
                                    Developments During</a></h4>
                            <p class="mb-25">Sed perspiciatis unde omnis iste natus
                                atem accntium doloremque</p>

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <!--blog-area end-->

    <!--testimonial-area start-->
    @include('frontend.pages.homepage.testimonial')
    <!--testimonial-area end-->

    <!--brand-area start-->
    <section class="brand-area grey-bg2 pt-70">
        <div class="container custom-container-03">
            <div class="row brand-active pb-60">
                <div class="col-xl-2">
                    <div class="brand-slide text-center wow fadeInUp animated" data-wow-delay='.1s'>
                        <div class="brand-img">
                            <a href="#"><img src="{{ asset('frontend/assets/img/brand/01.png') }}"
                                    alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2">
                    <div class="brand-slide text-center wow fadeInUp animated" data-wow-delay='.3s'>
                        <div class="brand-img">
                            <a href="#"><img src="{{ asset('frontend/assets/img/brand/02.png') }}"
                                    alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2">
                    <div class="brand-slide text-center wow fadeInUp animated" data-wow-delay='.5s'>
                        <div class="brand-img">
                            <a href="#"><img src="{{ asset('frontend/assets/img/brand/03.png') }}"
                                    alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2">
                    <div class="brand-slide text-center wow fadeInUp animated" data-wow-delay='.7s'>
                        <div class="brand-img">
                            <a href="#"><img src="{{ asset('frontend/assets/img/brand/04.png') }}"
                                    alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2">
                    <div class="brand-slide text-center wow fadeInUp animated" data-wow-delay='.9s'>
                        <div class="brand-img">
                            <a href="#"><img src="{{ asset('frontend/assets/img/brand/05.png') }}"
                                    alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2">
                    <div class="brand-slide text-center wow fadeInUp animated" data-wow-delay='.3s'>
                        <div class="brand-img">
                            <a href="#"><img src="{{ asset('frontend/assets/img/brand/01.png') }}"
                                    alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2">
                    <div class="brand-slide text-center wow fadeInUp animated" data-wow-delay='.5s'>
                        <div class="brand-img">
                            <a href="#"><img src="{{ asset('frontend/assets/img/brand/02.png') }}"
                                    alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2">
                    <div class="brand-slide text-center wow fadeInUp animated" data-wow-delay='.7s'>
                        <div class="brand-img">
                            <a href="#"><img src="{{ asset('frontend/assets/img/brand/03.png') }}"
                                    alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--brand-area end-->
@endsection
