@extends('Dashboard.master')

@section('content')
    <div class="container mt-5">
        <div class="text-right">
            <a href="/addcategory/" class="btn btn-primary mt-5 mb-5 w-45">
                <i class="fas fa-plus"></i>
                Add category
            </a>
        </div>
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td><img src="{{ asset($category->image_path) }}" width="50"></td>
                        <td>
                            <div class="d-flex flex-wrap">
                                <a href="/editcategory/{{ $category->id }}" class="btn btn-primary btn-sm action-btn">
                                    <i class="fas fa-edit"></i> Edit
                                </a>

                                <form action="/removecategory/{{ $category->id }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm action-btn"
                                        onclick="return confirm('Are you sure you want to delete this category?')">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>

                                <a href="/showcategory/{{ $category->id }}" class="btn btn-info btn-sm action-btn">
                                    <i class="fas fa-eye"></i> Show
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
        document.addEventListener('DOMContentLoaded', function () {
            let table = new DataTable('#myTable');
        });
    </script>

    <style>
        .action-btn {
            margin: 0 5px 10px 0; /* يمين ويسار وتحت */
        }
    </style>
@endsection
