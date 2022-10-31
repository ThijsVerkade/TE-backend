<?php

declare(strict_types=1);

namespace App\Transport\Domain\Enums;

enum Status: int
{
    case PUBLISHED = 1;
    case ASSIGNED = 2;
    case CONFIRMED = 3;
    case OFFLINE = 4;
}
