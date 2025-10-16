<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Http\Enums\TypeCouponEnum;
use App\Models\Category;
use App\Models\Product;
use App\Models\Coupon;

use Illuminate\Http\Request;

class FirstController extends Controller
{
    public function MainPage()
    {
        $result = Category::get();
        return view('welcome', ['categories' => $result]);
    }

    public function GetAllCategoriesWithProduct() {
    $result = Category::all();
    $result2 = Product::paginate(9);
    return view('category',['categories'=>$result , 'products'=>$result2]);
}

public function Coupons(request $request) {


    $code = $request->input('code');

    $coupon = Coupon::where('code', $code)->first();

    //TODO:check coupon is exist
    if (!$coupon) {
        return redirect()->back()->with('error', 'كود الكوبون غير صحيح');
    }


    //TODO: check usage count for this coupon


    //TODO: check if the coupon is expired



    //TODO: check if the coupon is active


    //TODO: check if the coupon is already used


    
    //TODO:check if the coupon is min purchase




    //TODO Apply coupon for this order


    $cartTotal = session('cart_total', 0);

    if ($coupon->min_purchase && $cartTotal < $coupon->min_purchase) {
        return back()->with('error', 'الحد الأدنى للشراء لتفعيل هذا الكوبون هو ' . $coupon->min_purchase);
    }

    $discount_value = $this->getDiscountCouponValue($coupon);

    session([
        'coupon' => $coupon->code,
        'discount' => $discount_value,
    ]);

    return back()->with('success', 'تم تطبيق الكوبون بنجاح! خصم: ' . number_format($discount_value, 2));
}

private function getDiscountCouponValue($coupon)
 {
    $discount_value  =0;
    if($coupon->type == TypeCouponEnum::Fixed->value) {
        $discount_value = $coupon->value;
    } elseif ($coupon->type == TypeCouponEnum::Percent->value) {
        $discount_value  = ($coupon->value / 100) ;
    }
    return $discount_value;
}






}
