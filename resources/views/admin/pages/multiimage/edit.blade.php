<x-admin-app-layout :title="'MultiImage Edit'">

    <div class="page-content">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">MultiImage</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit MultiImage</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('admin.multiImage.index') }}" class="btn btn-dark rounded-0 px-3">Back To List
                    </a>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->

        <h6 class="mb-0 text-uppercase">Edit MultiImage In Site</h6>
        <hr />

        <div class="card">
            <div class="card-body">

                <form action="{{ route('admin.multiImage.update', $item->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">

                        <!-- Status Field -->
                        <div class="col-6 col-lg-2 mb-3">
                            <label for="" class="mb-2">Status</label>
                            <select name="status" class="form-select">
                                <option selected disabled>Choose Option...</option>
                                <option value="active" {{ $item->status == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ $item->status == 'inactive' ? 'selected' : '' }}>Inactive
                                </option>
                            </select>
                        </div>

                        <!-- Project Name Field -->
                        <div class="col-6 col-lg-4 mb-3">
                            <label for="project_id" class="mb-2">Project Name</label>
                            <select name="project_id" id="single-select-field" data-placeholder="Choose Project..."
                                required class="form-select">
                                <option></option>
                                @foreach ($projects as $project)
                                    <option value="{{ $project->id }}"
                                        {{ $item->project_id == $project->id ? '' : 'disabled' }}
                                        {{ $item->project_id == $project->id ? '' : 'readonly' }}
                                        {{ $item->project_id == $project->id ? '' : 'aria-disabled=true' }}
                                        {{ $item->project_id == $project->id ? 'selected' : '' }}>
                                        {{ $project->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>


                        <div class="col-6 col-lg-6 mb-3"></div>

                        <!-- Image Upload Field -->
                        <div class="col-3 col-lg-3 mb-3">
                            <label for="" class="mb-2">Image</label>
                            <input type="file" class="form-control" name="multi_image[]" multiple id="imageInput">
                        </div>

                        <!-- Existing Image Preview -->
                        <div class="col-12 mb-3">
                            @if (!empty($item->multi_image))
                                @php
                                    $images = json_decode($item->multi_image); // Decode the JSON array of image paths
                                @endphp
                                <div id="imagePreview" class="mt-2">
                                    <h5>Existing Images:</h5>
                                    <div class="row">
                                        @foreach ($images as $image)
                                            <div class="col-2 mb-3">
                                                <img src="{{ url('storage/' . $image) }}" alt="Image"
                                                    class="img-thumbnail" style="width: 80px; height: 80px;">
                                                <input type="checkbox" name="delete_images[]"
                                                    value="{{ $image }}" id="delete_image_{{ $loop->index }}">
                                                <label for="delete_image_{{ $loop->index }}">Delete</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>

                        <!-- Submit Button -->
                        <div class="col-12 col-lg-12 mb-3">
                            <button type="submit" class="btn btn-outline-primary rounded-0 px-3 float-end">Data
                                Submit</button>
                        </div>

                    </div>
                </form>


            </div>
        </div>

    </div>

    {{-- <script>
        // Get the file input and preview container
        const imageInput = document.getElementById('imageInput');
        const imagePreview = document.getElementById('imagePreview');

        imageInput.addEventListener('change', function(event) {
            // Clear any previous previews
            imagePreview.innerHTML = '';

            const files = event.target.files;

            // Loop through the selected files
            for (let i = 0; i < files.length; i++) {
                const file = files[i];

                // Check if the file is an image
                if (file && file.type.startsWith('image/')) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        const imgElement = document.createElement('img');
                        imgElement.src = e.target.result;
                        imgElement.classList.add('img-thumbnail');
                        imgElement.style.maxWidth = '150px'; // Optional: limit image size

                        // Append the image preview to the preview container
                        imagePreview.appendChild(imgElement);
                    };

                    // Read the file as a data URL
                    reader.readAsDataURL(file);
                }
            }
        });
    </script> --}}

</x-admin-app-layout>
