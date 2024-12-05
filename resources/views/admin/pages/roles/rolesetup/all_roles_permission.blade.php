<x-admin-app-layout :title="'Role In Permission'">

    <div class="page-content">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Role & Permission</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">All Role & Permission</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">

                    <a href="{{ route('add.roles.permission') }}" class="btn btn-dark rounded-0">Add
                        Role In Permission</a>

                </div>
            </div>
        </div>
        <!--end breadcrumb-->

        <h6 class="mb-0 text-uppercase">Role & Permission In Site</h6>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">

                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Role Name</th>
                                <th>Permission Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!--begin::Table row-->
                            @foreach ($roles as $key => $item)
                                <tr>
                                    <td style="width: 50px;">{{ $key + 1 }}</td>
                                    <td style="width: 200px;">{{ $item->name }}</td>
                                    <td>

                                        @foreach ($item->permissions as $prem)
                                            <span class="badge bg-danger">{{ $prem->name }}</span>
                                        @endforeach

                                    </td>
                                    <td style="width: 100px;">
                                        <a href="{{ route('admin.edit.roles', $item->id) }}" class=""
                                            title="Edit"><i class="fa-solid fa-pen-to-square fs-6 text-primary"></i></a>

                                        <a href="{{ route('admin.delete.roles', $item->id) }}" class=""
                                            id="delete" title="Delete"><i
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


</x-admin-app-layout>
