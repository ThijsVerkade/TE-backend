<?php

declare(strict_types=1);

namespace App\Transport\Domain\Commands;

use App\Shared\Domain\ValueObjects\DatePeriod;
use App\Shared\Domain\ValueObjects\Price;
use App\Transport\Domain\Entities\Address;
use App\Transport\Domain\Enums\Status;
use App\Transport\Domain\Enums\VehicleType;

class CreateVehicleCommand
{
    public function __construct(
        public readonly int $transportId,
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
