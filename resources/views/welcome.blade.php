@extends('Layouts.master')

@section('content')
    <!-- product section -->
    <div class="product-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">اقسام</span> الموقع</h3>
                        <p>متعه التسوق عبر موقعنا</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($categories as $category)
                    <div class="col-lg-4 col-md-6 text-center">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="single-product.html"><img src="assets/img"
                                        alt=""></a>
                            </div>
                            <h3>{{ $category -> name }}</h3>
                            <p>{{ $category -> description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>
@endsection
