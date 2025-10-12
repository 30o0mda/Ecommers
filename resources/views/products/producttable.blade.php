<link rel="stylesheets" href="https://cdn.datatables.net/2.3.4/css/dataTables.dataTables.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-MXe5EK5gyK+fbhwQy/dukwz9fw71HZcsM4KsyDBDTvMyjymkiO0M5qqU0lF4vqLI4VnKf1+DIKf1GM6RFkO8PA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.datatables.net/2.3.4/js/dataTables.min.js"></script>

@extends('layouts.master')
@section('content')
<table id="myTable" class="display">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->quantity }}</td>
            <td>

            </td>
        </tr>
        @endforeach
        <tr>
            <td></td>
        </tr>

    </tbody>
</table>
@endsection

<script>
    $(document).ready(function() {
        let table = new DataTable('#myTable');
    });
</script>
