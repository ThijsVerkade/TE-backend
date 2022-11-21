<?php

declare(strict_types=1);

namespace App\Transport\Domain\ValueObjects;

use App\Transport\Domain\Enums\Status;
use App\Transport\Domain\Enums\VehicleType;
use App\Shared\Domain\ValueObjects;

class Vehicle
{
    public function __construct(
        public readonly int $vehicleReferenceId,
        public readonly Status $status,
        public readonly VehicleType $type,
        public readonly ?\DateTimeImmutable $closingDate,
        public readonly ValueObjects\Address $pickupAddress,
        public readonly ValueObjects\Address $deliveryAddress,
        public readonly ValueObjects\DatePeriod $deliveryPeriod,
        public readonly ValueObjects\DatePeriod $pickupPeriod,
        public readonly ValueObjects\Price $price,
    )
    {
    }
}
