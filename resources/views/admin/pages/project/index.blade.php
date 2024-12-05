<x-admin-app-layout :title="'Project'">


    <div class="page-content">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Project</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">All Project</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">

                    <a href="{{ route('admin.multiImage.create') }}" class="btn btn-danger rounded-0 px-3 me-2">Multi
                        Image
                    </a>

                    <a href="{{ route('admin.project.create') }}" class="btn btn-dark rounded-0 px-3">Create Project
                    </a>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->

        <h6 class="mb-0 text-uppercase">All Project In Site</h6>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width:3%">Sl</th>
                                <th style="width:6%">Image</th>
                                <th style="width:20%">Name</th>
                                <th style="width:10%">Status</th>
                                <th style="width:5%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!--begin::Table row-->
                            @foreach ($items as $key => $item)
                                <tr>

                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        <img src="{{ !empty($item->image) ? url('storage/' . $item->image) : 'https://ui-avatars.com/api/?name=' . urlencode($item->name) }}"
                                            style="width: 50px;height: 50px;" alt="">
                                    </td>

                                    <td>{{ $item->name }}</td>

                                    <td>
                                        @if ($item->status == 'active')
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-danger">Inactive</span>
                                        @endif
                                    </td>

                                    <td>

                                        <a href="{{ route('admin.project.edit', $item->id) }}"><i
                                                class="fa-solid fa-pen-to-square fs-6 text-primary"></i></a>

                                        <form action="{{ route('admin.project.destroy', $item->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-0" id="delete" title="Delete"
                                                style="border: none; background: none;">
                                                <i class="fa-solid fa-trash fs-6 text-danger"></i>
                                            </button>
                                        </form>

                                    </td>

                                </tr>
                            @endforeach
                            <!--end::Table row-->
                        </tbody>

                    </table>
                </div>
            </div>
        </div>

    </div>

    <script>
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
                        imgElement.style.maxWidth = '100px'; // Optional: limit image size

                        // Append the image preview to the preview container
                        imagePreview.appendChild(imgElement);
                    };

                    // Read the file as a data URL
                    reader.readAsDataURL(file);
                }
            }
        });
    </script>

</x-admin-app-layout>
