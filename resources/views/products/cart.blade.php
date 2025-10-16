@extends('layouts.master')
@section('content')


@if(session('coupon'))
    <p>كود الكوبون: {{ session('coupon') }}</p>
    <p>الخصم: {{ session('discount') }} $</p>
@endif

    <div class="cart-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="cart-table-wrap">
                        <table class="cart-table">
                            <thead class="cart-table-head">
                                <tr class="table-head-row">
                                    <th class="product-remove"></th>
                                    <th class="product-image">Product Image</th>
                                    <th class="product-name">Name</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-total">Total</th>
                                </tr>
                            </thead>
                            <tbody id="cart-body">
                                @foreach ($carts as $cart)
                                    <tr class="table-body-row" data-price="{{ $cart->product->price }}">
                                        <td class="product-remove">
                                            <a href="/removecart/{{ $cart->id }}"><i
                                                    class="far fa-window-close"></i></a>
                                        </td>
                                        <td class="product-image">
                                            <img src="{{ asset($cart->product->image_path) }}" alt=""
                                                style="width: 100px; height: auto;">
                                        </td>
                                        <td class="product-name">
                                            <a href="{{ url('/showproduct/' . $cart->product->id) }}' }}">
                                                {{ $cart->product->name }}
                                            </a>
                                        </td>
                                        <td class="product-price">${{ number_format($cart->product->price, 2) }}</td>
                                        <td class="product-quantity">
                                            <form method="POST" action="/updatecart/{{ $cart->id }}">
                                                @csrf
                                                <input type="number" class="quantity-input" name="quantity"
                                                    value="{{ $cart->quantity }}" min="1"
                                                    data-id="{{ $cart->id }}">
                                                <input type="hidden" name="cart_id" value="{{ $cart->id }}">
                                                <button type="submit">Update</button>
                                            </form>
                                        </td>
                                        <td class="product-total">
                                            ${{ number_format($cart->product->price * $cart->quantity, 2) }}</td>
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
                                        ${{ number_format($carts->sum(fn($cart) => $cart->product->price * $cart->quantity), 2) }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="coupon-section">
                            <h3>Apply Coupon</h3>
                            <div class="coupon-form-wrap">
                                <form action="{{ route('apply.coupons') }}" method="POST }}">
                                    <p><input type="text" placeholder="Coupon"  name="code"></p>
                                    <button type="submit"> apply</button>
                                </form>
                            </div>
                        </div>
                        <div class="cart-buttons">
                            <a href="/completeorder" class="boxed-btn black">Check Out</a>
                            <a href="/myorders" class="boxed-btn black">My Orders</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const quantityInputs = document.querySelectorAll('.quantity-input');

            function onQuantityChange(e) {
                const input = e.target;
                const row = input.closest('tr');
                if (!row) return;
                const price = parseFloat(row.dataset.price) || 0;
                let quantity = parseInt(input.value, 10);
                if (isNaN(quantity) || quantity < 1) {
                    quantity = 1;
                    input.value = 1;
                }
                const productTotal = price * quantity;
                const totalCell = row.querySelector('.product-total');
                if (totalCell) {
                    totalCell.textContent = `$${productTotal.toFixed(2)}`;
                }
                updateGrandTotal();
            }
            quantityInputs.forEach(input => {
                input.addEventListener('input', onQuantityChange);
                input.addEventListener('change', onQuantityChange);
            });

            function updateGrandTotal() {
                let grandTotal = 0;
                document.querySelectorAll('.product-total').forEach(cell => {
                    const num = parseFloat(cell.textContent.replace(/[^0-9.]/g, '')) || 0;
                    grandTotal += num;
                });
                const grandEl = document.getElementById('grand-total');
                if (grandEl) {
                    grandEl.textContent = `$${grandTotal.toFixed(2)}`;
                }
            }
            updateGrandTotal();
        });
    </script>
@endsection
