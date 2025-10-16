<?php

namespace App\Http\Enums;

enum UserRoleEnum: int
{
    case Admin = 1;
    case supervisor = 2;
    case User = 3;

    public function label(): string
    {
        return match($this) {
            self::Admin => 'مدير',
            self::supervisor => 'مشرف',
            self::User => 'مستخدم',
        };
    }
}
