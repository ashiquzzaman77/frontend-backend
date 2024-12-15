<x-admin-app-layout :title="'Message'">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Message</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">All Message</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('admin.message.create') }}" class="btn btn-dark rounded-0 px-3">Create Message</a>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->

        <h6 class="mb-0 text-uppercase">All Messages In Site</h6>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <!-- Bulk delete button -->
                    <button id="delete-selected" class="btn btn-danger rounded-1 mb-3">Delete Selected</button>
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width:1%"><input type="checkbox" id="select-all"></th>
                                <!-- Checkbox to select all -->
                                <th style="width:3%">Sl</th>
                                <th style="width:15%">Subject</th>
                                <th style="width:35%">Message</th>
                                <th style="width:5%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $key => $item)
                                <tr data-id="{{ $item->id }}">
                                    <td><input type="checkbox" class="delete-checkbox" value="{{ $item->id }}"></td>
                                    <!-- Checkbox for each row -->
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->subject }}</td>
                                    <td>{!! $item->message !!}</td>
                                    <td>
                                        <a href="{{ route('admin.message.edit', $item->id) }}">
                                            <i class="fa-solid fa-pen-to-square fs-6 text-primary"></i>
                                        </a>
                                        <form action="{{ route('admin.message.destroy', $item->id) }}" method="POST"
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
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


</x-admin-app-layout>
<script>
    $(document).ready(function () {
    // Handle "Select All" checkbox
    $('#select-all').click(function () {
        let isChecked = this.checked;
        $('.delete-checkbox').each(function () {
            $(this).prop('checked', isChecked);
        });
    });

    // Handle individual checkbox click
    $('.delete-checkbox').click(function () {
        if ($('.delete-checkbox:checked').length === $('.delete-checkbox').length) {
            $('#select-all').prop('checked', true);
        } else {
            $('#select-all').prop('checked', false);
        }
    });

    // Handle bulk delete
    $('#delete-selected').click(function () {
        let selectedIds = [];
        $('.delete-checkbox:checked').each(function () {
            selectedIds.push($(this).val());
        });

        if (selectedIds.length > 0) {
            // Save the scroll position before deleting
            let scrollPosition = $(window).scrollTop();

            // Show confirmation alert before proceeding
            if (confirm("Are you sure you want to delete the selected messages?")) {
                // Send AJAX request to delete selected items
                $.ajax({
                    url: '{{ route('admin.message.bulkDestroy') }}',
                    type: 'POST',
                    data: {
                        ids: selectedIds,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (response) {
                        if (response.success) {
                            // Remove the deleted rows from the table
                            $('.delete-checkbox:checked').each(function () {
                                $(this).closest('tr').remove();
                            });
                            // Show success alert
                            alert('Selected messages have been deleted successfully.');
                        } else {
                            // Show error alert if deletion fails
                            alert('Error deleting selected messages.');
                        }

                        // After deletion, scroll back to the previous position
                        $(window).scrollTop(scrollPosition);

                        // Optionally, you can reload the page after deletion
                        // location.reload(); // Uncomment if you want a full page reload
                    },
                    error: function () {
                        // Handle AJAX error
                        alert('An error occurred. Please try again.');

                        // Scroll back to the previous position after error
                        $(window).scrollTop(scrollPosition);
                    }
                });
            } else {
                // Action is canceled
                alert('Deletion canceled.');
            }
        } else {
            alert('Please select at least one message to delete.');
        }
    });
});

</script>
