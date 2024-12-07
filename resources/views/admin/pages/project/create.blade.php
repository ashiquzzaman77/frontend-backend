<x-admin-app-layout :title="'Project Create'">

    <div class="page-content">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Project</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Create Project</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('admin.project.index') }}" class="btn btn-dark rounded-0 px-3">Back To List
                    </a>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->

        <h6 class="mb-0 text-uppercase">Create Project In Site</h6>
        <hr />

        <div class="card">
            <div class="card-body">

                <form action="{{ route('admin.project.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">

                        <div class="col-6 col-lg-2 mb-3">
                            <label for="" class="mb-2">Status</label>
                            <select name="status" class="form-select" id="">
                                <option selected disabled>Choose Option...</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>

                        <div class="col-6 col-lg-4 mb-3">
                            <label for="" class="mb-2">Name</label>
                            <input type="text" class="form-control" required placeholder="Project Name"
                                name="name" value="{{ old('name') }}">
                        </div>

                        <div class="col-6 col-lg-12 mb-3">
                            <label for="" class="mb-2">Short Description</label>
                            <textarea name="short_descp" placeholder="Short Description" id="" cols="3" rows="3"
                                class="form-control">{{ old('short_descp') }}</textarea>
                        </div>

                        <div class="col-6 col-lg-12 mb-3">
                            <label for="" class="mb-2">Long Description</label>
                            <textarea name="long_descp" placeholder="Long Description" id="" cols="10" rows="10" class="editor">{!! old('long_descp') !!}</textarea>
                        </div>

                        <div class="col-3 col-lg-3 mb-3">
                            <label for="" class="mb-2">Image</label>
                            <input type="file" class="form-control" name="image" id="imageInput">
                            <div class="mt-2">
                                <!-- Image Preview -->
                                <img id="imagePreview" src="#" alt="Image Preview"
                                    style="display: none; width: 30%; height: auto;" />
                            </div>
                        </div>

                        <div class="col-3 col-lg-3 mb-3">
                            <label for="" class="mb-2">Multi Image</label>
                            <input type="file" class="form-control" name="multi_image[]" id="multiImageInput"
                                multiple>
                            <div id="multiImagePreview" class="mt-2"></div>
                            <!-- Container for multiple image previews -->
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
        // JavaScript for single image preview
        document.getElementById('imageInput').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('imagePreview');

            // If there's a file, show the image preview
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result; // Set the preview image source to the file's data URL
                    preview.style.display = 'block'; // Show the preview image

                    // Set the width and height of the image preview
                    preview.style.width = '80px'; // Example: Width 100% of the container
                    preview.style.height = '80px'; // Maintain aspect ratio based on the width
                };
                reader.readAsDataURL(file); // Read the file as a data URL
            } else {
                preview.style.display = 'none'; // Hide the preview if no file is selected
            }
        });

        // JavaScript for multiple image preview
        document.getElementById('multiImageInput').addEventListener('change', function(event) {
            const files = event.target.files;
            const previewContainer = document.getElementById('multiImagePreview');

            // Clear previous previews
            previewContainer.innerHTML = '';

            // Loop through each selected file
            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                const reader = new FileReader();

                // Create an image element for each file
                reader.onload = function(e) {
                    const imgElement = document.createElement('img');
                    imgElement.src = e.target.result; // Set the image source
                    imgElement.style.width = '80px'; // Set image width
                    imgElement.style.height = '80px'; // Maintain aspect ratio
                    imgElement.style.marginRight = '10px'; // Space between images
                    previewContainer.appendChild(imgElement); // Append the image to the preview container
                };
                reader.readAsDataURL(file); // Read the file as a data URL
            }
        });
    </script>


</x-admin-app-layout>
