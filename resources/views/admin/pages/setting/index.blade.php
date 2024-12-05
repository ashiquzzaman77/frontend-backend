<x-admin-app-layout :title="'General Setting'">

    <div class="page-content">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Setting</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">All Setting</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        <!--begin::Form-->
        <form class="form" action="{{ route('admin.settings.updateOrCreate') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="card p-3">

                <div class="card-body">
                    <!--begin::Alerts-->
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <!--end::Alerts-->

                    <!--begin::Input group-->
                    <div class="row">

                        <div class="col-lg-3 mb-3">
                            <label for="site_name" class="mb-2">Site Name</label>

                            <input id="site_name" type="text" class="form-control" name="site_name"
                                value="{{ old('site_name', optional($setting->first())->site_name) }}"
                                placeholder="Enter the Site Name">
                        </div>


                        <div class="col-lg-3 mb-3">
                            <label for="site_slogan" class="mb-2">Site Slogan</label>
                            <input id="site_slogan" type="text" class="form-control" name="site_slogan"
                                value="{{ old('site_slogan', optional($setting->first())->site_slogan) }}"
                                placeholder="Enter the Site Slogan">
                        </div>

                        <div class="col-lg-3 mb-3">
                            <label for="primary_email" class="mb-2">Primary Email</label>
                            <input id="primary_email" type="email" class="form-control" name="primary_email"
                                value="{{ old('primary_email', optional($setting->first())->primary_email) }}"
                                placeholder="Enter the primary_email address">
                        </div>

                        <div class="col-lg-3 mb-3">
                            <label for="support_email" class="mb-2">Support Email</label>
                            <input id="support_email" type="email" class="form-control" name="support_email"
                                value="{{ old('support_email', optional($setting->first())->support_email) }}"
                                placeholder="Enter the support_email address">
                        </div>

                        <div class="col-lg-3 mb-3">
                            <label for="sales_email" class="mb-2">Sales Email</label>
                            <input id="sales_email" type="email" class="form-control" name="sales_email"
                                value="{{ old('sales_email', optional($setting->first())->sales_email) }}"
                                placeholder="Enter the sales_email address">
                        </div>

                        <div class="col-lg-3 mb-3">
                            <label for="primary_phone" class="mb-2">Primary Phone</label>
                            <input id="primary_phone" class="form-control" type="number" name="primary_phone"
                                value="{{ old('primary_phone', optional($setting->first())->primary_phone) }}"
                                placeholder="Enter the primary_phone">
                        </div>

                        <div class="col-lg-3 mb-3">
                            <label for="secondary_phone" class="mb-2">Secondary Phone</label>
                            <input id="secondary_phone" type="number" class="form-control" name="secondary_phone"
                                value="{{ old('secondary_phone', optional($setting->first())->secondary_phone) }}"
                                placeholder="Enter the secondary_phone">
                        </div>

                        <div class="col-lg-3 mb-3">
                            <label for="whatsapp" class="mb-2">Whatsapp Phone</label>
                            <input id="whatsapp" type="number" class="form-control" name="whatsapp"
                                value="{{ old('whatsapp', optional($setting->first())->whatsapp) }}"
                                placeholder="Enter the whatsapp">
                        </div>

                        <div class="col-lg-3 mb-3">
                            <label for="address_line_one" class="mb-2">Address One</label>
                            <input id="address_line_one" type="text" class="form-control" name="address_line_one"
                                value="{{ old('address_line_one', optional($setting->first())->address_line_one) }}"
                                placeholder="Enter the Address Line One">
                        </div>

                        <div class="col-lg-3 mb-3">
                            <label for="address_line_two" class="mb-2">Address Two</label>
                            <input id="address_line_two" class="form-control" type="text" name="address_line_two"
                                value="{{ old('address_line_two', optional($setting->first())->address_line_two) }}"
                                placeholder="Enter the Address Line Two">
                        </div>

                        {{-- <div class="col-lg-3 mb-3">
                            <label for="seo_keywords" class="mb-2">SEO Keywords</label>
                            <input id="seo_keywords" class="form-control" type="text" name="seo_keywords"
                                value="{{ old('seo_keywords', optional($setting->first())->seo_keywords) }}"
                                placeholder="Enter the SEO Keywords">
                        </div>

                        <div class="col-lg-3 mb-3">
                            <label for="seo_description" class="mb-2">SEO Description</label>
                            <input id="seo_description" class="form-control" type="text" name="seo_description"
                                value="{{ old('seo_description', optional($setting->first())->seo_description) }}"
                                placeholder="Enter the SEO Description">
                        </div> --}}

                        <div class="col-lg-3 mb-3">
                            <label for="social_facebook" class="mb-2">Social Facebook</label>
                            <input id="social_facebook" type="text" class="form-control" name="social_facebook"
                                value="{{ old('social_facebook', optional($setting->first())->social_facebook) }}"
                                placeholder="Enter the Facebook URL">
                        </div>

                        <div class="col-lg-3 mb-3">
                            <label for="social_twitter" class="mb-2">Social Twitter</label>
                            <input id="social_twitter" type="text" class="form-control" name="social_twitter"
                                value="{{ old('social_twitter', optional($setting->first())->social_twitter) }}"
                                placeholder="Enter the Twitter URL">
                        </div>

                        <div class="col-lg-3 mb-3">
                            <label for="social_instagram" class="mb-2">Social Instagram</label>
                            <input id="social_instagram" class="form-control" type="text" name="social_instagram"
                                value="{{ old('social_instagram', optional($setting->first())->social_instagram) }}"
                                placeholder="Enter the Instagram URL">
                        </div>

                        <div class="col-lg-3 mb-3">
                            <label for="social_linkedin" class="mb-2">Social LinkedIn</label>
                            <input id="social_linkedin" class="form-control" type="text" name="social_linkedin"
                                value="{{ old('social_linkedin', optional($setting->first())->social_linkedin) }}"
                                placeholder="Enter the LinkedIn URL">
                        </div>

                        <div class="col-lg-3 mb-3">
                            <label for="social_youtube" class="mb-2">Social Youtube</label>
                            <input id="social_youtube" class="form-control" type="text" name="social_youtube"
                                value="{{ old('social_youtube', optional($setting->first())->social_youtube) }}"
                                placeholder="Enter the YouTube URL">
                        </div>

                        <div class="col-lg-3">
                            <label for="maintenance_mode" class="mb-2">Maintenance Mode</label>
                            <select name="maintenance_mode" class="form-select">
                                <option selected disabled>Choose..</option>
                                <option value="1"
                                    {{ optional($setting->first())->maintenance_mode == 1 ? 'selected' : '' }}>Active
                                </option>
                                <option value="0"
                                    {{ optional($setting->first())->maintenance_mode == 0 ? 'selected' : '' }}>Inactive
                                </option>
                            </select>
                        </div>

                        <div class="col-lg-3 mb-3">
                            <label for="site_logo" class="mb-2">Site Logo</label>
                            <input id="site_logo" type="file" class="form-control" name="site_logo">

                            <img src="{{ !empty(optional($setting->first())->site_logo) && file_exists(public_path('storage/' . optional($setting->first())->site_logo)) ? asset('storage/' . optional($setting->first())->site_logo) : asset('frontend/images/no-logo(217-55).jpg') }}"
                            style="width: 100px;height:100px" class="mt-2" alt="">
                        </div>

                        <div class="col-lg-3 mb-3">
                            <label for="site_favicon" class="mb-2">Site Favicon</label>
                            <input id="site_favicon" type="file" class="form-control" name="site_favicon">

                            <img src="{{ !empty(optional($setting->first())->site_favicon) && file_exists(public_path('storage/' . optional($setting->first())->site_favicon)) ? asset('storage/' . optional($setting->first())->site_favicon) : asset('frontend/images/no-logo(217-55).jpg') }}"
                            style="width: 100px;height:100px" class="mt-2" alt="">

                        </div>



                        <div class="col-12 mt-5">
                            <button type="submit" class="btn btn-outline-primary rounded-0 px-3 float-end">Submit
                                Or Update</button>
                        </div>

                    </div>

                </div>

            </div>
        </form>

    </div>

</x-admin-app-layout>
