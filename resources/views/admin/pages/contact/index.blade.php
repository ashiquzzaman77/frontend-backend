<x-admin-app-layout :title="'Contact'">
    <div class="page-content">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Contact</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">All Contact</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        <h6 class="mb-0 text-uppercase">All Contact In Site</h6>
        <hr />


        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width:3%">Sl</th>
                                <th style="width:10%">Name</th>
                                <th style="width:10%">Email</th>
                                <th style="width:10%">Phone</th>
                                <th style="width:10%">Subject</th>
                                <th style="width:30%">Message</th>
                                <th style="width:5%">Status</th>
                                <th style="width:3%">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($items as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->subject }}</td>
                                    <td>{{ $item->message }}</td>
                                    <td>
                                        @if ($item->status == 'active')
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-danger">Inactive</span>
                                        @endif
                                    </td>

                                    <td>
                                        <a href="{{ route('admin.contact.edit', $item->id) }}"><i
                                                class="fa-solid fa-pen-to-square fs-6 text-primary"></i></a>

                                        <form action="{{ route('admin.contact.destroy', $item->id) }}" method="POST"
                                            style="display:inline;" class="delete-form">
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
                        </tbody>

                    </table>
                </div>
            </div>
        </div>

    </div>



</x-admin-app-layout>
