<?php

namespace App\Http\Enums\news;

enum Status: string
{
    case DDRAFT = 'draft';
    case ACTIVE = 'active';

    case BLOCKED = 'blocked';

    public static function getEnums():array {
        return [
            self::DDRAFT->value,
            self::ACTIVE->value,
            self::BLOCKED->value,

        ];
    }
}

