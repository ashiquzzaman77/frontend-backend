<x-admin-app-layout :title="'About Create'">

    <div class="page-content">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">About</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Create About</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('admin.about.index') }}" class="btn btn-dark rounded-0 px-3">Back To List
                    </a>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->

        <h6 class="mb-0 text-uppercase">Create About In Site</h6>
        <hr />

        <div class="card">
            <div class="card-body">

                <form action="{{ route('admin.about.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">

                        <div class="col-6 col-lg-3 mb-3">
                            <label for="" class="mb-2">Status</label>
                            <select name="status" required class="form-select" id="">
                                <option selected value="" disabled>Choose Option...</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>

                        <div class="col-6 col-lg-3 mb-3">
                            <label for="" class="mb-2">Badge</label>
                            <input type="text" class="form-control" required placeholder="Badge" name="badge"
                                value="{{ old('badge') }}">
                        </div>

                        <div class="col-6 col-lg-3 mb-3">
                            <label for="" class="mb-2">Name</label>
                            <input type="text" class="form-control" required placeholder="Name" name="name"
                                value="{{ old('name') }}">
                        </div>

                        <div class="col-6 col-lg-12 mb-3">
                            <label for="" class="mb-2">Short Description</label>
                            <textarea name="short_descp" id="" cols="3" rows="3" class="form-control">{{ old('short_descp') }}</textarea>
                        </div>

                        <div class="col-6 col-lg-12 mb-3">
                            <label for="" class="mb-2">Long Description</label>
                            <textarea name="long_descp" id="" class="form-control editor">{!! old('long_descp') !!}</textarea>
                        </div>

                        <div class="col-3 col-lg-3 mb-3">
                            <label for="imageInputOne" class="mb-2">Image One</label>
                            <input type="file" class="form-control" name="image_one" id="imageInputOne">
                            <div class="mt-2">
                                <!-- Image Preview for Image One -->
                                <img id="imagePreviewOne" src="#" alt="Image One Preview"
                                    style="display: none; width: 30%; height: auto;" />
                            </div>
                        </div>

                        <div class="col-3 col-lg-3 mb-3">
                            <label for="imageInputTwo" class="mb-2">Image Two</label>
                            <input type="file" class="form-control" name="image_two" id="imageInputTwo">
                            <div class="mt-2">
                                <!-- Image Preview for Image Two -->
                                <img id="imagePreviewTwo" src="#" alt="Image Two Preview"
                                    style="display: none; width: 30%; height: auto;" />
                            </div>
                        </div>


                        <div class="col-12 col-lg-12 mb-3">
                            <button type="submit" class="btn btn-outline-primary rounded-0 px-3 float-end">Data
                                Submit</button>
                        </div>

                    </div>
                </form>

            </div>
        </div>

    </div>

    <script>
        // JavaScript for image preview for Image One
        document.getElementById('imageInputOne').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('imagePreviewOne');

            // If there's a file, show the image preview
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result; // Set the preview image source to the file's data URL
                    preview.style.display = 'block'; // Show the preview image
                };
                reader.readAsDataURL(file); // Read the file as a data URL
            } else {
                preview.style.display = 'none'; // Hide the preview if no file is selected
            }
        });

        // JavaScript for image preview for Image Two
        document.getElementById('imageInputTwo').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('imagePreviewTwo');

            // If there's a file, show the image preview
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result; // Set the preview image source to the file's data URL
                    preview.style.display = 'block'; // Show the preview image
                };
                reader.readAsDataURL(file); // Read the file as a data URL
            } else {
                preview.style.display = 'none'; // Hide the preview if no file is selected
            }
        });
    </script>


</x-admin-app-layout>
