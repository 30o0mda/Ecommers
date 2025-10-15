@extends('layouts.master')
@section('content')
    <div class="single-product mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="single-product-img">
                        <img id="main-product-image" src="{{ isset($product->image_path) ? url($product->image_path) : '' }}"
                            alt="" style="height: 400px; width: 400px; object-fit: cover;">
                    </div>
                    @if (isset($product->images) && count($product->images) > 0)
                        <div class="product-thumbnails mt-3">
                            @foreach ($product->images as $image)
                                <img src="{{ url($image->image_path) }}" alt="Product Image" class="thumbnail-image"
                                    style="height: 80px; width: 80px; margin-right: 10px; cursor: pointer; object-fit: cover;"
                                    onclick="document.getElementById('main-product-image').src = this.src;">
                            @endforeach
                        </div>
                    @endif
                </div>

                <div class="col-md-7">
                    <div class="single-product-content">
                        <h3>{{ $product->name }}</h3>
                        <p class="single-product-pricing"><span>{{ 'Quantity' }} :
                                {{ $product->quantity }}</span>{{ $product->price }} $</p>
                        <p>{{ $product->description }}</p>
                        <div class="single-product-form">
                            <form action="index.html">
                                <input type="number" placeholder="0">
                            </form>
                            <a href="{{ url('/addtocart/' . $product->id) }}" class="cart-btn"><i
                                    class="fas fa-shopping-cart"></i> Add to Cart</a>
                            <p><strong>{{ $category->name ?? '' }} : </strong> {{ $product->name ?? '' }}</p>
                        </div>
                        <h4>Share:</h4>
                        <ul class="product-share">
                            <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href=""><i class="fab fa-twitter"></i></a></li>
                            <li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
                            <li><a href=""><i class="fab fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="more-products mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">Related</span> Products</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet
                            beatae optio.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($relatedProducts as $relatedProduct)
                    <div class="col-lg-4 col-md-6 text-center">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="{{ url('/showproduct/' . $relatedProduct->id) }}"><img
                                        src="{{ isset($relatedProduct->image_path) ? url($relatedProduct->image_path) : '' }}"
                                        alt="" style="height: 200px; width: 200;"></a>
                            </div>
                            <h3>{{ $relatedProduct->name }}</h3>
                            <p class="product-price"><span>Per Kg</span> {{ $relatedProduct->price }}$ </p>
                            <a href="{{ url('/addtocart/' . $relatedProduct->id) }}" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
