<?php

declare(strict_types=1);

namespace App\Transport\Domain\Aggregates;

use App\Transport\Domain\Entities\Address;
use App\Transport\Domain\Enums\Status;
use App\Transport\Domain\Enums\VehicleType;
use App\Transport\Infrastructure\ValueObjects\DatePeriod;
use App\Transport\Infrastructure\ValueObjects\Price;

class Vehicle
{
    public function __construct(
        public readonly int $vehicleReferenceId,
        public readonly int $distanceAddress,
        public readonly Status $status,
        public readonly VehicleType $type,
        public readonly ?\DateTimeImmutable $closingDate,
        public readonly Address $pickupAddress,
        public readonly Address $deliveryAddress,
        public readonly DatePeriod $deliveryPeriod,
        public readonly DatePeriod $pickupPeriod,
        public readonly Price $price,
    )
    {
    }
}
