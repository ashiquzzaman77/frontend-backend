<x-admin-app-layout :title="'Meta Setting'">

    <div class="page-content">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Meta</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">All Meta</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        <!--begin::Form-->
        <form class="form" action="{{ route('admin.meta.updateOrCreateMeta') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="card p-3">

                <div class="card-body">

                    <!--begin::Input group-->
                    <div class="row">

                        <div class="col-lg-4 mb-3">
                            <label for="site_name" class="mb-2">Meta Name</label>
                            <input id="name" type="text" class="form-control" name="name"
                                value="{{ old('name', optional($meta->first())->name) }}" placeholder="Enter the Name">
                        </div>

                        <div class="col-lg-12 mb-3">
                            <label for="site_name" class="mb-2">Keyword</label>
                            <textarea name="keyword" class="form-control" cols="2" rows="2">{{ old('keyword', optional($meta->first())->keyword) }}</textarea>
                        </div>

                        <div class="col-lg-12 mb-3">
                            <label for="site_name" class="mb-2">Description</label>
                            <textarea name="description" class="form-control editor">{{ old('description', optional($meta->first())->description) }}</textarea>
                        </div>

                        <div class="col-12 mt-5">
                            <button type="submit" class="btn btn-outline-primary rounded-0 px-3 float-end">Submit
                                Data</button>
                        </div>

                    </div>

                </div>

            </div>
        </form>

    </div>

</x-admin-app-layout>
