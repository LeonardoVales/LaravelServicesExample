<?php

namespace App\Domains\Subscriptions\Entities;

use App\Illuminate\Database\Model;

class Customer extends Model
{
    public const STATUS_ACTIVE = 1;
    public const STATUS_INACTIVE = 0;

    /**
     * @var array|int[]
     */
    public static array $status = [
        'ACTIVE' => self::STATUS_ACTIVE,
        'INACTIVE' => self::STATUS_INACTIVE,
    ];
}
