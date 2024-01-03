<?php

namespace App\Enums;

class OrderType
{
    const CARRIER = 'carrier';
    const PARCEL_LOCKER = 'parcel_locker';

    const TYPES = [
        self::CARRIER,
        self::PARCEL_LOCKER,
    ];
}