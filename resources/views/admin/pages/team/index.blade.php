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
                        <li class="breadcrumb-item active" aria-current="page">All Team</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('admin.team.create') }}" class="btn btn-dark rounded-0 px-3">Create Team
                    </a>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->

        <h6 class="mb-0 text-uppercase">All Team In Site</h6>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width:3%">Sl</th>
                                <th style="width:6%">Image</th>
                                <th style="width:15%">Name</th>
                                <th style="width:10%">Designation</th>
                                <th style="width:10%">Email</th>
                                <th style="width:10%">Phone</th>
                                <th style="width:2%">Order</th>
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
                                    <td>{{ $item->designation }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->order }}</td>
                                    <td>
                                        @if ($item->status == 'active')
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-danger">Inactive</span>
                                        @endif
                                    </td>

                                    <td>

                                        <a href="" data-bs-toggle="modal"
                                            data-bs-target="#showModal{{ $item->id }}">
                                            <i class="fa-solid fa-message text-dark"></i>
                                        </a>

                                        <!-- Modal -->
                                        <div class="modal fade" id="showModal{{ $item->id }}" tabindex="-1"
                                            aria-labelledby="exampleshowModal" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">

                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleshowModal">Message Form
                                                            - Team Member</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>

                                                    <form action="{{ route('admin.team.sendEmail') }}" method="POST"
                                                        enctype="multipart/form-data">

                                                        @csrf

                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-12 mb-3">
                                                                    <label for="name">Name</label>
                                                                    <input type="text" class="form-control"
                                                                        name="name" readonly
                                                                        value="{{ $item->name }}" id="name">
                                                                </div>

                                                                <div class="col-12 mb-3">
                                                                    <label for="email">Email</label>
                                                                    <input type="email" class="form-control"
                                                                        name="to" readonly
                                                                        value="{{ $item->email }}" id="email">
                                                                </div>

                                                                <div class="col-12 mb-3">
                                                                    <label for="subject">Subject</label>
                                                                    <input type="text" class="form-control"
                                                                        name="subject" id="subject">
                                                                </div>

                                                                <div class="col-12 mb-3">
                                                                    <label for="message">Message</label>
                                                                    <textarea name="message" id="message" cols="10" rows="7" class="form-control"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-outline-primary rounded-0">Send
                                                                Message</button>
                                                        </div>

                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal -->



                                        <a href="{{ route('admin.team.edit', $item->id) }}"><i
                                                class="fa-solid fa-pen-to-square fs-6 text-primary"></i></a>

                                        <form action="{{ route('admin.team.destroy', $item->id) }}" method="POST"
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

    <!-- Modal -->


</x-admin-app-layout>
