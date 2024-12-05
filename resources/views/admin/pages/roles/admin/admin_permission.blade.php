<x-admin-app-layout :title="'Admin'">


    <div class="page-content">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Admin</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">All Admin</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a data-bs-toggle="modal" data-bs-target="#addModal" class="btn btn-dark rounded-0 px-3">Add
                        Admin</a>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->

        <h6 class="mb-0 text-uppercase">All Admin In Site</h6>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width: 40px;">No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Mail Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!--begin::Table row-->
                            @foreach ($users as $key => $user)
                                <tr>

                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @forelse ($user->roles as $role)
                                            <span class="badge badge-pill bg-danger">{{ $role->name }}</span>
                                        @empty
                                            <span class="badge badge-pill bg-primary">No roles assigned</span>
                                        @endforelse
                                    </td>

                                    <td>
                                        @if ($user->status == 'active')
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-danger">inactive</span>
                                        @endif
                                    </td>

                                    <td>
                                        @if ($user->mail_status == 'mail')
                                            <span class="badge bg-success">Mail</span>
                                        @else
                                            <span class="badge bg-danger">No Mail</span>
                                        @endif
                                    </td>


                                    <td>

                                        {{-- @if (Auth::guard('admin')->user()->can('status.admin'))
                                            @if ($user->status == 1)
                                                <a href="{{ route('admin.inactive', $user->id) }}" title="Inactive"><i
                                                        class="bi bi-hand-thumbs-down text-warning fs-3"></i></a>
                                            @else
                                                <a href="{{ route('admin.active', $user->id) }}" title="Active"><i
                                                        class="bi bi-hand-thumbs-up text-dark fs-3"></i></a>
                                            @endif
                                        @endif --}}

                                        {{-- @if (Auth::guard('admin')->user()->can('edit.admin')) --}}
                                        <a href="{{ route('edit.admin.permission', $user->id) }}" class=""
                                            title="Edit"><i
                                                class="fa-solid fa-pen-to-square fs-6 text-primary"></i></a>
                                        {{-- @endif --}}

                                        {{-- @if (Auth::guard('admin')->user()->can('delete.admin')) --}}
                                        <a href="{{ route('delete.admin', $user->id) }}" class=""
                                            title="Delete"><i class="fa-solid fa-trash fs-6 text-danger"></i></a>
                                        {{-- @endif --}}

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


    {{-- Add Permission --}}
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">

                <div class="modal-header" style="background: #6196A6;height: 50px;">
                    <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Add Admin</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('store.admin.permission') }}" method="POST" id="myForm">

                    @csrf

                    <div class="modal-body">

                        <div class="row">

                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="">Name</label>
                                    <input type="text" name="name" autocomplete="off" placeholder="Name"
                                        class="form-control form-control-sm">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="">Email</label>
                                    <input type="email" name="email" autocomplete="off" placeholder="Email"
                                        class="form-control form-control-sm">
                                </div>
                            </div>


                            <div class="col-4">
                                <div class="form-group mb-3">
                                    <label for="">Designation</label>
                                    <input type="text" name="designation" autocomplete="off"
                                        placeholder="Designation" class="form-control form-control-sm">
                                </div>
                            </div>


                            <div class="col-4">
                                <div class="form-group mb-3">
                                    <label for="">Company Name</label>
                                    <input type="text" name="company_name" autocomplete="off"
                                        placeholder="Company Name" class="form-control form-control-sm">
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group mb-3">
                                    <label for="">Phone</label>
                                    <input type="tel" name="phone" autocomplete="off" placeholder="Phone"
                                        class="form-control form-control-sm">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="">Address</label>
                                    <input type="text" name="address" autocomplete="off" placeholder="Address"
                                        class="form-control form-control-sm">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="">Password</label>
                                    <input type="password" name="password" autocomplete="off" placeholder="******"
                                        class="form-control form-control-sm">
                                </div>
                            </div>

                        </div>


                        <div class="row">

                            <div class="col-4">
                                <div class="form-group">
                                    <label for="">Role</label>

                                    <select class="form-select form-select-sm" name="roles">
                                        <option selected disabled>Select Role</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>

                            <div class="col-4">
                                <label for="">Status</label>
                                <select name="status" id="" class="form-select form-select-sm">
                                    <option selected disabled>Select Status</option>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>

                            <div class="col-4">
                                <label for="">Mail Status</label>
                                <select name="mail_status" id="" class="form-select form-select-sm">
                                    <option selected disabled>Select Mail Status</option>
                                    <option value="mail">Mail</option>
                                    <option value="no_mail">No Mail</option>
                                </select>
                            </div>

                        </div>

                    </div>

                    <div class="modal-footer">

                        <button type="submit" class="btn btn-primary btn-sm">Save changes</button>

                    </div>

                </form>

            </div>
        </div>
    </div>
    {{-- Add Permission --}}

</x-admin-app-layout>
