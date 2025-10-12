@extends('layouts.master')

@section('content')
    @if (session('error'))
        <div id="session-alert" class="alert alert-danger text-center"
            style="position: fixed; top: 80px; left:90%; transform: translateX(-50%);
                z-index: 9999; width: auto; min-width:300px;">
            {{ session('error') }}
        </div>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                setTimeout(function() {
                    const alertBox = document.getElementById('session-alert');
                    if (alertBox) {
                        alertBox.style.transition = "opacity 0.5s ease";
                        alertBox.style.opacity = "0";
                        setTimeout(() => alertBox.remove(), 500); // إزالة العنصر بعد الإخفاء
                    }
                }, 3000); // بعد 3 ثوانٍ
            });
        </script>
    @endif
    <div class="product-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">المنتجات</span> المتاحه</h3>
                        <p>مرحبا بكم في موقعنا </p>
                    </div>
                </div>
            </div>
            <div class="row" enctype="multipart/form-data">
                @foreach ($products as $product)
                    <div class="col-lg-4 col-md-6 text-center">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="{{ url('/showproduct/' . $product->id) }}">
                                    <img src="{{ isset($product->image_path) ? url($product->image_path) : '' }}"
                                        alt="" style="height: 200px;width: 200px">
                                </a>
                            </div>
                            <h3>{{ $product->name }}</h3>
                            <p class="product-price"><span>{{ $product->quantity }}</span> {{ $product->price }} $ </p>
                            <p class="mt-3">
                                <a href="{{ url('/removeproduct/' . $product->id) }}" class="btn btn-danger"><i
                                        class="fas fa-trash"></i> Delete</a>
                                <a href="{{ url('/editproduct/' . $product->id) }}" class="btn btn-info"><i
                                        class="fas fa-edit"></i> Edit</a> <a
                                    href="{{ url('/showproduct/' . $product->id) }}" class="btn btn-info"><i
                                        class="fas fa-eye"></i> View</a>
                            </p>
                            <a href="{{ url('/addtocart/' . $product->id) }}" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>
    </div>
    
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
@endsection
