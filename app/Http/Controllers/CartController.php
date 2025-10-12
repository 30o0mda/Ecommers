<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function CartPage(){
        $user_id=auth()->user()->id;
        $carts=Cart::with('product')->where('user_id',$user_id)->get();
        $cartCount = \App\Models\Cart::where('user_id', auth()->id())->sum('quantity');

        return view('products.cart',['carts'=>$carts, /* 'cartCount' => $cartCount */]);
    }

    public function AddToCart($pro_id){
        $user_id=auth()->user()->id;
        $cart=Cart::where('user_id',$user_id)->where('product_id',$pro_id)->first();
        if($cart){
            $cart->quantity +=1;
            $cart->save();
        }else{
            $newcart=new Cart();
            $newcart->user_id=$user_id;
            $newcart->product_id=$pro_id;
            $newcart->quantity=1;
            $newcart->save();
        }
        return redirect('/product');
    }
    public function RemoveCart($cart_id){
        $cart=Cart::find($cart_id);
        if($cart){
            $cart->delete();
        }
        return redirect('/cart');
    }
}
