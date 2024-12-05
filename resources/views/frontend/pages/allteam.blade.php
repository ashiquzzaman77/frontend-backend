@extends('frontend.dashboard')
@section('forntend')
@section('title')
@endsection

<!--page-title-area start-->
@include('frontend.pages.common_banner')
<!--page-title-area end-->

<!--team-area start-->
<section class="team-area-02 pt-75 pb-50">
    <div class="container">
        <div class="row">

            @forelse ($teams as $team)
                <div class="col-xl-4 col-lg-6 col-md-6 mb-30 wow fadeInUp animated"
                    data-wow-delay="{{ $loop->index * 0.2 }}s">
                    <div class="teams white-bg mb-30">
                        <div class="teams__thumb pos-rel mb-30">

                            <div class="teams__thumb--img pos-rel">
                                <img src="{{ !empty(optional($team)->image) ? url('storage/' . optional($team)->image) : 'https://ui-avatars.com/api/?name=' . urlencode(optional($team)->name) }}"
                                    alt="">
                            </div>

                            <div class="teams__thumb--social">
                                <a href="{{ $team->facebook }}">
                                    <i class="fab fa-facebook-f"></i>
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="{{ $team->twitter }}">
                                    <i class="fab fa-twitter"></i>
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="{{ $team->instagram }}">
                                    <i class="fab fa-youtube"></i>
                                    <i class="fab fa-youtube"></i>
                                </a>
                                <a href="{{ $team->linkedin }}">
                                    <i class="fab fa-linkedin"></i>
                                    <i class="fab fa-linkedin"></i>
                                </a>
                            </div>
                        </div>

                        <div class="teams__content text-center">
                            <h3 class="semi-02-title"><a href="javascript:;">{{ $team->name }}</a></h3>
                            <p>{{ $team->designation }}</p>
                        </div>

                    </div>
                </div>
            @empty
                <p>No Team Member Avaiable</p>
            @endforelse

        </div>
    </div>
</section>
<!--team-area end-->
@endsection
