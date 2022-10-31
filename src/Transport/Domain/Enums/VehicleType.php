<?php

declare(strict_types=1);

namespace App\Transport\Domain\Enums;

enum VehicleType: int
{
    case FIXED = 1;
    case BIDDING = 2;
}
