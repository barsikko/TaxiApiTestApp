<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static NewOrder()
 * @method static static InProgress()
 * @method static static Rejected()
 * @method static static Done()
 */
final class OrderType extends Enum
{
    const NewOrder =   0;
    const InProgress =   1;
    const Rejected = 2;
    const Done = 3;
}
