<?php

namespace App\Enums;

class OrderLog
{
    const SYSTEM = 'system';
    const CLIENT = 'client';
    const ADMIN = 'admin';
    const UNKNOW = 'unknow';

    const TYPES = [
        self::SYSTEM,
        self::CLIENT,
        self::ADMIN,
        self::UNKNOW,
    ];
}