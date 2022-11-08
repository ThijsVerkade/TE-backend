<?php

declare(strict_types=1);

namespace App\Shared\Domain\ValueObjects;

class Address
{
    public function __construct(
        public readonly string $streetLine,
        public readonly string $city,
        public readonly string $country,
        public readonly string $zipCode,
        public readonly string $latitude,
        public readonly string $longitude,
    )
    {
    }
}
