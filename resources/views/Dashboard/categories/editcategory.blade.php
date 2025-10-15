@extends('Dashboard.master')
@section('content')
    <div class="category-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">Edit</span> categorys</h3>
                        <p></p>
                    </div>
                </div>
            </div>
            <div class="row">
                {{-- Add category --}}
                <div class="col-lg-12 mb-5 mb-lg-0">
                    <div class="form-title">
                    </div>
                    <div id="form_status"></div>
                    <div class="contact-form">
                        <form method="post" enctype="multipart/form-data" action="{{ route('admin.updatecategory' , $category->id) }}">
                            {{-- <input type="hidden" name="cat_id" value="{{ $category->id ?? '' }}"> --}}
                            @csrf()
                            @if ($errors->any())
                                <table
                                    style="width: 100%; border: 1px solid rgb(0, 0, 0); background-color: #070000; color: rgb(197, 23, 23); margin-bottom: 20px;">
                                    <thead>
                                        <tr>
                                            <th style="text-align: left; padding: 10px;">Validation Errors</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($errors->all() as $error)
                                            <tr>
                                                <td style="padding: 10px;">{{ $error }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                            <p>
                                    <img src="{{ asset($category->image_path ?? '') }}" style="width: 150px; height: 150px;">
                            </p>
                            <div class="form-group">
                                <label for="image_path">تغيير الصورة:</label>
                                <input type="file" name="image_path" class="form-control">
                            </div>
                            </p>
                            <p>
                                <label for="image_path">الاسم :</label>
                                <input type="text" style="width: 100%" required placeholder="Name" name="name"
                                    id="name" value="{{ $category->name ?? '' }}">
                            </p>
                            <p>
                                <label for="image_path">الاسم بالانجليزية :</label>
                                <input type="text" style="width: 100%" required placeholder="Name" name="name_en"
                                    id="name_en" value="{{ $category->name_en ?? '' }}">
                            </p>
                            {{-- <p style="display: flex">
                                <input type="number" style="width: 50%" placeholder="Price" class="mr-4" name="price"
                                    id="price" required value="{{ $category->price }}">
                                <input type="number" required style="width: 50%" placeholder="Quantity" name="quantity"
                                    id="quantity" value="{{ $category->quantity }}">
                            </p> --}}
                            {{-- <div class="form-group">
                                <select name="category_id" id="category_id" required class="form-control"
                                    style="width: 100%;">
                                    <option value="">-- Select Category --</option>
                                    @foreach ($allcategories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $category->category_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div> --}}
                            <p>
                                <textarea name="description" id="description" cols="50" rows="10" required placeholder="Description">{{ $category->description }}</textarea>
                            </p>
                            <p>
                            </p>
                            <p>
                                <input type="submit" value="Update">
                            </p>
                        </form>
                    </div>
                </div>
                {{-- End Add category --}}
            </div>
        </div>
    </div>
@endsection
