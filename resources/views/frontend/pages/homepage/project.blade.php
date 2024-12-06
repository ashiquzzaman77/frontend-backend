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

            @forelse ($projects as $project)
                <div class="col-xl-3 col-lg-6 col-md-6">
                    <div class="cases white-bg mb-30 wow fadeInUp2 animated"
                        data-wow-delay='.{{ ($loop->index + 1) * 0.2 }}s'>

                        <div class="cases__box pos-rel">
                            <div class="cases__box--img">
                                <img style="width: 370px;height: 265px;"
                                    src="{{ !empty($project->image) ? url('storage/' . $project->image) : 'https://ui-avatars.com/api/?name=' . urlencode($project->name) }}"
                                    alt="{{ $project->name }}">
                            </div>
                        </div>

                        <div class="cases__content mt-4">
                            <h4><a
                                    href="{{ route('project.show', ['slug' => $project->slug]) }}">{{ $project->name }}</a>
                            </h4>
                            <p>{!! $project->short_descp !!}</p>

                            <a class="theme_btn theme_btn_bg mt-3"
                                href="{{ route('project.show', ['slug' => $project->slug]) }}">View More</a>

                        </div>
                    </div>
                </div>
            @empty
                <p>No Project Avaiable</p>
            @endforelse

        </div>
    </div>

</section>
