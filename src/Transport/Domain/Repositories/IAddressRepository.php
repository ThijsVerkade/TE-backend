<?php

declare(strict_types=1);

namespace App\Transport\Domain\Repositories;

use App\Transport\Domain\Commands\CreateAddressCommand;
use App\Transport\Domain\Entities\Address;

interface IAddressRepository
{
    public function create(CreateAddressCommand $address): Address;
}
