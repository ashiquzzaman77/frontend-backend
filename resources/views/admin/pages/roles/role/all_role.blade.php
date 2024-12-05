<x-admin-app-layout :title="'Role'">


    <div class="page-content">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Role</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">All Role</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a data-bs-toggle="modal" data-bs-target="#addModal" class="btn btn-dark rounded-0 px-3">Add
                        Role</a>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->

        <h6 class="mb-0 text-uppercase">All Role In Site</h6>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width:5%">Sl</th>
                                <th>Role Name</th>
                                <th style="width:10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!--begin::Table row-->
                            @foreach ($roles as $key => $role)
                                <tr>

                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $role->name }}</td>

                                    <td>

                                        <a href="" title="Edit" data-bs-toggle="modal"
                                            data-bs-target="#editModal{{ $role->id }}"><i
                                                class="fa-solid fa-pen-to-square fs-6 text-primary"></i></a>

                                        {{-- Edit Modal --}}

                                        <div class="modal fade" id="editModal{{ $role->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Role
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>

                                                    <form action="{{ route('update.role') }}" method="POST"
                                                        id="myForm">

                                                        @csrf

                                                        <input type="hidden" name="id"
                                                            value="{{ $role->id }}">

                                                        <div class="modal-body">

                                                            <div class="form-group">
                                                                <label for="">Role Name</label>
                                                                <input type="text" name="name"
                                                                    value="{{ $role->name }}" autocomplete="off"
                                                                    placeholder="Role Name" required
                                                                    class="form-control">
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit"
                                                                class="btn btn-outline-primary btn-sm">Update
                                                                Role</button>
                                                        </div>

                                                    </form>

                                                </div>
                                            </div>
                                        </div>

                                        <a href="{{ route('delete.role', $role->id) }}" title="Delete" id="delete"><i
                                                class="fa-solid fa-trash fs-6 text-danger"></i></a>
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


    {{-- Add Role --}}
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Role</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('store.role') }}" method="POST" id="myForm">

                    @csrf

                    <div class="modal-body">

                        <div class="form-group">
                            <label for="">Role Name</label>
                            <input type="text" name="name" autocomplete="off" placeholder="Role Name" required
                                class="form-control">
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-outline-primary btn-sm">Add Role</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
    {{-- Add Role --}}

</x-admin-app-layout>
