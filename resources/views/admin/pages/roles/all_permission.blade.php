<x-admin-app-layout :title="'Permission'">

    <div class="page-content">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Permission</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">All Permission</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">

                    <a href="" class="btn btn-dark me-2 rounded-0" data-bs-toggle="modal"
                        data-bs-target="#addModal">Add Permission</a>

                    <a href="{{ route('all.roles.permission') }}" class="text-light btn btn-info rounded-0">Role In
                        Permission</a>

                </div>
            </div>
        </div>
        <!--end breadcrumb-->

        <h6 class="mb-0 text-uppercase">All Permission In Site</h6>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">

                        <thead>
                            <tr>
                                <th style="width:5%">Sl No</th>
                                <th>Permission Name</th>
                                <th>Group Name</th>
                                <th style="width:10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!--begin::Table row-->
                            @foreach ($permissions as $key => $permission)
                                <tr>

                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $permission->name }}</td>
                                    <td>{{ $permission->group_name }}</td>
                                    <td>

                                        <a href="" title="Edit" data-bs-toggle="modal"
                                            data-bs-target="#editModal{{ $permission->id }}"><i
                                                class="fa-solid fa-pen-to-square fs-6 text-primary"></i></a>

                                        {{-- Edit Permission --}}
                                        <div class="modal fade" id="editModal{{ $permission->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit
                                                            Permission
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>

                                                    <form action="{{ route('update.permission') }}" method="POST"
                                                        id="myForm">

                                                        @csrf

                                                        <input type="hidden" name="id"
                                                            value="{{ $permission->id }}">

                                                        <div class="modal-body">

                                                            <div class="form-group">
                                                                <label for="">Permission Name</label>
                                                                <input type="text" value="{{ $permission->name }}"
                                                                    name="name" required autocomplete="off"
                                                                    placeholder="Permission Name" class="form-control">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">Group Name</label>
                                                                <input type="text"
                                                                    value="{{ $permission->group_name }}"
                                                                    name="group_name" required autocomplete="off"
                                                                    placeholder="Permission Name" class="form-control">
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary btn-sm">Save
                                                                changes</button>
                                                        </div>

                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                        {{-- Edit Permission --}}

                                        <a href="{{ route('delete.permission', $permission->id) }}" title="Delete"><i
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



    {{-- =================================================================================== --}}

    <!--end::Content-->

    {{-- Add Permission --}}
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Permission</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('store.permission') }}" method="POST" id="myForm">

                    @csrf

                    <div class="modal-body">

                        <div class="form-group">
                            <label for="">Permission Name</label>
                            <input type="text" name="name" required autocomplete="off"
                                placeholder="Permission Name" class="form-control">
                        </div>

                        {{-- <div class="form-group">
                            <label for="">Group Name</label>

                            <select class="form-select form-select-solid form-select-sm stock_select" name="group_name"
                                data-control="select2" data-placeholder="Select Group Name" data-allow-clear="true">

                                <option></option>

                                @foreach ($groups as $group)
                                    <option value="{{ $group->group_name }}">{{ $group->group_name }}</option>
                                @endforeach

                            </select>
                        </div> --}}

                        <div class="form-group">
                            <label for="">Group Name</label>
                            <input type="text" name="group_name" required autocomplete="off"
                                placeholder="Group Name" class="form-control">
                        </div>

                    </div>
                    <div class="modal-footer">

                        <button type="submit" class="btn btn-outline-primary btn-sm">Save changes</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
    {{-- Add Permission --}}

    {{-- validate code  --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    name: {
                        required: true,
                    },
                    group_name: {
                        required: true,
                    },
                },
                messages: {
                    name: {
                        required: 'Please Enter Permission Name',
                    },
                    group_name: {
                        required: 'Please Enter Group Name',
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
            });
        });
    </script>


</x-admin-app-layout>
