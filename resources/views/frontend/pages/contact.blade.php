@extends('frontend.dashboard')
@section('forntend')
@section('title')
@endsection

<!--page-title-area start-->
{{-- @include('frontend.pages.common_banner') --}}

<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3652.1440783028856!2d90.42828817602282!3d23.742241039088256!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b86b2f4dba1d%3A0x290aef73c25f2789!2sBashabo%2C%20Dhaka!5e0!3m2!1sen!2sbd!4v1733379919834!5m2!1sen!2sbd"
                    width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    class="d-none d-md-block">
                </iframe>
            </div>
        </div>
    </div>
</section>



<!--page-title-area end-->

<!--join-team-area start-->
<section class="contacts-details-area pt-75 pb-50">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-xl-5 col-lg-6 col-md-6 d-none d-md-block">
                <div class="get-touch-area pl-50 pr-50">
                    <div class="section-title text-left mb-30 wow fadeInUp2 animated" data-wow-delay='.1s'>
                        <h6>Get In Touch</h6>
                        <h2 class="fs-3">Don’t Hesited To Contact Us</h2>
                    </div>
                    <div class="contacts d-flex align-items-center mb-30">
                        <div class="contacts__icon mr-25">
                            <i class="flaticon-phone-call"></i>
                        </div>
                        <div class="contacts__text">
                            <h4 class="semi-02-title">Phone Number</h4>
                            <h5>{{ optional($setting)->primary_phone }}</h5>
                        </div>
                    </div>
                    <div class="contacts d-flex align-items-center mb-30">
                        <div class="contacts__icon mr-25">
                            <i class="flaticon-chat"></i>
                        </div>
                        <div class="contacts__text">
                            <h4 class="semi-02-title">Email Address</h4>
                            <h5><a href="" class="__cf_email__">{{ optional($setting)->primary_email }}</a></h5>
                        </div>
                    </div>
                    <div class="contacts d-flex align-items-center mb-30">
                        <div class="contacts__icon mr-25">
                            <i class="flaticon-location"></i>
                        </div>
                        <div class="contacts__text">
                            <h4 class="semi-02-title">Our Location</h4>
                            <h5>{{ optional($setting)->address_line_one }}</h5>
                            <h5>{{ optional($setting)->address_line_two }}</h5>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-7 col-lg-6 col-md-6">
                <div class="donar-information donation-form grey-bg2 mb-30 pr-50 pl-50">

                    <div class="section-title text-left mb-50 wow fadeInUp2 animated" data-wow-delay='.1s'>
                        <h6>Send Message</h6>
                        <h2>Feel Free To Write Us Message.</h2>
                    </div>

                    <div class="main-contact-area">

                        <form action="{{ route('contact.store') }}" method="POST">
                            @csrf

                            <div class="input-area mb-10">
                                <input type="text" class="form-control" name="name" placeholder="Your Name">
                            </div>

                            <div class="input-area mb-10">
                                <input type="text" class="form-control" name="email" placeholder="Email Address">
                            </div>

                            <div class="input-area mb-10">
                                <input type="text" class="form-control" name="phone" placeholder="Phone">
                            </div>

                            <div class="input-area mb-10">
                                <input type="text" class="form-control" name="subject" placeholder="Subject">
                            </div>

                            <div class="input-area mb-10">
                                <textarea name="message" id="messsage" cols="30" rows="10" placeholder="Message"></textarea>
                            </div>

                            <div class="input-btn">
                                <button class="theme_btn theme_btn_bg large_btn">Send message</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--join-team-area end-->
@endsection
