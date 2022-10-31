<?php

declare(strict_types=1);

namespace App\Transport\Domain\Entities;

class Address
{
    public function __construct(
        public readonly int $id,
        public readonly string $address,
        public readonly string $city,
        public readonly string $country,
        public readonly string $zipCode,
        public readonly string $latitude,
        public readonly string $longitude,
    )
    {
    }
}
