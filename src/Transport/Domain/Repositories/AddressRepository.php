<?php

declare(strict_types=1);

namespace App\Transport\Domain\Repositories;

use App\Transport\Domain\Entities\Address;

interface AddressRepository
{
    public function create(Address $address): Address;
}
