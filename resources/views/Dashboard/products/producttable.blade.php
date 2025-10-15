@extends('Dashboard.master')

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
                        <td><img src="{{ asset($product->image_path) }}" width="50"></td>
                        <td>{{ $product->price }} $</td>
                        <td>{{ $product->quantity }}</td>
                        <td>

                            <div class="d-flex flex-wrap">

                                <a href="/editproduct/{{ $product->id }}" class="btn btn-primary btn-sm action-btn">
                                    <i class="fas fa-edit"></i> Edit
                                </a>

                                <form action="/removeproduct/{{ $product->id }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm action-btn"
                                        onclick="return confirm('Are you sure you want to delete this product?')">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>

                                <a href="/showproductadmin/{{ $product->id }}" class="btn btn-info btn-sm action-btn">
                                    <i class="fas fa-eye"></i> View
                                </a>

                                <a href="/addimagetoproduct/{{ $product->id }}"
                                    class="btn btn-secondary btn-sm action-btn">
                                    <i class="fas fa-image"></i> Add Image To Product
                                </a>

                            </div>



                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let table = new DataTable('#myTable');
        });
    </script>

    <style>
    .action-btn {
        margin: 0 5px 10px 0; /* يمين ويسار وتحت */
    }
</style>
@endsection
