<?php

declare(strict_types=1);

namespace App\Transport\Domain\Repositories;

use App\Transport\Domain\Commands\CreateVehicleCommand;
use App\Transport\Domain\Entities\Vehicle;

interface IVehicleRepository
{
    public function create(CreateVehicleCommand $vehicle): Vehicle;
}
