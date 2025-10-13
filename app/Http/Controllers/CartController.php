<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function CartPage()
    {
        $user_id = auth()->user()->id;
        $carts = Cart::with('product')->where('user_id', $user_id)->get();
        $cartCount = Cart::where('user_id', auth()->id())->sum('quantity');

        return view('products.cart', ['carts' => $carts, 'cartCount' => $cartCount]);
    }

    public function AddToCart($pro_id)
    {
        $user_id = auth()->user()->id;
        $cart = Cart::where('user_id', $user_id)->where('product_id', $pro_id)->first();
        if ($cart) {
            $cart->quantity += 1;
            $cart->save();
        } else {
            $newcart = new Cart();
            $newcart->user_id = $user_id;
            $newcart->product_id = $pro_id;
            $newcart->quantity = 1;
            $newcart->save();
        }
        return redirect('/product');
    }



        public function UpdateCart(Request $request,$cart_id){
        $cart=Cart::find($cart_id);
        if($cart){
            $cart->quantity=$request->quantity;

            $cart->save();
        }
        return redirect('/cart');
    }
    public function RemoveCart($cart_id)
    {
        $cart = Cart::find($cart_id);
        if ($cart) {
            $cart->delete();
        }
        return redirect('/cart');
    }

    public function CompleteOrder()
    {
        $user_id = auth()->user()->id;
        $carts = Cart::with('product')->where('user_id', $user_id)->get();
        // foreach($carts as $cart){
        //     $cart->delete();
        // }
        return view('products.completeorder', ['user_id' => $user_id, 'carts' => $carts]);
    }

    public function MyOrders()
    {
        $user_id = auth()->user()->id;
        $orders = Order::with('orderDetails')->where('user_id', $user_id)->get();
        return view('products.myorders', ['orders' => $orders]);
    }

    public function StoreOrder(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:500',
            'note' => 'nullable|string|max:1000',
        ]);

        // Create a new order
        $order = new Order();
        $order->name = $request->name;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->address = $request->address;
        $order->note = $request->note;
        $order->user_id = auth()->id();
        $order->save();

        $user_id = auth()->user()->id;
        $carts = Cart::with('product')->where('user_id', $user_id)->get();

        foreach ($carts as $cart) {
            $orderDetail = new OrderDetails();
            $orderDetail->order_id = $order->id;
            $orderDetail->product_id = $cart->product_id;
            $orderDetail->price = $cart->product->price;
            $orderDetail->quantity = $cart->quantity;
            $orderDetail->total_price = $cart->product->price * $cart->quantity;
            $orderDetail->save();
        }

        Cart::where('user_id', $user_id)->delete();
        return redirect('/')->with('success', 'Order placed successfully!');
    }

}
