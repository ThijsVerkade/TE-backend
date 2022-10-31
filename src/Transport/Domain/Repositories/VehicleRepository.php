<?php

declare(strict_types=1);

namespace App\Transport\Domain\Repositories;


use App\Transport\Domain\Aggregates\Vehicle;

interface VehicleRepository
{
    public function create(Vehicle $vehicle): Vehicle;
}
