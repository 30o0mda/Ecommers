<?php

namespace App\Http\Enums;

enum TypeCouponEnum: int
{
    case Fixed =1;
    case Percent = 2;

    public function label(): string
    {
        return match ($this) {
            self::Fixed => 'خصم ثابت',
            self::Percent => 'خصم بالنسبة',
        };
    }
}
