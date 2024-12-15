<x-admin-app-layout :title="'Message Create'">

    <div class="page-content">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Message</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Create Message</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('admin.message.index') }}" class="btn btn-dark rounded-0 px-3">Back To List
                    </a>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->

        <h6 class="mb-0 text-uppercase">Create Message In Site</h6>
        <hr />

        <div class="card">
            <div class="card-body">

                <form action="{{ route('admin.message.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">

                        <!-- Subject Field -->
                        <div class="col-12 col-lg-12 mb-3">
                            <label for="" class="mb-2">Subject</label>
                            <input type="text" class="form-control" placeholder="Subject" name="subject"
                                value="{{ old('subject') }}">

                            <!-- Display validation error for 'subject' -->
                            @error('subject')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Message Field -->
                        <div class="col-12 col-lg-12 mb-3">
                            <label for="" class="mb-2">Message</label>
                            <textarea name="message" id="" placeholder="Write Something.........." class="form-control editor">{!! old('message') !!}</textarea>

                            <!-- Display validation error for 'message' -->
                            @error('message')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- File Upload Field -->
                        {{-- <div class="col-6 col-lg-3 mb-3">
                            <label for="" class="mb-2">Upload File</label>
                            <input type="file" class="form-control" name="file">

                            <!-- Display validation error for 'file' -->
                            @error('file')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div> --}}

                        <!-- Status Field -->
                        {{-- <div class="col-6 col-lg-3 mb-3">
                            <label for="" class="mb-2">Status</label>
                            <select name="status" class="form-select">
                                <option selected disabled>Choose Option...</option>
                                <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive
                                </option>
                            </select>

                            <!-- Display validation error for 'status' -->
                            @error('status')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div> --}}

                        <!-- Submit Button -->
                        <div class="col-12 col-lg-12 mb-3">
                            <button type="submit" class="btn btn-outline-primary rounded-0 px-3 float-end">Data Submit</button>
                        </div>

                    </div>
                </form>

            </div>
        </div>

    </div>


</x-admin-app-layout>
