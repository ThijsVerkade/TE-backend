<?php

declare(strict_types=1);

namespace App\Transport\Domain\Commands;

class CreateAddressCommand
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
