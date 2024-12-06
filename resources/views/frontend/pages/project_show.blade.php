@extends('frontend.dashboard')
@section('forntend')
@section('title')
@endsection

<!--page-title-area start-->
@include('frontend.pages.common_banner')
<!--page-title-area end-->

<!--gallery-area start-->
<section class="gallery-area pt-75 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="row">

                    @forelse ($multiImages as $multiImage)
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="gallery pos-rel text-center wow fadeInUp2 animated" data-wow-delay='.3s'>
                                <div class="gallery__thumb pos-rel mb-30">
                                    <img style="width:370px;height: 370px;"
                                        src="{{ url('storage/' . $multiImage->multi_image) }}" alt="">
                                </div>
                                <div class="gallery__content">

                                    <a class="popup-image" href="{{ url('storage/' . $multiImage->multi_image) }}">

                                        <i class="far fa-plus"></i></a>

                                    <h3><a href="#">Donation</a></h3>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p>No Project Show</p>
                    @endforelse

                </div>
            </div>

        </div>
    </div>
</section>
<!--gallery-area end-->
@endsection
