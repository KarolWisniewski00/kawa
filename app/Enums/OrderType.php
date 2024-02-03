<?php

namespace App\Enums;

class OrderType
{
    const CARRIER = 'carrier';
    const PARCEL_LOCKER = 'parcel_locker';
    const ADRES_PERSON = 'adres_person';

    const TYPES = [
        self::CARRIER,
        self::PARCEL_LOCKER,
        self::ADRES_PERSON,
    ];
}