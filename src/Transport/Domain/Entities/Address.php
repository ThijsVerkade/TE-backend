<?php

declare(strict_types=1);

namespace App\Transport\Domain\Entities;

use App\Shared\Domain\ValueObjects;

class Address
{
    public function __construct(
        public readonly int $id,
        public readonly ValueObjects\Address $address,
    )
    {
    }
}
