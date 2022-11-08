<?php

declare(strict_types=1);

namespace App\Transport\Domain\Aggregates;

use App\Transport\Domain\Entities\Vehicle;

class TransportAggregate
{
    /**
     * @param iterable<Vehicle> $vehicles
     */
    public function __construct(
        public readonly int $id,
        public readonly iterable $vehicles,
    )
    {
    }
}
