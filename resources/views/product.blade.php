@extends('Layouts.master')

@section('content')
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
			<div class="row">
                @foreach ($products as $product )
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.html"><img src="{{ url($product -> image_path) }}" alt="" style="height: 200px;width: 200px"></a>
						</div>
						<h3>{{ $product -> name }}</h3>
						<p class="product-price"><span>{{$product -> quantity}}</span> {{ $product -> price }} $ </p>
						<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
					</div>
				</div>
                @endforeach
			</div>
		</div>
	</div>
@endsection
