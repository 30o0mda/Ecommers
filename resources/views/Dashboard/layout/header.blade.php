<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('Dashboard/assets/image/default-car.png') }}" type="image/png">
    <!-- ? Main CSS -->
    <link rel="stylesheet" href="{{ asset('Dashboard/assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('Dashboard/assets/css/fontawesome.min.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script>
    <!-- ? Custom CSS -->
    <link rel="stylesheet" href="{{ asset('Dashboard/assets/css/dataTables.bootstrap5.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('Dashboard/assets/css/sfwa.css') }}" />
    <link rel="stylesheet" href="{{ asset('Dashboard/assets/css/swiper-bundle.min.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('Dashboard/assets/css/aos-anmite.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.22/sweetalert2.min.css"
        integrity="sha512-yX1R8uWi11xPfY7HDg7rkLL/9F1jq8Hyiz8qF4DV2nedX4IVl7ruR2+h3TFceHIcT5Oq7ooKi09UZbI39B7ylw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">



    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- Include Bootstrap-Select CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta3/css/bootstrap-select.min.css">

    <!-- Include Bootstrap-Select JS -->

    @yield('styles')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- ? Custom CSS -->
    <!-- ? Main JavaScript -->
    <script src="{{ asset('Dashboard/assets/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('Dashboard/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('Dashboard/assets/js/all.min.js') }}"></script>
    <script src="{{ asset('Dashboard/assets/js/fontawesome.min.js') }}"></script>
    <!-- ? Main JavaScript -->
    <!-- ? Custom JavaScript -->
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <script src="{{ asset('Dashboard/assets/js/charts.js') }}"></script>
    <script src="{{ asset('Dashboard/assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('Dashboard/assets/js/dataTables.bootstrap5.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta3/js/bootstrap-select.min.js"></script>

    <!-- ? Custom JavaScript -->
    {{-- <title>الرئيسيه</title> --}}
    <title>@yield('title')</title>
</head>
