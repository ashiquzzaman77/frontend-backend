<x-admin-app-layout :title="'Team'">

    <div class="page-content">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Team</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Create Team</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('admin.team.index') }}" class="btn btn-dark rounded-0 px-3">Back To List
                    </a>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->

        <h6 class="mb-0 text-uppercase">Create Team In Site</h6>
        <hr />

        <div class="card">
            <div class="card-body">

                <form action="{{ route('admin.team.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">

                        <div class="col-12 col-lg-2 mb-3">
                            <label for="" class="mb-2">Order</label>
                            <input type="number" class="form-control @error('order') is-invalid @enderror" required
                                placeholder="Serial No" name="order" value="{{ old('order') }}">

                            @error('order')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="col-12 col-lg-4 mb-3">
                            <label for="" class="mb-2">Name</label>
                            <input type="text" class="form-control" required placeholder="Name" name="name"
                                value="{{ old('name') }}">
                        </div>

                        <div class="col-12 col-lg-3 mb-3">
                            <label for="" class="mb-2">Designation</label>
                            <input type="text" class="form-control" placeholder="Designation" name="designation"
                                value="{{ old('designation') }}">
                        </div>

                        <div class="col-12 col-lg-3 mb-3">
                            <label for="" class="mb-2">Email</label>
                            <input type="email" class="form-control" placeholder="Emaill Address" name="email"
                                value="{{ old('email') }}">
                        </div>

                        <div class="col-12 col-lg-3 mb-3">
                            <label for="" class="mb-2">Phone</label>
                            <input type="text" class="form-control" placeholder="Phone Number" name="phone"
                                value="{{ old('phone') }}">
                        </div>

                        <div class="col-12 col-lg-3 mb-3">
                            <label for="" class="mb-2">Facebook</label>
                            <input type="text" class="form-control" placeholder="FaceBook" name="facebook"
                                value="{{ old('facebook') }}">
                        </div>

                        <div class="col-12 col-lg-3 mb-3">
                            <label for="" class="mb-2">Linkedin</label>
                            <input type="text" class="form-control" placeholder="Linkedin" name="linkedin"
                                value="{{ old('linkedin') }}">
                        </div>

                        <div class="col-12 col-lg-3 mb-3">
                            <label for="" class="mb-2">Instagram</label>
                            <input type="text" class="form-control" placeholder="Instagram" name="instagram"
                                value="{{ old('instagram') }}">
                        </div>

                        <div class="col-12 col-lg-3 mb-3">
                            <label for="" class="mb-2">Whatsapp</label>
                            <input type="text" class="form-control" placeholder="Whatsapp" name="whatsapp"
                                value="{{ old('whatsapp') }}">
                        </div>

                        <div class="col-12 col-lg-3 mb-3">
                            <label for="" class="mb-2">Twitter</label>
                            <input type="text" class="form-control" placeholder="Twitter" name="twitter"
                                value="{{ old('twitter') }}">
                        </div>


                        <div class="col-12 col-lg-3 mb-3">
                            <label for="" class="mb-2">Status</label>
                            <select name="status" class="form-select" id="">
                                <option selected disabled>Choose Option...</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>

                        <div class="col-12 col-lg-3 mb-3">
                            <label for="" class="mb-2">Image</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror"
                                name="image" id="imageInput">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="mt-2">
                                <!-- Image Preview -->
                                <img id="imagePreview" src="#" alt="Image Preview"
                                    style="display: none; width: 30%; height: auto;" />
                            </div>
                        </div>

                        <div class="col-12 col-lg-6 mb-3">
                            <label for="" class="mb-2">Description</label>
                            <textarea name="description" class="form-control" id="" cols="3" rows="3">{{ old('description') }}</textarea>
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
        // JavaScript for image preview
        document.getElementById('imageInput').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('imagePreview');

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
