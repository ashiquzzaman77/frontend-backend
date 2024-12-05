<!-- Bootstrap JS -->
<script src="{{ asset('admin/assets/js/bootstrap.bundle.min.js') }}"></script>
<!--plugins-->
<script src="{{ asset('admin/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>

<script src="{{ asset('admin/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>

<script src="{{ asset('admin/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/chartjs/js/chart.js') }}"></script>

{{-- <script src="../../../../cdn.jsdelivr.net/npm/select2%404.1.0-rc.0/dist/js/select2.min.js"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="{{asset('admin/assets/plugins/select2/js/select2-custom.js')}}"></script>

<script src="{{ asset('admin/assets/js/index.js') }}"></script>




<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>

<script>
    $(document).ready(function() {
        var table = $('#example2').DataTable({
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'print']
        });

        table.buttons().container()
            .appendTo('#example2_wrapper .col-md-6:eq(0)');
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Initialize CKEditor for each textarea with the class 'editor'
        document.querySelectorAll('.editor').forEach(function(textarea) {
            ClassicEditor
                .create(textarea)
                .then(editor => {
                    console.log("CKEditor initialized successfully:", editor);
                })
                .catch(error => {
                    console.error("CKEditor initialization error:", error);
                });
        });
    });
</script>

<script>
    $(function() {
        $(document).on('click', '#delete', function(e) {
            e.preventDefault(); // Prevent the default action (which is a GET request)

            var form = $(this).closest('form'); // Find the closest form
            Swal.fire({
                title: 'Are you sure?',
                text: "Delete this data?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit(); // Submit the form if the user confirms
                    Swal.fire(
                        'Deleted!',
                        'Your data has been deleted.',
                        'success'
                    );
                }
            });
        });
    });
</script>



<!--app JS-->
<script src="{{ asset('admin/assets/js/app.js') }}"></script>

<script>
    new PerfectScrollbar(".app-container")
</script>


