<?php

namespace App\Http\Enums;

enum UserIsBlockEnum: int
{
    case Not_Blocked = 0;
    case Blocked = 1;

    public function label(): string
    {
        return match($this) {
            self::Not_Blocked => 'مفعل',
            self::Blocked => 'محظور',
        };
    }
}
