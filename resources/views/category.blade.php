@extends('layouts.master')
@section('content')
    <!-- products -->
    <div class="product-section mt-150 mb-150">
        <div class="container">

            <style>
                /* شكل القائمة الجانبية */
                .product-filters {
                    background: #fff;
                    border-radius: 10px;
                    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                    padding: 20px;
                    position: sticky;
                    top: 100px;
                    display: flex;
                    justify-content: center;
                }

                .product-filters ul {
                    list-style: none;
                    padding: 0;
                    margin: 10px auto;
                }

                .product-filters ul li {
                    cursor: pointer;
                    padding: 10px 15px;
                    border-radius: 8px;
                    color: #ff7b00;
                    font-weight: 500;
                    margin-bottom: 10px;
                    border: none;
                    transition: all 0.3s ease;
                    text-align: center;
                }

                .product-filters ul li:hover {
                    background-color: #ff7b00;
                    color: #fff;
                }

                .product-filters ul li.active {
                    background-color: #ff7b00;
                    color: #fff;
                }

                /* المنتجات */
                .single-product-item {
                    background: #fff;
                    border-radius: 10px;
                    transition: all 0.3s ease-in-out;
                    padding: 20px;
                }

                .single-product-item:hover {
                    transform: translateY(-10px);
                    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
                }
            </style>

            <div class="row">
                <!-- العمود الأيسر للفلاتر -->
                <div class="col-lg-2 col-md-4 mb-4">
                    <div class="product-filters">
                        <ul>
                            <li class="active" data-filter="*">الكل</li>
                            @foreach ($categories as $category)
                                <li data-filter="._{{ $category->id }}">{{ $category->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- العمود الأيمن للمنتجات -->
                <div class="col-lg-10 col-md-8">
                    <div class="row product-lists">
                        @foreach ($products as $product)
                            <div class="col-lg-4 col-md-6 text-center _{{ $product->category_id }}">
                                <div class="single-product-item">
                                    <div class="product-image">
                                        <a href="single-product.html">
                                            <img src="{{ $product->image_path }}" style="height: 250px;width: 250px"
                                                alt="">
                                        </a>
                                    </div>
                                    <h3>{{ $product->name }}</h3>
                                    <p class="product-price">{{ $product->price }}$ </p>
                                    <p class="product-price"><span> Quantity </span> {{ $product->quantity }}$ </p>
                                    <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to
                                        Cart</a>
                                    <p class="mt-3">
                                        <a href="{{ url('/removeproduct/' . $product->id) }}" class="btn btn-danger"><i
                                                class="fas fa-trash"></i> Delete</a>
                                        <a href="{{ url('/editproduct/' . $product->id) }}" class="btn btn-info"><i
                                                class="fas fa-edit"></i> Edit</a>
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Pagination -->
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="pagination-wrap">
                        <ul>
                            @if ($products->currentPage() > 1)
                                <li><a href="{{ $products->url(1) }}" title="First">&laquo;</a></li>
                            @endif
                            @if ($products->onFirstPage())
                                <li class="disabled"><span>Prev</span></li>
                            @else
                                <li><a href="{{ $products->previousPageUrl() }}">Prev</a></li>
                            @endif
                            @php
                                $pagesToShow = 4;
                                $start = $products->currentPage() - floor($pagesToShow / 2);
                                if ($start < 1) {
                                    $start = 1;
                                }
                                $end = $start + $pagesToShow - 1;
                                if ($end > $products->lastPage()) {
                                    $end = $products->lastPage();
                                    $start = max($end - $pagesToShow + 1, 1);
                                }
                            @endphp
                            @for ($i = $start; $i <= $end; $i++)
                                <li>
                                    <a class="{{ $i == $products->currentPage() ? 'active' : '' }}"
                                        href="{{ $products->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor
                            @if ($products->hasMorePages())
                                <li><a href="{{ $products->nextPageUrl() }}">Next</a></li>
                            @else
                                <li class="disabled"><span>Next</span></li>
                            @endif
                            @if ($products->currentPage() < $products->lastPage())
                                <li><a href="{{ $products->url($products->lastPage()) }}" title="Last">&raquo;</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>

            <!-- end products -->
        @endsection
