<section class="testimonial-area-02 testimonila-area-03 pt-100 pb-180">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 offset-xl-2">
                <div class="section-title text-center mb-90 pl-50 pr-50 wow fadeInUp2 animated" data-wow-delay='.1s'>
                    <h2>Our Clients Say About</h2>
                </div>
            </div>
        </div>
        <div class="testimonial-wrapper-03">
            <div class="row testtimonial-item-active">

                @foreach ($testimonials as $testimonial)
                    <div class="col-xl-6 testimonial-item-02 d-md-flex align-items-center wow fadeInUp2 animated"
                        data-wow-delay='.3s'>
                        <div class="testimonial-item__content">
                            <h4>{!! $testimonial->description !!}</h4>
                            <div class="author_box d-flex">

                                <div class=" mr-25">
                                    <img style="width:80px;height: 80px;" src="{{ !empty(optional($testimonial)->image) ? url('storage/' . optional($testimonial)->image) : 'https://ui-avatars.com/api/?name=' . urlencode(optional($testimonial)->name) }}" alt="">
                                </div>

                                <div class="author_box__content">
                                    <h4 class="semi-02-title">{{ $testimonial->name }}</h4>
                                    <p>{{ $testimonial->designation }}</p>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</section>
