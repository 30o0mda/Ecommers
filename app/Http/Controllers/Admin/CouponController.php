<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function CouponTable()
    {
        $coupons = Coupon::latest()->get();
        return view('Dashboard.coupons.coupontable', compact('coupons'));
    }

       public function AddCoupon()
    {
        return view('Dashboard.coupons.addcoupon');
    }
        public function StoreCoupon(Request $request)
    {
        $request->validate([
            'code' => 'required|string|unique:coupons,code',
            'type' => 'required|in:1,2',
            'value' => 'required|numeric|min:0',
            'min_purchase' => 'nullable|numeric|min:0',
            'usage_limit' => 'nullable|integer|min:1',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'is_active' => 'boolean',
        ]);

        Coupon::create($request->all());

        return redirect()->route('admin.coupontable')->with('success', 'تم إنشاء الكوبون بنجاح.');
    }

        public function EditCoupon($coupon_id)
    {
        $coupon = Coupon::findOrFail($coupon_id);
        return view('Dashboard.coupons.editcoupon', compact('coupon'));
    }

    public function UpdateCoupon(Request $request, $coupon_id)
    {
        $request->validate([
            'code' => 'required|string|unique:coupons,code,' . $coupon_id,
            'type' => 'required|in:1,2',
            'value' => 'required|numeric|min:0',
            'min_purchase' => 'nullable|numeric|min:0',
            'usage_limit' => 'nullable|integer|min:1',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'is_active' => 'boolean',
        ]);
        $coupon = Coupon::findOrFail($coupon_id);
        $coupon->update($request->all());
        return redirect()->route('admin.coupontable')->with('success', 'تم تحديث الكوبون بنجاح.');
    }

    public function RemoveCoupon($coupon_id)
    {
        $coupon = Coupon::findOrFail($coupon_id);
        $coupon->delete();
        return redirect()->route('admin.coupontable')->with('success', 'تم حذف الكوبون بنجاح.');
    }
}
