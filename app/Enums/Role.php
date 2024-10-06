<?php

namespace App\Enums;

enum Role: string
{
    case ADMIN   = 'admin';
    case USER = 'user';

    public function toString(): null|string
    {
        return match ($this) {
            self::ADMIN   => "Admin",
            self::USER => "User",
        };
    }
}
