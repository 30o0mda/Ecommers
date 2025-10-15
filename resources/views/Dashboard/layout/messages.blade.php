@if (session('success'))
    <script>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 1500
        })
    </script>
@endif
@if (session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: "{{ session('error') }}"
        })
    </script>
@endif

{{-- @if (session('errors'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: "{{ session('errors') }}"
        })
    </script>
@endif --}}
@if (session('errors'))
    <script>
        var errors = @json(json_decode(session('errors'), true));
        if (errors) {
            var errorMessage = '';
            Object.keys(errors).forEach(function(key) {
                errorMessage += key + ': ' + errors[key][0] + '\n';
            });

            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: errorMessage
            });
        }
    </script>
@endif
