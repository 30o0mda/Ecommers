@extends('layouts.master')
@section('content')
    <div class="container mt-5">
        <div class="text-right">
            <a href="/addproduct/" class="btn btn-primary mt-5 mb-5 w-45">
                <i class="fas fa-plus"></i>
                Add Product
            </a>
        </div>

        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Image</th>
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
                        <td><img src="{{ asset($product->image_path) }}"  width="50">
                        <td>{{ $product->price }} $</td>
                        <td>{{ $product->quantity }}</td>
                        <td>
                            <a href="/editproduct/{{ $product->id }}" class="btn btn-primary btn"><i class="fas fa-edit"> Edit </i></a>
                            <form action="/deleteproduct/{{ $product->id }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to delete this product?')"><i class="fas fa-trash"></i> Delete </button>
                            </form>
                            <a href="/addimagetoproduct/{{ $product->id }}" class="btn btn-secondary btn"><i class="fas fa-image"> Add Image </i></a>
                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table>
    </div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let table = new DataTable('#myTable');
    });
</script>
