<!DOCTYPE html>
<html lang="en">

@include('Dashboard.layout.header')

<body>
    <div class="d-flex sidemobile p-0">

        @include('Dashboard.layout.sidebar')
        <section class="index_cards">
            @include('Dashboard.layout.navbar')
            @include('Dashboard.layout.__messages')
            @yield('content')
        </section>
    </div>
    @include('Dashboard.layout.footer')
    @yield('script')
</body>

</html>
