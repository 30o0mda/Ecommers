<div class="all-actions">
    @if (auth()->id() != $id)
        <div class="delete-icon" title="مسح">
            <a  onclick="delete_items(`{{ $id }}`, `{{ route('delete_admin',$id) }}`)">
                <i class="fa-solid fa-trash"></i>
            </a>
        </div>
    @endif

    <div class="action-icon" title="تعديل">
        <a href="{{ route('edit_admin', $id) }}">
            <i class="fa-solid fa-pen"></i>
        </a>
    </div>


    {{-- @role('superadmin')
        <a href="{{ route('admin.permissions.edit', $id) }}" title="{{ __('messages.permissions') }}">
            <i class="fa-solid fa-shield"></i>
        </a>
    @endrole
    @role('superadmin')
        @if (auth()->id() != $id)
            @if ($status == 1)
                <a title="{{ __('messages.active') }}" class="toggle-link" onclick="toggleActivation({{ $id }})">
                    <i class="fa-solid fa-toggle-on toggle-icon"></i>
                </a>
            @else
                <a title="{{ __('messages.inactive') }}" class="toggle-link"
                    onclick="toggleActivation({{ $id }})">

                    <i class="fa-solid fa-toggle-off toggle-icon"></i>
                </a>
            @endif
        @endif
    @endrole --}}
</div>
@component('Components.__delete')
@endcomponent

{{--
<script>
    function deleteadmin(id) {
        var table = $('.dataTable').DataTable();

        // Set up AJAX headers with CSRF token
        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': <meta name="csrf-token" content="{{ csrf_token() }}">
        //     }

        // });

        // Show confirmation dialog using Swal
        Swal.fire({
            title: "{{ __('messages.areyousure') }}",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: "{{ __('messages.cancel') }}",
            confirmButtonText: "{{ __('messages.yessure') }}",
        }).then((result) => {
            // If user confirms deletion
            if (result.isConfirmed) {
                // Send AJAX request to delete the admin
                $.ajax({
                    type: 'POST',
                    url: `admins/${id}`, // Assuming your route is set up correctly
                    data: {
                        '_method': 'DELETE',
                        '_token': $('#token').val() // Using the value from the hidden input field
                    },
                    dataType: "json",
                    headers: {
                        'X-CSRF-TOKEN': $('#token').val() // Including CSRF token in headers
                    },
                    success: function(result) {
                        // If deletion is successful
                        if (result.status == true) {
                            Swal.fire(
                                "{{ __('messages.deleted') }}",
                                result.message,
                                'success'
                            );
                            // Reload the DataTable
                            table.ajax.reload();
                        }
                    }
                });
            }
        });
    }

    function toggleActivation(id) {
        var table = $('.dataTable').DataTable();

        // Set up AJAX headers with CSRF token
        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': <meta name="csrf-token" content="{{ csrf_token() }}">
        //     }

        // });

        // Show confirmation dialog using Swal
        var url = "{{ route('admin.toggle_activation', ':id') }}";
        url = url.replace(':id', id);
        // Send AJAX request to delete the admin
        $.ajax({
            type: 'GET',
            url: url, // Assuming your route is set up correctly
            data: {
                '_method': 'GET',
                '_token': $('#token').val() // Using the value from the hidden input field
            },
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': $('#token').val() // Including CSRF token in headers
            },
            success: function(result) {
                // If deletion is successful
                if (result.status == true) {
                    Swal.fire(
                        result.message,
                        'success'
                    );
                    // Reload the DataTable
                    table.ajax.reload();
                }
            }
        });

    }
</script> --}}
