<section class="team-area-02 pt-100 pb-20">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 offset-xl-2">
                <div class="section-title text-center mb-50 pl-50 pr-25 wow fadeInUp2 animated" data-wow-delay='.1s'>
                    <h2>Our Team Member</h2>
                </div>
            </div>
        </div>
        <div class="row">

            @forelse ($teams as $team)
                <div class="col-xl-4 col-lg-6 col-md-6 mb-30 wow fadeInUp animated" data-wow-delay='.2s'>
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
                            <h3 class="semi-02-title"><a href="">{{ $team->name }}</a></h3>
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
