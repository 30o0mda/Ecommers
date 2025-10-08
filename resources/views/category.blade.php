@extends('layouts.master')
@section('content')
    <!-- products -->
    <div class="product-section mt-150 mb-150">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="product-filters">
                        <ul>
                            @foreach ($categories as $category)
                                <li data-filter="._{{ $category->id }}">{{ $category->name }}</li>
                            @endforeach
                            <li class="active" data-filter="*">الكل</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row product-lists">
                @foreach ($products as $product)
                    <div class="col-lg-4 col-md-6 text-center _{{ $product->category_id }}">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="single-product.html"><img src="{{ $product->image_path }}"
                                        style="height: 250px;width: 250px" alt=""></a>
                            </div>
                            <h3>{{ $product->name }}</h3>
                            <p class="product-price">{{ $product->price }}$ </p>
                            <p class="product-price"><span> Quantity </span> {{ $product->quantity }}$ </p>
                            <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                            <p class="mt-3">
                                <a href="{{ url('/removeproduct/' . $product->id) }}" class="btn btn-danger"><i
                                        class="fas fa-trash"></i> Delete</a>
                                <a href="{{ url('/editproduct/' . $product->id) }}" class="btn btn-info"><i
                                        class="fas fa-edit"></i> Edit</a>
                            </p>
                            <a href="{{ url('/removeproduct/' . $product->id) }}" class="btn btn-danger"><i
                                    class="fas fa-trash"></i> Delete</a>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="pagination-wrap">
                        <ul>
                            <li><a href="#">Prev</a></li>
                            <li><a href="#">1</a></li>
                            <li><a class="active" href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">Next</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end products -->
@endsection
