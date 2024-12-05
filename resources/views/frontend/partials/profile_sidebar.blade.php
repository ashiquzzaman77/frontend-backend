<div class="col-lg-4">
    <div class="card">
        <div class="card-body">

            <div class="d-flex flex-column align-items-center text-center">

                <img src="{{ $profileData->photo ? asset('upload/admin_images/' . $profileData->photo) : asset('admin/assets/images/avatars/avatar-2.png') }}"
                    alt="Admin" class="rounded-circle p-1" style="width:120px;height:120px">


                <div class="mt-3">
                    <h4>{{ $profileData->name }}</h4>
                    <p class="text-secondary mb-1">{{ $profileData->email }}</p>
                    <p class="text-muted font-size-sm mb-0">{{ $profileData->address }}</p>
                </div>

                <div class="mt-2">
                    <a href="{{ route('admin.meta.indexMeta') }}" class="btn btn-primary border-0 rounded-0 px-3"
                        style="background: linear-gradient(to right, #01226e, #242288); color: white;">Meta Setting</a>

                    <a href="{{ route('admin.meta.download') }}" class="btn btn-outline-primary rounded-0 px-3">DB
                        Download</a>
                </div>

            </div>

            <hr class="my-4">

            <ul class="list-group list-group-flush">

                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">
                        Role For Company:
                    </h6>
                    @foreach ($profileData->roles as $role)
                        <span class="badge bg-danger px-2">{{ $role->name }}</span>
                    @endforeach
                </li>

                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">
                        Full Name:
                    </h6>
                    <span class="text-secondary">{{ $profileData->name }}</span>
                </li>

                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Email Address:</h6>
                    <span class="text-secondary">{{ $profileData->email }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Phone:</h6>
                    <span class="text-secondary">{{ $profileData->phone }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Address:</h6>
                    <span class="text-secondary">{{ $profileData->address }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Company Name:</h6>
                    <span class="text-secondary">{{ $profileData->company_name }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Designation:</h6>
                    <span class="text-secondary">{{ $profileData->designation }}</span>
                </li>

            </ul>

        </div>
    </div>
</div>
