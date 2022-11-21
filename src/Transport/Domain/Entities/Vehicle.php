<?php

declare(strict_types=1);

namespace App\Transport\Domain\Entities;

use App\Shared\Domain\ValueObjects;
use App\Transport\Domain\Enums\Status;
use App\Transport\Domain\Enums\VehicleType;

class Vehicle
{
    public function __construct(
        public readonly int $id,
        public readonly string $uuid,
        public readonly string $vehicleReferenceId,
        public readonly int $distanceAddress,
        public readonly Status $status,
        public readonly ?\DateTimeImmutable $closingDate,
        public readonly Address $pickupAddress,
        public readonly Address $deliveryAddress,
        public readonly ValueObjects\DatePeriod $deliveryPeriod,
        public readonly ValueObjects\DatePeriod $pickupPeriod,
        public readonly ValueObjects\Price $price,
    )
    {
    }
}
