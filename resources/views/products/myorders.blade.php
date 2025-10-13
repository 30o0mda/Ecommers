@extends('layouts.master')
@section('content')
    <div class="checkout-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="checkout-accordion-wrap">
                        <div class="accordion" id="accordionExample">
                            @foreach ($orders as $order)
                                <div class="card single-accordion">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" type="button" data-toggle="collapse"
                                                data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                Order Number : {{ $order->id }}
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                        data-parent="#accordionExample">
                                        <div class="card-body">

                                            <div class="billing-address-form">
                                                <p><strong>Order Date:</strong> {{ $order->created_at }}</p>
                                                <p><strong>Name:</strong> {{ $order->name }}</p>
                                                <p><strong>Email:</strong> {{ $order->email }}</p>
                                                <p><strong>Address:</strong> {{ $order->address }}</p>
                                                <p><strong>Phone:</strong> {{ $order->phone }}</p>
                                                <p><strong>Note:</strong> {{ $order->note }}</p>
                                            </div>


                                            <div class="row">
                                                <div class="col-lg-8 col-md-12">
                                                    <div class="cart-table-wrap">
                                                        <table class="cart-table">
                                                            <thead class="cart-table-head">
                                                                <tr class="table-head-row">
                                                                    <th class="product-remove">#</th>
                                                                    <th class="product-image">Product Image</th>
                                                                    <th class="product-name">Name</th>
                                                                    <th class="product-price">Price</th>
                                                                    <th class="product-quantity">Quantity</th>
                                                                    <th class="product-total">Total</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="cart-body">
                                                                @foreach ($order->OrderDetails as $detail)
                                                                    <tr class="table-body-row"
                                                                        data-price="{{ $detail->product->price }}">
                                                                        <td class="product-id"> {{ $detail->id }}
                                                                        </td>
                                                                        <td class="product-image">
                                                                            <img src="{{ asset($detail->product->image_path) }}"
                                                                                alt=""
                                                                                style="width: 100px; height: auto;">
                                                                        </td>
                                                                        <td class="product-name">
                                                                            <a
                                                                                href="{{ url('/showproduct/' . $detail->product->id) }}">
                                                                                {{ $detail->product->name }}
                                                                            </a>
                                                                        </td>
                                                                        <td class="product-price">
                                                                            {{ number_format($detail->product->price, 2) }}
                                                                            $
                                                                        </td>
                                                                        <td class="product-quantity">
                                                                            {{ $detail->quantity }}
                                                                        </td>
                                                                        <td class="product-total">
                                                                            ${{ number_format($detail->product->price * $detail->quantity, 2) }}
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="total-section">
                                                        <table class="total-table">
                                                            <thead class="total-table-head">
                                                                <tr class="table-total-row">
                                                                    <th>Total</th>
                                                                    <th>Price</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr class="total-data">
                                                                    <td><strong>Total: </strong></td>
                                                                    <td id="grand-total">
                                                                        {{ $order->orderDetails->sum(fn($detail) => $detail->product->price * $detail->quantity) }}
                                                                        $
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="cart-buttons">

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
