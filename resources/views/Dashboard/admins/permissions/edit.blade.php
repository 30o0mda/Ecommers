@extends('Dashboard.layout.master')


@section('content')
    <div class="add_teacher">
        <div class="content">
            <div class="adress">
                <h4>{{ $title }}</h4>
            </div>

            @include('Dashboard.admins.permissions.__form')
        </div>
    </div>
@endsection


@section('script')
    <script>
        $(document).ready(function() {
            // Listen for input event on input fields, select fields, and textarea fields to remove validation errors
            $('input, select, textarea').on('input', function() {
                $(this).removeClass('is-invalid');
                $('#' + $(this).attr('id') + '_error').text('');
            });

        });
    </script>

@endsection
