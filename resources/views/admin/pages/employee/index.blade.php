<x-admin-app-layout :title="'Employee'">


    <div class="page-content">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Employee</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">All Employee</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('admin.employee.create') }}" class="btn btn-dark rounded-0 px-3">Create Employee
                    </a>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->

        <h6 class="mb-0 text-uppercase">All Employee In Site</h6>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width:3%">Sl</th>
                                <th style="width:6%">Image</th>
                                <th style="width:10%">Name</th>
                                <th style="width:10%">Email</th>
                                <th style="width:8%">Phone</th>
                                <th style="width:8%">Joint Date</th>
                                <th style="width:8%">Designation</th>
                                <th style="width:8%">Job Type</th>
                                <th style="width:8%">Salary</th>
                                <th style="width:8%">Last Certificate</th>
                                <th style="width:6%">Status</th>
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
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->joining_date }}</td>
                                    <td>{{ $item->designation }}</td>
                                    <td>{{ $item->job_type }}</td>
                                    <td>{{ $item->salary }}</td>
                                    <td>
                                        <a href="{{ !empty($item->document) ? url('storage/' . $item->document) : 'https://ui-avatars.com/api/?name=' . urlencode($item->name) }}"
                                            download="">Download</a>
                                    </td>

                                    <td>
                                        @if ($item->status == 'active')
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-danger">Inactive</span>
                                        @endif
                                    </td>

                                    <td>

                                        <a href="{{ route('admin.employee.edit', $item->id) }}"><i
                                                class="fa-solid fa-pen-to-square fs-6 text-primary"></i></a>

                                        <form action="{{ route('admin.employee.destroy', $item->id) }}" method="POST"
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


</x-admin-app-layout>
