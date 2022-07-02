<?php

namespace App\Constants;

class Common
{
    const ORDER_LATER = 1;
    const ORDER_OLDER = 2;

    const SORT_ORDER = [
        'later' => self::ORDER_LATER,
        'older' => self::ORDER_OLDER,
    ];
}