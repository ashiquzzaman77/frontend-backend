<x-admin-app-layout :title="'Role In Permission'">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <!--begin::Content-->

    <div class="page-content">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Admin</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Admin</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('all.admin.permission') }}" class="btn btn-dark rounded-0 px-3">BacK To Admin</a>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->

        <!--begin::Products-->
        <div class="card p-3">

            <!--begin::Card body-->
            <div class="card-body">
                <form action="{{ route('update.admin', $users->id) }}" method="POST" id="myForm">

                    @csrf

                    <div class="row">

                        <div class="col-3">
                            <div class="form-group mb-3">
                                <label for="" class="mb-2">Name</label>
                                <input type="text" name="name" value="{{ $users->name }}" autocomplete="off"
                                    placeholder="Name" required class="form-control">
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group mb-3">
                                <label for="" class="mb-2">Email</label>
                                <input type="email" value="{{ $users->email }}" name="email" autocomplete="off"
                                    placeholder="Email" required class="form-control">
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group mb-3">
                                <label for="" class="mb-2">Company Name</label>
                                <input type="text" value="{{ $users->company_name }}" name="company_name"
                                    autocomplete="off" placeholder="Compnay Name" class="form-control">
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group mb-3">
                                <label for="" class="mb-2">Designation</label>
                                <input type="text" value="{{ $users->designation }}" name="designation"
                                    autocomplete="off" placeholder="Designation" class="form-control">
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group mb-3">
                                <label for="" class="mb-2">Phone</label>
                                <input type="tel" value="{{ $users->phone }}" name="phone" autocomplete="off"
                                    placeholder="Phone" class="form-control">
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group mb-3">
                                <label for="" class="mb-2">Password</label>
                                <input type="password" name="password" autocomplete="off" placeholder="*****"
                                    class="form-control">
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group mb-3">
                                <label for="" class="mb-2">Address</label>
                                <input type="text" value="{{ $users->address }}" name="address" autocomplete="off"
                                    placeholder="Address" class="form-control">
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group mb-3">
                                <label for="" class="mb-2">Role</label>

                                <select class="form-select" name="roles">
                                    <option selected disabled>Select Role</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->name }}"
                                            {{ $users->hasRole($role->name) ? 'selected' : '' }}>
                                            {{ $role->name }}
                                        </option>
                                    @endforeach
                                </select>

                            </div>
                        </div>

                        <div class="col-2">
                            <label for="" class="mb-2">Status</label>
                            <select name="status" id="" class="form-select">
                                <option selected disabled>Select Status</option>
                                <option value="active" {{ $users->status == 'active' ? 'selected' : '' }}>
                                    Active</option>
                                <option value="inactive" {{ $users->status == 'inactive' ? 'selected' : '' }}>
                                    Inactive</option>
                            </select>
                        </div>

                        <div class="col-2">
                            <label for="" class="mb-2">Mail Status</label>
                            <select name="mail_status" id="" class="form-select">
                                <option selected disabled>Select Mail Status</option>

                                <option value="mail" {{ $users->mail_status == 'mail' ? 'selected' : '' }}>
                                    Mail</option>

                                <option value="no_mail" {{ $users->mail_status == 'no_mail' ? 'selected' : '' }}>No
                                    Mail</option>

                            </select>
                        </div>

                    </div>

                    <div class="modal-footer">

                        <button type="submit" class="btn btn-outline-primary rounded-0 px-3">Update Data</button>

                    </div>

                </form>
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Products-->
    </div>

    <!--end::Content-->

</x-admin-app-layout>
