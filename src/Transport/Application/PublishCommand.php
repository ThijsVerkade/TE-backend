<?php

declare(strict_types=1);

namespace App\Transport\Application;

use App\Transport\Domain\ValueObjects\Vehicle;

class PublishCommand
{
    /**
     * @param iterable<Vehicle> $vehicles
     */
    public function __construct(
        public readonly ?int $companyId,
        public readonly iterable $vehicles,
    )
    {
    }
}
