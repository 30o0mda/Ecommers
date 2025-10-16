<?php

namespace App\Models;

use App\Http\Enums\TypeCouponEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $table = 'coupons';
    protected $fillable = [
    'value',
    'code',
    'discount',
    'expire_date',
    'is_active',
    'end_date',
    'start_date',
    'min_purchase',
    'usage_limit',
    'used_count',
    'type',
];

public function carts(){
    return $this->hasMany(Cart::class, 'cart_id');
}

   protected $casts = [
        'type' => TypeCouponEnum::class,
        'is_active' => 'boolean',
    ];


}
